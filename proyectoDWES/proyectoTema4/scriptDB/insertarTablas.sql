/**
 * Author:  Arkaitz Rodriguez
 * Created: 27-10-2020
*/

/*
    Seleccionamos la base de datos que acabamos de crear
*/
USE db771560304;

/*
    Metemos valores en los campos de la tabla
*/
INSERT INTO Departamento VALUES
('BIO','Departamento de biologia', CURDATE(), 2.5),
('TEC','Departamento de tecnologia', CURDATE(), 1.0),    
('INF','Departamento de informatica', CURDATE(), 5.5);