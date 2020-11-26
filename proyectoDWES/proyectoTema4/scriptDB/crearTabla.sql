/**
 * Author:  Arkaitz Rodriguez
 * Created: 27-10-2020
*/

/*
    Seleccionamos la base de datos que acabamos de crear
*/
USE db771560304;

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
