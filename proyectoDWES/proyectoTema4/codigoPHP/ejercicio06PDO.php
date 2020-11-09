<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">		
        <title>Ejercicio 06 PDO - Arkaitz Rodriguez Martinez</title>
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

            $sentenciaSQL = "INSERT INTO Departamento VALUES (:codigo,:descripcion,:fechaBaja,:volumenNegocio);"; // Sentencia SQL que deseamos realizar
            $aDepartamentosNuevos = array(
                array('CD1', 'Departamento Preparado 1', null, 50),
                array('CD2', 'Departamento Preparado 2', null, 80),
                array('CD3', 'Departamento Preparado 3', null, 90),
            );

            // Hacemos la consulta preparada
            $consultaPreparada = $miDB->prepare($sentenciaSQL);
            $consultaPreparada->bindParam(':codigo', $codigo);
            $consultaPreparada->bindParam(':descripcion', $descripcion);
            $consultaPreparada->bindParam(':fechaBaja', $fechaBaja);
            $consultaPreparada->bindParam(':volumenNegocio', $volumenNegocio);
            // El foreach recorre el array DepartamentosNuevos
            foreach ($aDepartamentosNuevos as $key => $value) {
                $miDB->beginTransaction();
                $consultaPreparada->bindParam(':codigo', $value[0]); // Ejecutamos el primer valor del array
                $consultaPreparada->bindParam(':descripcion', $value[1]); // Ejecutamos el segundo valor del array
                $consultaPreparada->bindParam(':fechaBaja', $value[2]); // Ejecutamos el tercer valor del array
                $consultaPreparada->bindParam(':volumenNegocio', $value[3]); // Ejecutamos el cuarto valor del array
                $consultaPreparada->execute();
                $miDB->commit();
            }
            $consultaSelect = $miDB->prepare('SELECT * FROM Departamento'); //consulta preparada que mostrara todos los registros de la tabla Departamentos
            $consultaSelect->execute();

            // Si todo se realiza coreectamente mostramos un mensaje
            echo "<h3>Insercción realizada correctamente.</h3>";
        } catch (PDOException $mensajeError) {
            echo "Error: " . $mensajeError->getMessage() . "<br>";
            echo "Código de error: " . $mensajeError->getCode();
        } finally {
            unset($miDB);
        }
        ?>
    </body>
</html>