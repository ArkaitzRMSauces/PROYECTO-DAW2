<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 06 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
            echo "Fecha Actual: " . date("d/m/Y")."<br>";
            echo "Fecha dentro de 60 días: " . date ("d/m/Y", strtotime("+60day"));
        ?>
    </body>
</html>
