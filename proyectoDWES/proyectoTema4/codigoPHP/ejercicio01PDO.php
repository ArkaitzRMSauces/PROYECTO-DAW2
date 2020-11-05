<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 01 PDO - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
        /*
            * Author:  Arkaitz Rodriguez
            * Created: 28-10-2020
            * Desc: Conexion a la BD con PDO
        */
            require_once '../config/confDBPDO.php';//Importamos archivo de configuracion de la conexion de BD
            try {
                $miDB = new PDO(DNS, USER, PASSWORD);//Creamos el objeto PDO, con la conexion
                echo "<p>Conexión establecida con éxito</p>";//Si conecta, muestra mensaje de conexion
            }catch (PDOException $miException) {//En caso de que no haga la conexion saltara al catch
                echo 'Error :'.$miException->getMessage();//Muestra el mensaje de error
                echo 'Codigo de error :'.$miException->getCode();//Muestra el codigo de error
            }finally{//Ejecucion de finalizar
                unset($miDB);//Cierra la conexion al finalizar
            }      
        ?>
    </body>
</html>