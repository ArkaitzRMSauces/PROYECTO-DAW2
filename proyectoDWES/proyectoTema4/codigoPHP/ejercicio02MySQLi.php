<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 02 MySQLi - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
            /*
                * Author:  Arkaitz Rodriguez
                * Created: 29-10-2020
                * Desc: Mostrar datos de consulta a la bd departamentos en MySQLi
            */
            require_once '../config/confDBMySQLi.php';//Importamos archivo de configuracion de la conexion de BD
            $miDB = new mysqli();//Creamos objeto mysqli
            $miDB->connect(HOST, USER, PASSWORD, DBNAME);//Pasamos los parametros de la conexion
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
                foreach ($resultadoConsulta as $departamento){//Recorremos las tablas con la consulta
            ?>
            <tr>
                <!--Mostramos valores-->
                <td><?php echo $departamento['CodDepartamento'] ?></td>
                <td><?php echo $departamento['DescDepartamento'] ?></td>
                <td><?php echo $departamento['FechaBaja'] ?></td>
                <td><?php echo $departamento['VolumenNegocio'] ?></td>
            </tr>
            <?php 
                }
            ?>         
        </table>
            <?php
                if (!$miDB) {//Si es null mostrara mensajes de error
                    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }else{//Si no es null mostrara mensaje de conexion
                    echo "Numero de registros: ". $resultadoConsulta->num_rows ."</p>";// num_rows cuenta el numero de filas que han sido afectadas por la consulta
                    echo "Conexión establecida con éxito" . PHP_EOL . '<br/>';
                }
                mysqli_close($miDB);//Cuando finaliza cerramos la conexion
            ?>
    </body>
</html>