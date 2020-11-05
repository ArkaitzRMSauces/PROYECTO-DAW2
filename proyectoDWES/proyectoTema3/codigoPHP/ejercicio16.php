<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 16 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            14-10-2020
        -->
        <?php
            function imprimir_Array( $paga, $dia){// Nota: en funciones & evitara hacer una copia de la variable pasada por parametro y la modificara directamente
            echo "$dia--->$paga <br>";
        }

        $aSemana=[
            'Lunes'=>20,
            'Martes'=>50,
            'Miércoles'=>35,
            'Jueves'=>25,
            'Viernes'=>50,
            'Sábado'=>150,
            'Domingo'=>150
        ];

        echo "Con print_r<br>";
        print_r($aSemana);
        echo "<br>Con var_dump<br>";
        var_dump($aSemana);
        echo "<br>Con array_walk<br>";
        array_walk($aSemana, 'imprimir_Array');
        ?>
    </body>
</html>
