<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 05 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
           $fechaActual = new DateTime();
           $segundosTimeStamp = $fechaActual -> getTimestamp();
           echo "Segundos desde el 1 de Enero de 1970: ".$segundosTimeStamp;
        ?>
    </body>
</html>
