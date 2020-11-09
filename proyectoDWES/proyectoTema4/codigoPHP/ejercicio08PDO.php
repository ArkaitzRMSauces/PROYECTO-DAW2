<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 08 PDO - Arkaitz Rodriguez Martinez</title>
    </head>
    <body>
        <?php
        /**
         * @author Arkaitz Rodriguez Martinez
         * @since 09-11-2020
         */
        require_once '../config/confDBPDO.php';
        try {
            // Datos de la conexión a la base de datos
            $miDB = new PDO(DNS, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentenciaSQL = $miDB->query("SELECT * FROM Departamento;");
            $ficheroXML = new DOMDocument(); // Creamos el fichero
            $ficheroXML->formatOutput = true; // Hacemos que el fichero salga con espacios y tabulado
            $raiz = $ficheroXML->appendChild($ficheroXML->createElement("Departamentos")); // Creamos la rama hijos de departamentos
            
             
            while ($registro = $sentenciaSQL->fetchObject()) { // creamos un bucle para sacar todos los elementos en la estructura XML
                $departamento = $raiz->appendChild($ficheroXML->createElement("Departamento"));
                $departamento->appendChild($ficheroXML->createElement("codigoDepartamento", $registro->CodDepartamento));
                $departamento->appendChild($ficheroXML->createElement("descripcionDepartamento", $registro->DescDepartamento));
                $departamento->appendChild($ficheroXML->createElement("FechaBaja", $registro->FechaBaja));
                $departamento->appendChild($ficheroXML->createElement("VolumenNegocio", $registro->VolumenNegocio));                 
            }
            $ficheroXML->saveXML();
            $ficheroXML->save("../tmp/departamento.xml");
            //Descargar el fichero a local

            echo "<h3>Exportacion realizada</h3>";
        } catch (PDOException $mensajeError) {
            echo "Error: " . $mensajeError->getMessage() . "<br>";
            echo "Código de error: " . $mensajeError->getCode();
        } finally {
            unset($miDB);
        }
        ?>
    </body>
</html>