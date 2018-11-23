/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  DiegoDX
 * Created: 24-oct-2018
 */

go
use master;
if exists (select name from sys.databases where name = 'db_bodegaje')
	drop database db_bodegaje;

create database db_bodegaje;
go

use db_bodegaje;

create table tbl_region(
	id int not null identity(1,1),
	region varchar(32),
	primary key(id)	
);

insert into tbl_region(region) values('Region Metropolitana');
insert into tbl_region(region) values('VI Libertador BOH');

create table tbl_ciudad(
	id int not null identity(1,1),
	id_region int,
	ciudad varchar(32),
	primary key(id),
	foreign key(id_region) references tbl_region(id)
);

insert into tbl_ciudad(id_region, ciudad) values(1, 'Santiago');
insert into tbl_ciudad(id_region, ciudad) values(2, 'Rancagua');

create table tbl_permiso(
	id int not null identity(1,1),
	permiso varchar(32),
	primary key(id)
);

insert into tbl_permiso(permiso) values('Administrador');
insert into tbl_permiso(permiso) values('Organizador');
insert into tbl_permiso(permiso) values('Empleado');

create table tbl_usuario(
	id int not null identity(1,1),
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
	id_permiso, 
	id_ciudad, 
	rut, 
	nombre, 
	apellido, 
	telefono, 
	domicilio, 
	email
) 
values(
	2,
	1,
	'11-1',
	'Nombre',
	'Apellido',
	'+01234567890',
	'Calle #123',
	'email@dominio.cl'
);

create table tbl_empresa(
	id int not null identity(1,1),
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
	id int not null identity(1,1),
	id_usuario int,
	id_empresa int,
	activo bit default 1,
	primary key(id),
	foreign key(id_usuario) references tbl_usuario(id),
	foreign key(id_empresa) references tbl_empresa(id),
);

insert into tbl_organizador(id_usuario, id_empresa) values(1, 1);

create table tbl_evento(
	id int not null identity(1,1),
	id_ciudad int,
	id_organizador int,
	fecha_ingreso datetime default getdate(),
	inicio_evento datetime,
	termino_evento datetime,
	direccion varchar(32),
	cantidad_personal int,
	copado bit default 0,
	activo bit default 1,
	primary key(id),
	foreign key(id_organizador) references tbl_organizador(id),
	foreign key(id_ciudad) references tbl_ciudad(id),
);

insert 
	into tbl_evento(id_ciudad, id_organizador, inicio_evento, termino_evento, direccion, cantidad_personal) 
			values(1, 1, convert(datetime,'19-10-18 10:34:09 PM',5), convert(datetime,'19-10-18 19:34:09 PM',5), 'Calle falsa #123', 15);


create table tbl_evt_suscripcion(
	id int not null identity(1,1),
	fecha_ingreso datetime default getdate(),
	id_usuario int,
	id_evento int,
	activo bit default 1,
	primary key(id),
	foreign key(id_usuario) references tbl_usuario(id),
	foreign key(id_evento) references tbl_evento(id),
);

go
create procedure actualizarEstadoEvento @id_evento int as
	begin
		declare @suscritos int = (select count(*) from tbl_evt_suscripcion where id_evento = @id_evento);
		declare @cupos int = (select cantidad_personal from tbl_evento where id = @id_evento);	
		
		if (@suscritos = @cupos)
			begin
				update tbl_evento set copado = 1 where id = @id_evento;
			end
	end
go
create procedure suscribirEvt @id_usuario int, @id_evento int as
	begin
		declare @copado bit = (select copado from tbl_evento where id = @id_evento);

		--Si ya está suscrito
		if exists(select * from tbl_evt_suscripcion where id_evento = @id_evento and id_usuario = @id_usuario and activo = 1)
			print 'Ya se ha suscrito a evento'

		--Si hay cupos
		else if (@copado = 0)
			begin;
				insert into tbl_evt_suscripcion(id_evento, id_usuario) 
					values(@id_evento, @id_usuario);
				exec actualizarEstadoEvento @id_evento;
				print 'Evento suscrito con exito';
			end;

		--No hay cupos
		else
			print 'No hay cupos';
	end
go

exec suscribirEvt 1,1

create table tbl_asistencia(
	id int not null identity(1,1),
	hora_ingreso datetime default getDate(),
	hora_salida datetime,
	id_evento int,
	id_usuario int,
	primary key(id),
	foreign key(id_evento) references tbl_evento(id),
	foreign key(id_usuario) references tbl_usuario(id)
);

go
create procedure listarEventosDisponibles as
	-- id de eventos no finalizados
	select * from tbl_evento where datediff(MINUTE, getDATE(), termino_evento) > 0 and copado = 0;
go

-- exec listarEventosDisponibles