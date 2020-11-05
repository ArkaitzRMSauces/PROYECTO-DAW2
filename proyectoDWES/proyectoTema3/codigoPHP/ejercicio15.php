<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 15 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            13-10-2020
        -->
       <?php
            $aSemana=[
                'Lunes'=>20,
                'Martes'=>50,
                'Miércoles'=>35,
                'Jueves'=>25,
                'Viernes'=>50,
                'Sábado'=>150,
                'Domingo'=>150
            ];
                 
            $acumulador=0;
            echo '<h3>Sueldo por dia: </h3>';
            foreach ($aSemana as $dia => $sueldoDia){
                echo "$dia: $sueldoDia €<br>";
                $acumulador+=$sueldoDia;
            }
            echo '<br><b>Sueldo Total: </b>'.$acumulador.'€';
        ?>  
    </body>
</html>
