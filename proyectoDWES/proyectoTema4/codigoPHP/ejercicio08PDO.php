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
        try {
            $miDB = new PDO('mysql:host=192.168.20.19;dbname=DAW213DBdepartamentos', 'usuarioDAW213Departamentos', 'paso');
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentenciaSQL = $miDB->query("SELECT * FROM Departamento;");
            $ficheroXML = new DOMDocument("1.0", "utf-8"); // Creamos el fichero
            $ficheroXML->formatOutput = true; // Hacemos que el fichero salga con espacios y tabulado
            $raiz = $ficheroXML->appendChild($ficheroXML->createElement("Departamentos")); // Creamos la rama hijos de departamentos

            while ($registro = $sentenciaSQL->fetchObject()) { // creamos un bucle para sacar todos los elementos en la estructura XML
                $departamento = $raiz->appendChild($ficheroXML->createElement("Departamento"));
                $departamento->appendChild($ficheroXML->createElement("codigoDepartamento", $registro->CodDepartamento));
                $departamento->appendChild($ficheroXML->createElement("descripcionDepartamento", $registro->DescDepartamento));
            }
            $ficheroXML->save("../tmp/Departamentos.xml");
            //header("Content-Disposition: attachment; filename=" . "Departamentos.xml"); // Descargar el fichero a local

            echo "<h3>Se ha realizado correctamente la exportación</h3>";
        } catch (PDOException $mensajeError) {
            echo "Error: " . $mensajeError->getMessage() . "<br>";
            echo "Código de error: " . $mensajeError->getCode();
        } finally {
            unset($miDB);
        }
        ?>
    </body>
</html>