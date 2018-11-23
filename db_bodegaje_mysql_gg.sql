drop database if exists db_bodegaje;
create database db_bodegaje;
use db_bodegaje;

create table tbl_region(
	id int not null auto_increment,
	region varchar(32),
	primary key(id)	
);

insert into tbl_region(region) values('Region Metropolitana');
insert into tbl_region(region) values('VI Libertador BOH');

create table tbl_ciudad(
	id int not null auto_increment,
	id_region int,
	ciudad varchar(32),
	primary key(id),
	foreign key(id_region) references tbl_region(id)
);

insert into tbl_ciudad(id_region, ciudad) values(1, 'Santiago');
insert into tbl_ciudad(id_region, ciudad) values(2, 'Rancagua');

create table tbl_permiso(
	id int not null auto_increment,
	permiso varchar(32),
	primary key(id)
);

insert into tbl_permiso(permiso) values('Administrador');
insert into tbl_permiso(permiso) values('Empresa');
insert into tbl_permiso(permiso) values('Supervisor');
insert into tbl_permiso(permiso) values('Empleado');

create table tbl_usuario(
	id int not null auto_increment,
	id_permiso int,
	id_ciudad int,
	rut varchar(16),
	nombre varchar(32),
	apellido varchar(32),
	telefono varchar(32),
	domicilio varchar(32),
	email varchar(32),
	pass varchar(32) default '1234',
	activo bit default 1,
	primary key(id),
	foreign key(id_permiso) references tbl_permiso(id),
	foreign key(id_ciudad) references tbl_ciudad(id)
);

insert into tbl_usuario(
	id_permiso, id_ciudad, rut, nombre, apellido, telefono, domicilio, email
) values(
	1,1,'11-1','Super','Administrador','+01234567890','Calle #123','email@admin.cl'
);

insert into tbl_usuario(
	id_permiso, id_ciudad, rut, nombre, apellido, telefono, domicilio, email
) values(
	2,1,'11-1','Super','Organizador','+01234567890','Calle #123','email@empresa.cl'
);

insert into tbl_usuario(
	id_permiso, id_ciudad, rut, nombre, apellido, telefono, domicilio, email
) values(
	3,1,'11-1','Super','Supervisor','+01234567890','Calle #123','email@supervisor.cl'
);

insert into tbl_usuario(
	id_permiso, id_ciudad, rut, nombre, apellido, telefono, domicilio, email
) values(
	4,1,'11-1','Super','Empleado','+01234567890','Calle #123','email@empleado.cl'
);

create table tbl_empresa(
	id int not null auto_increment,
	id_ciudad int,
	rut varchar(16),
	razon_social varchar(32),
	direccion varchar(32),
	activo bit default 1,
	primary key(id),
	foreign key(id_ciudad) references tbl_ciudad(id)
);

insert into tbl_empresa(rut, razon_social, id_ciudad, direccion) values('11.111.111-1', 'Empresa1', 2, 'Calle #111');

create table tbl_organizador(
	id int not null auto_increment,
	id_usuario int,
	id_empresa int,
	activo tinyint default 1,
	primary key(id),
	foreign key(id_usuario) references tbl_usuario(id),
	foreign key(id_empresa) references tbl_empresa(id)
);

insert into tbl_organizador(id_usuario, id_empresa) values(2, 1);

create table tbl_evento(
	id int not null auto_increment,
	id_ciudad int,
	id_organizador int,
	inicio_evento datetime,
	termino_evento datetime(3),
	direccion varchar(32),
	cantidad_personal int,
	copado bit default 0,
	activo bit default 1,
	primary key(id),
	foreign key(id_organizador) references tbl_organizador(id),
	foreign key(id_ciudad) references tbl_ciudad(id)
);

delimiter //
create procedure ingresarEvento(v_id_ciudad int ,v_id_usuario int, v_inicio datetime, v_termino datetime, v_direccion varchar(32), v_cantidad_personal int)
	begin
		declare v_id_organizador int;
        
        -- validar que la fecha de inicio sea menor a la de termino
        if(timestampdiff(MINUTE, v_inicio, v_termino) > 0) then
			-- inicializar variable organizador
			select id from tbl_organizador where id_usuario = v_id_usuario into v_id_organizador;
            
			-- ingresar evento
			insert into tbl_evento(
				id_ciudad, id_organizador, inicio_evento, termino_evento, direccion, cantidad_personal) 
			values(
				v_id_ciudad, v_id_organizador, v_inicio, v_termino, v_direccion, v_cantidad_personal);
			
            -- mostrar mensaje
			select 'Evento Ingresado con exito';
		else
			select 'Fecha de inicio y fecha de termino invalidas';
        end if;
        
    end;
//

delimiter ;

create table tbl_evt_suscripcion(
	id int not null auto_increment,
	fecha_ingreso datetime default now(),
	id_usuario int,
	id_evento int,
	activo bit default 1,
    asistido bit default 0,
	primary key(id),
	foreign key(id_usuario) references tbl_usuario(id),
	foreign key(id_evento) references tbl_evento(id)
);

delimiter //

create procedure actualizarEstadoEvento ( p_id_evento int)
	begin
		-- suscritos activamente
		declare v_suscritos int default (select count(*) from tbl_evt_suscripcion where id_evento = p_id_evento and activo = 0);
		declare v_cupos int default (select cantidad_personal from tbl_evento where id = p_id_evento);	
		
		if (v_suscritos = v_cupos)
			then
				update tbl_evento set copado = 1 where id = p_id_evento;
			end if;
	end;
//

delimiter ;


delimiter //
create procedure suscribirEvt ( p_id_usuario int, p_id_evento int)
	begin
		declare v_copado bit default (select copado from tbl_evento where id = p_id_evento);

		-- si ya està copado
		if(v_copado = 1) then
			select 3 as 'ID_Mensaje', 'No hay cupos' as 'Mensaje';

		-- Si ya está suscrito
		elseif exists(select * from tbl_evt_suscripcion where id_evento = p_id_evento and id_usuario = p_id_usuario and activo = 1) then
			select 1 as 'ID_Mensaje', 'Ya se ha suscrito a evento' as 'Mensaje';
            
		-- Si estaba suscrito de antes pero habia desistido, pero aùn hay cupos
		elseif exists(select * from tbl_evt_suscripcion where id_evento = p_id_evento and id_usuario = p_id_usuario and activo = 0) then
			update tbl_evt_suscripcion set activo = 1 where id_evento = p_id_evento and id_usuario = p_id_usuario;            
            select 2 as 'ID_Mensaje', 'Evento suscrito con exito' as 'Mensaje';
		-- Todo ok para suscribir
		else
			insert into tbl_evt_suscripcion(id_evento, id_usuario) values(p_id_evento, p_id_usuario);
			call actualizarEstadoEvento(p_id_evento);
			select 2 as 'ID_Mensaje', 'Evento suscrito con exito' as 'Mensaje';
		end if;
	end;
    
// delimiter ;

create table tbl_asistencia(
	id int not null auto_increment,
	hora_ingreso datetime default NOW(),
	hora_salida datetime,
	id_evento int,
	id_usuario int,
	primary key(id),
	foreign key(id_evento) references tbl_evento(id),
	foreign key(id_usuario) references tbl_usuario(id)
);

delimiter //

create procedure listarEventosDisponibles() begin
	select
		tbl_evento.id as 'ID_EVENTO_DISPONIBLE',
        tbl_empresa.razon_social as 'EMPRESA',        
        tbl_ciudad.ciudad as 'CIUDAD',
        tbl_evento.direccion as 'DIRECCION',
        tbl_evento.inicio_evento as 'INICIO',
        tbl_evento.termino_evento as 'TERMINO'
    from tbl_evento
		inner join tbl_ciudad on tbl_ciudad.id = tbl_evento.id_ciudad
        inner join tbl_organizador on tbl_organizador.id = tbl_evento.id_organizador
        inner join tbl_empresa on tbl_empresa.id = tbl_organizador.id_empresa
        
    where 
		-- NO iniciados: todavian quedan minutos para inicio
		timestampdiff(MINUTE, inicio_evento, now()) < 0
        
        -- Con cupos
        and copado = 0 
        
        -- Activos
        and tbl_evento.activo = 1;

end;
//

delimiter ;


delimiter //

create procedure listarEventosIniciados() begin
	select
		tbl_evento.id as 'ID_EVENTO_INICIADO',
        tbl_empresa.razon_social as 'EMPRESA',        
        tbl_ciudad.ciudad as 'CIUDAD',
        tbl_evento.direccion as 'DIRECCION',
        tbl_evento.inicio_evento as 'INICIO',
        tbl_evento.termino_evento as 'TERMINO'
    from tbl_evento
		inner join tbl_ciudad on tbl_ciudad.id = tbl_evento.id_ciudad
        inner join tbl_organizador on tbl_organizador.id = tbl_evento.id_organizador
        inner join tbl_empresa on tbl_empresa.id = tbl_organizador.id_empresa
    where 
		-- Iniciados: Inicio ya paso
		timestampdiff(MINUTE, inicio_evento, now()) > 0 and
        
        -- No terminado: Todavia quedan minutos para el termino
        timestampdiff(MINUTE, now(), termino_evento) > 0 
        -- Activos
        and tbl_evento.activo = 1;
end;
//

delimiter ;

delimiter //
create procedure getUsuario (v_email varchar(32), v_pass varchar(32))
	begin
		select 
			u.id,
            u.id_permiso,
            u.nombre,
            u.apellido
        from 
			tbl_usuario u
		where 
			email = v_email
				and
            pass = v_pass;
		-- select * from tbl_usuario
    end;
    
//
delimiter ;

delimiter //
create procedure listarTrabajadoresSuscritos (v_id_evento int, v_asistido int)
	begin
		select 
			id as 'ID', 
			nombre as 'Nombre',
            apellido as 'Apellido' 
		from 
			tbl_usuario 
		where 
			id in (
				select 
					id_usuario 
				from tbl_evt_suscripcion 
				where 
					-- suscripcion relacionada
					id_evento = v_id_evento 
                    -- suscripcion asistida
                    and asistido = v_asistido
                    -- suscripcion activa
                    and activo = 1);        
	end;
//delimiter ;

delimiter //
create procedure getEventosSuscritosByTrabajador(v_id_trabajador int)
	begin
		select 
			tbl_evento.id as 'ID_EVENTO_SUSCRITO',
			tbl_empresa.razon_social as 'EMPRESA',        
			tbl_ciudad.ciudad as 'CIUDAD',
			tbl_evento.direccion as 'DIRECCION',
			tbl_evento.inicio_evento as 'INICIO',
			tbl_evento.termino_evento as 'TERMINO'
        from tbl_evento
			inner join tbl_ciudad on tbl_ciudad.id = tbl_evento.id_ciudad
			inner join tbl_organizador on tbl_organizador.id = tbl_evento.id_organizador
			inner join tbl_empresa on tbl_empresa.id = tbl_organizador.id_empresa
        where 
			-- evento activo
			tbl_evento.activo = 1 
            and tbl_evento.id in (
				select id from tbl_evt_suscripcion 
					where id_usuario = v_id_trabajador
					-- suscripcion activa
					and tbl_evt_suscripcion.activo = 1);
			
    end;
//delimiter ;

delimiter // 
create procedure desuscribirEvento(v_id_trabajador int, v_id_evento int)
	begin
		update tbl_evt_suscripcion set activo = 0 where 
        -- select * from tbl_evt_suscripcion
        id_usuario = v_id_trabajador;
    end;
//delimiter ;

delimiter //
create procedure listarEventosPorEmpresa(v_id_usuario int)
	begin
		declare v_id_organizador int;
        -- inicializar id_organizador
        select id from tbl_organizador where id_usuario = v_id_usuario into v_id_organizador;
        
        select * from tbl_evento 
			where id_organizador = v_id_organizador and activo = 1;       
    end;
//delimiter ;

delimiter // 
create procedure eliminarEvento(v_id_evento int)
	begin
		update tbl_evento set activo = 0 where id = v_id_evento;
    end;
//delimiter ;

delimiter //
create procedure ingresarAsistencia(v_id_evento int, v_id_trabajador int)
	begin    		
		update tbl_evt_suscripcion set asistido = 1 where id_usuario = v_id_trabajador and id_evento = v_id_evento;
    end;
//delimiter ;

call ingresarEvento (1, 2, '2018/11/23 2:10:00', '2018/11/23 8:12:00', 'Calle falsa #123', 15);
call ingresarEvento (1, 2, '2018/11/23 00:30:00', '2018/11/23 8:12:00', 'Calle falsa #123', 15);
call suscribirEvt(4,2);
call getUsuario('email@supervisor.cl', '1234');

call listarEventosDisponibles;
call listarEventosIniciados;
call listarTrabajadoresSuscritos (1, 0);
call getEventosSuscritosByTrabajador(4);
call listarTrabajadoresSuscritos (2,0);
