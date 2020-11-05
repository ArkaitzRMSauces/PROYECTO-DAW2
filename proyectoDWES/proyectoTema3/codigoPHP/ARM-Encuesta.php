<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Encuesta - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            @author ArkaitzRodriguez
            @since 20-10-2020
            @version 1.0
        -->
        <?php
            //Importamos la libreria
            require_once '../core/201020libreriaValidacion.php';
            //Variable booleana para validar entrada
            $entradaOK = true;
            //Constantes para la utilizacion de metodos
            define('REQUIRED', 1);
            define('OPTIONAL', 0);
            define('NUMPERSONAS',3);
            //Creamos e inicializamos el array de errores y de valores
            for($fila=0;$fila<NUMPERSONAS;$fila++){
                $aErrores[$fila]=[
                    'eNombre'.$fila=>null,
                    'eCantidad'.$fila=>null
                ];
                $aFormulario[$fila]=[
                    'eNombre'.$fila=>null,
                    'eCantidad'.$fila=>null
                ];
            } 
        if(isset($_POST['enviar'])){
            for($fila=0;$fila<NUMPERSONAS;$fila++){
                $aErrores[$fila]['eNombre'.$fila]= validacionFormularios::comprobarAlfabetico($_POST['nombre'.$fila], 100, 0, REQUIRED);
                $aErrores[$fila]['eCantidad'.$fila]= validacionFormularios::comprobarFloat($_POST['cantidad'.$fila],100000, 1, REQUIRED);
                foreach ($aErrores as $campo => $error) {
                    foreach($error as $errores => $valor){
                        if($valor!=null){
                            $entradaOK=false;
                        }
                    }
                }
            }
        }else{
            $entradaOK=false;
        }
        if($entradaOK){
            for($fila=0;$fila<NUMPERSONAS;$fila++){
                $aFormulario[$fila]['eNombre'.$fila]= $_POST['nombre'.$fila];
                $aFormulario[$fila]['eCantidad'.$fila]=$_POST['cantidad'.$fila];
                echo '<p>Bienvenido '. $aFormulario[$fila]['eNombre'.$fila].'</p>';
                if($aFormulario[$fila]['eCantidad'.$fila]!==0){
                    echo '<p>Cantidad ingresada: '. $aFormulario[$fila]['eCantidad'.$fila].'€</p>';
                }
            }
        }else{
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php 
                for($fila=0;$fila<NUMPERSONAS;$fila++){
                ?>
                <fieldset>
                    <legend>Encuesta</legend>
                    <p>
                        <label>Nombre:</label>
                        <input type="text" name="<?php echo"nombre".$fila;?>" value="<?php 
                            if($aErrores[$fila]["eNombre".$fila]== null && isset($_POST['nombre'.$fila])){ 
                                echo $_POST['nombre'.$fila];   
                            }

                        ?>"/>
                        <?php 
                            if ($aErrores[$fila]['eNombre'.$fila] != NULL) {
                                echo "<div class='errores'>".
                                    $aErrores['eNombre']. 
                                '</div>'; 
                            }
                        ?>
                    </p>
                    <p>
                        <label>Cantidad a ingresar:</label>
                        <input type="text" name="<?php echo"cantidad".$fila;?>".$fila value="<?php                            
                            if($aErrores[$fila]['eCantidad'.$fila]== null && isset($_POST['cantidad'])){ 
                                echo $_POST['cantidad'.$fila];   
                            }
                        ?>"/>
                        <?php 
                            if ($aErrores[$fila]['eCantidad'.$fila] != NULL) {
                                echo "<div class='errores'>".
                                    $aErrores[$fila]['eCantidad'.$fila]. 
                                '</div>'; 
                            }
                        ?>
                    </p>
                </fieldset>
                    <?php
        }           
                    ?>
                <p><input type="submit" value="Enviar" name="enviar"/>
                    <input type="reset" value="Borrar" name="borrar"/></p>
            </form>
            <?php
        }
        ?>
    </body>
</html>