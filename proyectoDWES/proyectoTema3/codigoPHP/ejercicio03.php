<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 03 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
           // Para que la hora se muestre en Español hay que instalar el paquete del idioma en el servidor
            setlocale(LC_ALL, "es_ES.utf-8"); //Seleccionamos el idioma para la fecha
            date_default_timezone_set("Europe/Madrid"); //Ajustamos la zona horaria española
            echo strftime("Fecha en España: %A %d %B, %G<br>");
            //%A - Dia de la semana
            //%d - Numero del dia con 0 delante
            //%B - Nombre del mes completo
            //%G - Año
            echo strftime("Hora en España: %H:%M<br>"); //strftime es una función que formatea la fecha y hora
            //%H - Horas
            //%M - Minutos

            $fechaActual = new DateTime();
            echo "Fecha con la clase DateTime: " . $fechaActual->format('d-m-Y H:i:s') . "<br>";
            echo "Año con la clase DateTime: " . $fechaActual->format('d/m/Y') . "<br>";
            echo "Año con la clase DateTime: " . $fechaActual->format('Y') . "<br>";
            echo "Mes con la clase DateTime: " . $fechaActual->format('m') . "<br>";
            echo "Día con la clase DateTime: " . $fechaActual->format('d') . "<br>";
            echo "Hora con la clase DateTime: " . $fechaActual->format('H:i:s') . "<br>";
        ?>
    </body>
</html>
