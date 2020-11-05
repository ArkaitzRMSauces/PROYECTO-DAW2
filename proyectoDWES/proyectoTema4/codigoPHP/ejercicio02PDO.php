<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 02 PDO - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
            /**
                * Author:  Arkaitz Rodriguez
                * Created: 29-10-2020
                * Desc: Mostrar datos de consulta a la bd departamentos en PDO
              */
            require_once '../config/confDBPDO.php';//Importamos archivo de configuracion de la conexion de BD
            try {   
                $miDB = new PDO(DNS, USER, PASSWORD);//Creamos el objeto PDO, con la conexion
                $resultadoConsulta = $miDB->query('SELECT * FROM Departamento');//Consulta que queremos hacer a BD
        ?>
        <table>
            <tr>
                <th>CodDepartamento</th>
                <th>DescDepartamento</th>
                <th>FechaBaja</th>
                <th>VolumenNegocio</th>
            </tr>
            <?php
                $objetoDepartamento = $resultadoConsulta->fetchObject();//Al realizar el fetchObject, se pueden sacar los datos de $objetoDepartamento como si fuera un objeto
                while ($objetoDepartamento){//Recorremos las tablas con la consulta
            ?>
            <tr>
                <!--Mostramos valores-->
                <td><?php echo $objetoDepartamento->CodDepartamento ?></td>
                <td><?php echo $objetoDepartamento->DescDepartamento ?></td>
                <td><?php echo $objetoDepartamento->FechaBaja ?></td>
                <td><?php echo $objetoDepartamento->VolumenNegocio ?></td>
                <?php $objetoDepartamento = $resultadoConsulta->fetchObject();//Avanzamos el puntero ?>
            </tr>
            <?php 
                } 
            ?>
        </table>    
        <?php
               echo "Numero de registros: ".$resultadoConsulta->rowCount()."</p>"; // rowCount() cuenta el numero de filas que han sido afectadas por la consulta
               echo "Conexión establecida con éxito" . PHP_EOL . '<br/>';//Si conecta, muestra mensaje de conexion
            }catch (PDOException $miExceptionPDO) { //En caso de que no haga la conexion saltara al catch
                echo 'Error :'.$miException->getMessage();//Muestra el mensaje de error
                echo 'Codigo de error :'.$miException->getCode();//Muestra el codigo de error
            }finally{//Ejecucion de finalizar
                unset($miDB);//Cierra la conexion al finalizar
            }

        ?>  
    </body>
</html>