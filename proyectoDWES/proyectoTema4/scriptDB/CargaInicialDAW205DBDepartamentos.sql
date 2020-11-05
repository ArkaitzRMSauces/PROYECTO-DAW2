/**
 * Author:  Arkaitz Rodriguez
 * Created: 27-10-2020
*/
/*
    Seleccionamos la base de datos
*/
USE DAW205DBDepartamentos;
/*
    Metemos valores en los campos de la tabla
*/
INSERT INTO Departamento VALUES
('BIO','Departamento de biologia', CURDATE(), 2.5),
('TEC','Departamento de tecnologia', CURDATE(), 1.0),    
('INF','Departamento de informatica', CURDATE(), 5.5);