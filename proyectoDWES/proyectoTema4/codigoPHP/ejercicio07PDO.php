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

        $xml = simplexml_load_file("../tmp/DepartamentosImportar.xml"); //Cargamos el archivo 

        try {
            $miDB = new PDO(DNS, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exp) {
            echo $exp->getMessage();
            echo "ERROR";
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
                                            )  ENGINE=INNODB;');
            $consultaCrear->execute();

            foreach ($xml as $value) {
                $sqlDepartamento = "INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES(:codDepartamento,:descDepartamento,:volumenNegocio)";
                $consulta = $miDB->prepare($sqlDepartamento);
                $parametros = [
                    ":codDepartamento" => $value->CodDepartamento,
                    ":descDepartamento" => $value->DescDepartamento,
                    ":volumenNegocio" => $value->VolumenNegocio
                ];
                $consulta->execute($parametros);
            }
            $miDB->commit();
            echo "<h3>Se ha realizado la importacion</h3>";
        } catch (Exception $exp) {
            $miDB->rollBack();
            echo $exp->getMessage();
            echo $exp->getCode();
            echo "ERROR";
        }finally{
            unset($miDB);
        }
        ?>  
    </body>
</html>