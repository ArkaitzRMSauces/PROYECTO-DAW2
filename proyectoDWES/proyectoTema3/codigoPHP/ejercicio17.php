<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 17 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            14-10-2020
        -->
        <?php
            //Declaracion e inicializacion de constantes
            define("numFilas", 20);
            define("numAsientos", 15);
            //Inicializacion de matriz[numFilas][numColumnas]
            $aTeatro[1][1]='Persona1';
            $aTeatro[5][9]='Persona2';
            $aTeatro[10][2]='Persona3';
            $aTeatro[18][14]='Persona4';
            echo "<h1>FOREACH</h1>";
            foreach ($aTeatro as $fila => $aColumnas ){//Recorremos primer indice de la matriz
                foreach ($aColumnas as $asiento => $persona){//Recorremos segundo indice de la matriz
                    echo "Fila $fila, Asiento $asiento: $persona <br>";//Mostramos el resultado 
                }
            }
            echo "<h1>FOR</h1>";
            for ($numFil = 1; $numFil<=numFilas; $numFil++){//Recorremos primer indice de la matriz
                for ($numAsientos = 1; $numAsientos<=numAsientos; $numAsientos++){//Recorremos segundo indice de la matriz
                    if(!empty($aTeatro[$numFil][$numAsientos])){//Comprobamos campos vacios, para no mostrarlos
                        echo "Fila $numFil, Asiento $numAsientos:".$aTeatro[$numFil][$numAsientos],"<br>";//Mostramos el resultado 
                    }
                }
            }
            echo "<h1>WHILE</h1>";
            $filasWhile=0;//Creamos contador de filas
            while($filasWhile<=numFilas){//Creamos el bucle para recorrer las filas hasta que llegue a la ultima
                $asientosWhile=0;//Creamos contador de asientos
                while ($asientosWhile<=numAsientos){//Creamos el bucle para recorrer los asientos hasta que llegue al ultimo
                    if(!empty($aTeatro[$filasWhile][$asientosWhile])){//Comprobamos campos vacios, para no mostrarlos
                        echo "Fila $filasWhile, Asiento $asientosWhile:".$aTeatro[$filasWhile][$asientosWhile],"<br>";//Mostramos el resultado 
                    }
                    $asientosWhile++;//Vamos incrementando el contador, para no crear bucle infinito
                }
                $filasWhile++;//Vamos incrementando el contador, para no crear bucle infinito
            }
        ?>  
    </body>
</html>
