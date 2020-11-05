<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 01 MySQLi - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
            /*
                * Author:  Arkaitz Rodriguez
                * Created: 28-10-2020
                * Desc: Conexion a la BD con MySQLi
            */
            require_once '../config/confDBMySQLi.php';//Importamos archivo de configuracion de la conexion de BD
            $miDB = new mysqli();//Creamos objeto mysqli
            $miDB->connect(HOST, USER, PASSWORD, DBNAME);//Pasamos los parametros de la conexion
            if (!$miDB) {//Si es null mostrara mensajes de error
                echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }else{//Si no es null mostrara mensaje de conexion
                echo "Conexión establecida con éxito" . PHP_EOL . '<br/>';
            }
            mysqli_close($miDB);//Cuando finaliza cerramos la conexion
        ?>
    </body>
</html>