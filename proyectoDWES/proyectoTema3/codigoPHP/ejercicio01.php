<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 01 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <?php
            $varString = 'Hola';
            $varInt = 1;
            $varFloat = 2.5;
            $varBoolean = true;
            echo 'Funcion echo()<br/><br/>';
            echo '"$varString", tipo "' . gettype($varString) . '" y valor: ' . "$varString<br/>"; 
            echo '"$varInt", tipo "' . gettype($varInt) . '" y valor: ' . "$varInt<br/>"; 
            echo '"$varFloat", tipo "' . gettype($varFloat) . '" y valor: ' . "$varFloat<br/>"; 
            echo '"$varBoolean", tipo "' . gettype($varBoolean) . '" y valor: ' . "$varBoolean<br/>"; 
            echo "<br/><br/>";
            echo 'Funcion print() <br/><br/>';
            print '"$varString", tipo "' . gettype($varString) . '" y valor: ' . "$varString<br/>"; 
            print '"$varInt", tipo "' . gettype($varInt) . '" y valor: ' . "$varInt<br/>"; 
            print '"$varFloat", tipo "' . gettype($varFloat) . '" y valor: ' . "$varFloat<br/>"; 
            print '"$varBoolean", tipo "' . gettype($varBoolean) . '" y valor: ' . "$varBoolean<br/>"; 
            echo "<br/><br/>";
            echo "Funcion printf() <br/><br/>";
            printf('"$varString", tipo "' . gettype($varString) . '" y valor: ' . "$varString<br/>"); 
            printf('"$varInt", tipo "' . gettype($varInt) . '" y valor: ' . "$varInt<br/>"); 
            printf('"$varFloat", tipo "' . gettype($varFloat) . '" y valor: ' . "$varFloat<br/>"); 
            printf('"$varBoolean", tipo "' . gettype($varBoolean) . '" y valor: ' . "$varBoolean<br/>"); 
            echo "<br/><br/>";
            echo "Funcion print_r() <br/><br/>";
            print_r('"$varString", tipo "' . gettype($varString) . '" y valor: ' . "$varString<br/>"); 
            print_r('"$varInt", tipo "' . gettype($varInt) . '" y valor: ' . "$varInt<br/>"); 
            print_r('"$varFloat", tipo "' . gettype($varFloat) . '" y valor: ' . "$varFloat<br/>"); 
            print_r('"$varBoolean", tipo "' . gettype($varBoolean) . '" y valor: ' . "$varBoolean<br/>");
            echo "<br/><br/>";
            echo "Funcion var_dump() <br/><br/>";
            var_dump('"$varString", tipo "' . gettype($varString) . '" y valor: ' . "$varString<br/>"); 
            var_dump('"$varInt", tipo "' . gettype($varInt) . '" y valor: ' . "$varInt<br/>"); 
            var_dump('"$varFloat", tipo "' . gettype($varFloat) . '" y valor: ' . "$varFloat<br/>"); 
            var_dump('"$varBoolean", tipo "' . gettype($varBoolean) . '" y valor: ' . "$varBoolean<br/>");
            echo "<br/><br/>";
        ?>
    </body>
</html>