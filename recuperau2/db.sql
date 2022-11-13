drop database if exists utez;
create database utez;
use utez;
select avg(calificacion) as Promedio_General
from evaluacion;

create table docente  (
nombre varchar(50) not null, 
apellidos varchar(50) not null,
 fecha_nacimiento date not null,
 curp varchar(18) not null,
id int primary key auto_increment
);

create table estudiante  (
 nombre varchar(50) not null,
 apellidos varchar(50) not null,
 fecha_de_nacimiento date not null,
 curp varchar(18) not null,
 matricula varchar(50) primary key
);

create table evaluacion (
 estudiante varchar(50) not null,
 docente varchar(50) not null,
 materia varchar(50) not null,
 calificacion float(5),
 constraint fk_estudiante_evaluacion foreign key (estudiante) references estudiante (matricula),
 constraint fk_docente_evaluacion foreign key (docente) references docente (id)
);