<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 24 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            18-10-2020
        -->
        <?php
            //Requerimos una vez la libreria de validaciones
            require_once '../core/201020libreriaValidacion.php';
            //Creamos una variable boleana para definir cuando esta bien o mal rellenado el formulario
            $entradaOK = true;
            
            //Creamos dos constantes: 'required' indica si un campo es obligatorio (tiene que tener algun valor); secundary indica que un campo no es obligatorio
            define('REQUIRED', 1);
            define('OPTIONAL', 0);
           
            //Array que contiene los posibles errores de los campos del formulario
            $aErrores=[
                'eNombre'=> null,
                'eColor'=> null,
                'eTirador'=> null,
            ];
            
            //Array que contiene los valores correctos de los campos del formulario
            $aFormulario=[
                'fNombre'=> null,
                'fColor' => null,
                'fTirador' => null,
            ];
            
            if(isset($_REQUEST['enviar'])){ //si se pulsa 'enviar' (input name="enviar")
                
                //Validación de los campos (el resultado de la validación se mete en el array aErrores para comprobar posteriormente si da error)
                $aErrores['eNombre']= validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 100, 1, REQUIRED);
                $aErrores['eColor']= validacionFormularios::comprobarColorHexadecimal($_REQUEST['color'], OPTIONAL);
                $aErrores['eTirador']= validacionFormularios::comprobarEntero($_REQUEST['tirador'], 10, 0, REQUIRED);
                
                //recorremos el array de posibles errores (aErrores), si hay alguno, el campo se limpia y entradaOK es falsa (se vuelve a cargar el formulario)
                foreach ($aErrores as $campo => $error) {
                   if($error!=null){
                       $entradaOK=false;
                   }
                }
            }else{ // sino se pulsa 'enviar'
                $entradaOK=false;
            }
            
            if($entradaOK){ //si el formulario esta bien rellenado
                
                //Metemos en el array aFormulario los valores introducidos en el formulario ya que son correctos
                $aFormulario['fNombre']= $_REQUEST['nombre'];
                $aFormulario['fColor']= $_REQUEST['color'];
                $aFormulario['fTirador']= $_REQUEST['tirador'];
                
                //Se muestra la salida
                
                echo '<p>Hola '. $aFormulario['fNombre'].'.</p>';
                if($aFormulario['fColor']!==""){
                   echo '<p style="color:'. $aFormulario['fColor'].'">Este es mi color</p>';
                } 
                
                echo '<p>Nivel de satisfacción: '. $aFormulario['fTirador'].'</p>';
                
               
                    
       
            }else{ // si el formulario no esta correctamente rellenado (campos vacios o valores introducidos incorrectos) o no se ha rellenado nunca
                
                //formulario
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <fieldset>
                        <legend>Formulario Personal</legend>
                        <p>
                            <label for="nombre">Su nombre:</label>
                            <input type="text" name="nombre" value="<?php 
                                //si no hay error y se ha insertado un valor en el campo con anterioridad
                                if($aErrores['eNombre']== null && isset($_REQUEST['nombre'])){ 

                                    //se muestra dicho valor (el campo no aparece vacío si se relleno correctamente 
                                    //[en el caso de que haya que se recarge el formulario por un campo mal rellenado, asi no hay que rellenarlo desde 0])
                                    echo $_REQUEST['nombre'];   
                                } 
                            ?>"/>
                        </p>                            
                            <?php 
                                //si hay error en este campo
                                if ($aErrores['eNombre'] != NULL) {
                                    echo "<div class='errores'>".
                                        //se muestra dicho error
                                        $aErrores['eNombre']. 
                                    '</div>'; 
                                }
                            ?>
                        <p>
                            <label for="color">Color favorito (código hexadecimal): </label>
                            <input type="text" name="color" value="<?php 
                                //si no hay error y se ha insertado un valor en el campo con anterioridad
                                if($aErrores['eColor']== null && isset($_REQUEST['color'])){ 

                                    //se muestra dicho valor (el campo no aparece vacío si se relleno correctamente 
                                    //[en el caso de que haya que se recarge el formulario por un campo mal rellenado, asi no hay que rellenarlo desde 0])
                                    echo $_REQUEST['color'];   
                                } 
                            ?>"/>
                        </p>                            
                            <?php 
                                //si hay error en este campo
                                if ($aErrores['eColor'] != NULL) {
                                    echo "<div class='errores'>".
                                        //se muestra dicho error
                                        $aErrores['eColor']. 
                                    '</div>'; 
                                }
                            ?>
                        <p>
                            <label for="tirador">Nivel satisfacción con el formulario actual (de 1 a 10): </label>
                            <input type="range" name="tirador" min="0" max="10" step="1" value="<?php 
                                //si no hay error y se ha insertado un valor en el campo con anterioridad
                                if($aErrores['eTirador']== null && isset($_REQUEST['tirador'])){ 

                                    //se muestra dicho valor (el campo no aparece vacío si se relleno correctamente 
                                    //[en el caso de que haya que se recarge el formulario por un campo mal rellenado, asi no hay que rellenarlo desde 0])
                                    echo $_REQUEST['tirador'];   
                                } 
                            ?>"/>
                        </p>                
                        <p><input type="submit" name="enviar" value="Enviar"/>
                        <input type="reset" name="borrar" value="Borrar"/></p>
                    </fieldset>
                </form>
        <?php
            }
        ?>
       
    </body>
    
</html>       
