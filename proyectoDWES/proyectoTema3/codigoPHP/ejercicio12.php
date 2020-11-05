<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 12 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            13-10-2020
        -->
        <h1>FOREACH</h1>
        <table border="1">
            <tr>
                <th>Variable</th>
                <th>Valor</th>
            </tr>
            <?php
            foreach ($_SERVER as $codigoIndice => $valor) { //Con el foreach recorremos el array
                ?>
                <tr>
                    <td><?php echo '<b>$_SERVER[' . "'" . $codigoIndice . "'" . "]</b>"; ?></td>
                    <td><?php echo "$valor"; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <h1>PRINT_R</h1>
            <?php
                    print_r($_SERVER);
            ?>  
    </body>
</html>
