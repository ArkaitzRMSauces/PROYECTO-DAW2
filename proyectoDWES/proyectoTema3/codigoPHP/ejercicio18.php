<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 18 - Arkaitz Rodriguez Martinez</title>        
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
            
            function RecorrerFilas($aColumnas, $fila){//Creamos la funcion que recibe como parametro un Array de columnas, y las filas
                array_walk($aColumnas, 'RecorrerColumnas', $fila);              
            }
            function RecorrerColumnas($persona, $columna, $fila){//Creamos la funcion que recibe como parametro la persona, la columna y la fila
                echo "Fila $fila, Columna $columna: $persona <br>";
            }
            array_walk($aTeatro, 'RecorrerFilas');
        ?>  
    </body>
</html>
