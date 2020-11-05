/**
 * Author:  Arkaitz Rodriguez
 * Created: 27-10-2020
*/
/*
    Creamos Base de datos si no existe, en el caso de que exista no la crearemos
*/
CREATE DATABASE IF NOT EXISTS DAW205DBDepartamentos;

/*
    Seleccionamos la base de datos que acabamos de crear
*/
USE DAW205DBDepartamentos;

/*
    Creamos tabla si no existe y los campos correspondientes, 
    en el caso de que exista no la crearemos,
    usaremos el motor InnoDB para la integridad referencial
*/
CREATE TABLE IF NOT EXISTS Departamento(
    CodDepartamento varchar(3) primary key,
    DescDepartamento varchar(255),
    FechaBaja date,
    VolumenNegocio float
)engine=InnoDB;

/*
    Creamos usuario en el caso de que no exista
*/
CREATE USER IF NOT EXISTS 'usuarioDAW205DBDepartamentos'@'%' IDENTIFIED BY 'paso';

/*
    Damos permisos al usuario para poder administrar la base de datos
*/
GRANT ALL PRIVILEGES ON DAW205DBDepartamentos.* TO 'usuarioDAW205DBDepartamentos'@'%';
