<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">		
        <title>Ejercicio 05 PDO - Arkaitz Rodriguez Martinez</title>
    </head>

    <body>
        <?php
        /**
         * @author Arkaitz Rodriguez Martinez
         * @since 07-11-2020
         */
        require_once '../config/confDBPDO.php';
        try {
            // Datos de la conexión a la base de datos
            $miDB = new PDO(DNS, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cómo capturar las excepciones y muestre los errores
            
            $arrayInserciones = [ //Inicializamos un array para insertar los valores
                "INSERT INTO Departamento VALUES ('TR1', 'Transacción Primera');",
                "INSERT INTO Departamento VALUES ('TR2', 'Transacción Segunda');",
                "INSERT INTO Departamento VALUES ('TR3', 'Transacción Tercera');"
            ];
            
            // Iniciamos la transacción
            $miDB->beginTransaction();
            $miDB->exec($arrayInserciones[0]); // Ejecutamos el primer valor del array
            $miDB->exec($arrayInserciones[1]); // Ejecutamos el segundo valor del array
            $miDB->exec($arrayInserciones[2]); // Ejecutamos el tercer valor del array
            $miDB->commit();
            echo "<h3>Se han realizado las 3 transacciones correctamente</h3>";
            echo "<br><br>";
            
            // Mostramos los errores por pantalla
        } catch (PDOException $excepcion) {
            echo "<h1>Error al acabar la transaccion</h1>";
            if ($excepcion->getCode() == 1045) { //codigo de error de conexion
                echo "<h4>No se ha podido establecer la conexión a la base de datos</h4>";
            } else {
                echo "<h4>Se ha producido un error en la inserción</h4>";
                $miDB->rollBack();
            }
        } finally {
            unset($miDB);
        }
        ?>
    </body>
</html>