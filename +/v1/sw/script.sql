create database db_proyectoSoft
	default character set utf8
    default collate utf8_general_ci;
	
use db_proyectoSoft;

create table permisos(
	id int auto_increment,
	permiso varchar(15),
	primary key(id)
);

insert into permisos values(null, 'Administrador');
insert into permisos values(null, 'Estándar');


        
create table usuarios(
	id int auto_increment,
    nombreUsuario varchar(20),
    clave varchar(15),	
    permiso int,
    foreign key(permiso) references permisos(id),
    primary key(id)
);


insert into usuarios values(null, 'Emilio', '123', 1);
insert into usuarios values(null, 'Jose', '123', 2);
insert into usuarios values(null, 'German', '123', 2);
insert into usuarios values(null, 'Gonzalo', '123', 1);

select count(*) from usuarios where nombreUsuario='Emilio';

select count(*) from usuarios where nombreUsuario='Emilio' and clave='13';

select p.id from permisos p, usuarios u where p.id = u.permiso and u.nombreUsuario = 'Emilio' and u.clave = '123';

create table publicaciones(
	id int auto_increment,
    fecha date,
    titulo varchar(30),
    texto varchar(255),
    idUsuario int,
    foreign key(idUsuario) references usuarios(id),
    primary key(id)
);

delete from publicaciones where id=2;
select*from publicaciones;

insert into publicaciones values(null, curdate(), 'Publicacion1', 'texto1', 1);
insert into publicaciones values(null, curdate(), 'Publicacion2', 'texto2', 2);
insert into publicaciones values(null, curdate(), 'Publicacion3', 'texto3', 3);
insert into publicaciones values(null, curdate(), 'Publicacion4', 'texto4', 4);

select count(*) from publicaciones where id=7;