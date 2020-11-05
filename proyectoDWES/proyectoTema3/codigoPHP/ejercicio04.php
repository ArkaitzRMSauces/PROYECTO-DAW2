<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 04 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
        // Para que la hora se muestre en Portugués hay que instalar el paquete del idioma en el servidor
        setlocale(LC_TIME, "pt_PT.UTF-8"); //Seleccionamos el idioma por defecto al portugues
        date_default_timezone_set("Europe/Lisbon"); //Ajustamos la zona horaria portuguesa
        echo strftime("Fecha en Portugal: %A %d %B, %G<br>");
        //%A - Dia de la semana
        //%d - Numero del dia con 0 delante
        //%B - Nombre del mes completo
        //%G - Año
        echo strftime("Hora en Portugal: %H:%M<br>"); //strftime es una función que formatea la fecha y hora
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
