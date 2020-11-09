<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 07 PDO - Arkaitz Rodriguez Martinez</title>
    </head>
    <body>
        <?php
        /**
         * @author Arkaitz Rodriguez Martinez
         * @since 09-11-2020
         */
        require_once '../config/confDBPDO.php';

        $ficheroxml = simplexml_load_file("../tmp/departamento.xml"); //Cargamos el archivo 

        try {
            $miDB = new PDO(DNS, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exp) {
            echo $exp->getMessage();
            echo "Error con la conexion";
        }
        try {
            $miDB->beginTransaction();
            $consultaDrop = $miDB->prepare('DROP TABLE Departamento');
            $consultaDrop->execute();
            $consultaCrear = $miDB->prepare('CREATE TABLE IF NOT EXISTS Departamento (
                                                CodDepartamento CHAR(3) PRIMARY KEY,
                                                DescDepartamento VARCHAR(255) NOT NULL,
                                                FechaBaja DATE NULL,
                                                VolumenNegocio float NULL
                                            )ENGINE=INNODB;'
                                            );
            $consultaCrear->execute();

            foreach ($ficheroxml as $value) {
                $sqlDepartamento = "INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) VALUES(:codDepartamento,:descDepartamento,:fechaBaja,:volumenNegocio)";
                $consulta = $miDB->prepare($sqlDepartamento);
                $parametros = [
                    ":codDepartamento" => $value->CodDepartamento,
                    ":descDepartamento" => $value->DescDepartamento,
                    ":fechaBaja" => $value->FechaBaja,
                    ":volumenNegocio" => $value->VolumenNegocio
                ];
                $consulta->execute($parametros);
            }
            $miDB->commit();
            echo "<h3>Importacion realizada</h3>";
        } catch (Exception $error) {
            $miDB->rollBack();
            echo $error->getMessage();
            echo "<br>";
            echo $error->getCode();
            echo "<br>Error al importar";
        }finally{
            unset($miDB);
        }
        ?>  
    </body>
</html>