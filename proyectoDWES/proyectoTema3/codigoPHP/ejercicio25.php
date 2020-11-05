<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 25 - Arkaitz Rodriguez Martinez</title>
        <style>
            .error{
                color: red;
                font-weight: bold;
            }
            
            legend{
                color: black;
                font-weight: bold;
            }
            input{
                padding: 5px;
                border-radius: 10px;
            }
            .obligatorio input{
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * Autor: Arkaitz Rodriguez Martinez
         * @since: 22/10/2020
         */

        //Declaramos la variables
        require_once '../core/201020libreriaValidacion.php'; //Importamos la librería de validación para comprobar que los campos se introducen correctamente
        $entradaOK = true;
        
        $arrayErrores = [ //Recoge los errores del formulario
            'campoAlfabetico' => null,
            'campoAlfabeticoOpcional' => null,
            
            'campoAlfanumerico' => null,
            'campoAlfanumericoOpcional' => null,
            
            'campoEntero' => null,  
            'campoEnteroOpcional' => null,  
            
            'campoFloat' => null,  
            'campoFloatOpcional' => null,  
            
            'campoPassword' => null,
            'campoPasswordOpcional' => null,
            
            'campoDNI' => null,
            'campoDNIOpcional' => null,
            
            'campoEmail' => null,
            'campoEmailOpcional' => null,
            
            'campoURL' => null,
            'campoURLOpcional' => null,
            
            'campoTelefono' => null,
            'campoTelefonoOpcional' => null,
            
            'campoCodigoPostal' => null,
            'campoCodigoPostalOpcional' => null,
            
            'campoFecha' => null,
            'campoFechaOpcional' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorCheckbox' => null,
            
            'selectorLista' => null
            
        ]; 
        
        $arrayFormulario = [ //Recoge los datos del formulario
            'campoAlfabetico' => null,
            'campoAlfabeticoOpcional' => null,
            
            'campoAlfanumerico' => null,
            'campoAlfanumericoOpcional' => null,
            
            'campoEntero' => null,  
            'campoEnteroOpcional' => null,  
            
            'campoFloat' => null,  
            'campoFloatOpcional' => null,  
            
            'campoPassword' => null,
            'campoPasswordOpcional' => null,
            
            'campoDNI' => null,
            'campoDNIOpcional' => null,
            
            'campoEmail' => null,
            'campoEmailOpcional' => null,
            
            'campoURL' => null,
            'campoURLOpcional' => null,
            
            'campoTelefono' => null,
            'campoTelefonoOpcional' => null,
            
            'campoCodigoPostal' => null,
            'campoCodigoPostalOpcional' => null,
            
            'campoFecha' => null,
            'campoFechaOpcional' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorCheckbox' => null,
            
            'selectorLista' => null
            
        ];  


        if (isset($_POST['enviar'])) { //Código que se ejecuta cuando se envía el formulario
            
            #OBLIGATORIOS
            $arrayErrores['campoAlfabetico'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabetico'], 250, 1, 1);  //Máximo, mínimo y opcionalidad
            $arrayErrores['campoAlfanumerico'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoAlfanumerico'], 250, 1, 1); //Máximo, mínimo y opcionalidad
            $arrayErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], PHP_INT_MAX, -PHP_INT_MAX, 1); //Máximo, mínimo y opcionalidad
            $arrayErrores['campoFloat'] = validacionFormularios::comprobarFloat($_POST['campoFloat'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1); //Máximo, mínimo y opcionalidad
            $arrayErrores['campoPassword'] = validacionFormularios::validarPassword($_POST['campoPassword'], 6, 1); //Longitud mínima y opcionalidad
            $arrayErrores['campoDNI'] = validacionFormularios::validarDni($_POST['campoDNI'], 1); //Opcionalidad
            $arrayErrores['campoEmail'] = validacionFormularios::validarEmail($_POST['campoEmail'], 1); //Opcionalidad
            $arrayErrores['campoURL'] = validacionFormularios::validarURL($_POST['campoURL'], 1); //Opcionalidad
            $arrayErrores['campoTelefono'] = validacionFormularios::validaTelefono($_POST['campoTelefono'], 1); //Opcionalidad
            $arrayErrores['campoCodigoPostal'] = validacionFormularios::validarCp($_POST['campoCodigoPostal'], 1); //Opcionalidad
            $arrayErrores['campoFecha'] = validacionFormularios::validarFecha($_POST['campoFecha'], "01/01/2200", "01/01/1900", 1); //Opcionalidad
            $arrayErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 500, 1, 1); //Máximo, mínimo y opcionalidad
            if(!isset($_POST['selectorRadio'])){$arrayErrores['selectorRadio'] = "Debe marcarse un valor";}
            if(!isset($_POST['selectorCheckbox'])){$arrayErrores['selectorCheckbox'] = "Debe marcarse al menos un valor";}
            $arrayErrores['selectorLista'] = validacionFormularios::validarElementoEnLista($_POST['selectorLista'], array("opcion1", "opcion2", "opcion3")); //Opciones de la lista
            
            
            #OPCIONALES
            $arrayErrores['campoAlfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabeticoOpcional']);
            $arrayErrores['campoAlfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoAlfanumericoOpcional']);
            $arrayErrores['campoEnteroOpcional'] = validacionFormularios::comprobarEntero($_POST['campoEnteroOpcional']);
            $arrayErrores['campoFloatOpcional'] = validacionFormularios::comprobarFloat($_POST['campoFloatOpcional']);
            $arrayErrores['campoPasswordOpcional'] = validacionFormularios::validarPassword($_POST['campoPasswordOpcional']); 
            $arrayErrores['campoDNIOpcional'] = validacionFormularios::validarDni($_POST['campoDNIOpcional']);
            $arrayErrores['campoEmailOpcional'] = validacionFormularios::validarEmail($_POST['campoEmailOpcional']);
            $arrayErrores['campoURLOpcional'] = validacionFormularios::validarURL($_POST['campoURLOpcional']);
            $arrayErrores['campoTelefonoOpcional'] = validacionFormularios::validaTelefono($_POST['campoTelefonoOpcional']);
            $arrayErrores['campoCodigoPostalOpcional'] = validacionFormularios::validarCp($_POST['campoCodigoPostalOpcional']);
            $arrayErrores['campoFechaOpcional'] = validacionFormularios::validarFecha($_POST['campoFechaOpcional']);
            
            
            foreach ($arrayErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false;
        }


        if ($entradaOK) { // Si el formulario se ha rellenado correctamente
         
            #OBLIGATORIOS
            // Cargamos en el $arrayFormulario el valos de aquellos campos que se han rellenado correctamente
            
            $arrayFormulario['campoAlfabetico'] = $_POST['campoAlfabetico'];
            $arrayFormulario['campoAlfanumerico'] = $_POST['campoAlfanumerico'];
            $arrayFormulario['campoEntero'] = $_POST['campoEntero'];
            $arrayFormulario['campoFloat'] = $_POST['campoFloat'];
            $arrayFormulario['campoPassword'] = $_POST['campoPassword'];
            $arrayFormulario['campoDNI'] = $_POST['campoDNI'];
            $arrayFormulario['campoEmail'] = $_POST['campoEmail'];
            $arrayFormulario['campoURL'] = $_POST['campoURL'];
            $arrayFormulario['campoTelefono'] = $_POST['campoTelefono'];
            $arrayFormulario['campoCodigoPostal'] = $_POST['campoCodigoPostal'];
            $arrayFormulario['campoFecha'] = $_POST['campoFecha'];
            $arrayFormulario['campoTexto'] = $_POST['campoTexto'];
            $arrayFormulario['selectorRadio'] = $_POST['selectorRadio'];
            $arrayFormulario['selectorCheckbox'] = $_POST['selectorCheckbox'];
            $arrayFormulario['selectorLista'] = $_POST['selectorLista'];
            
            #OPCIONALES
            // Cargamos en el $arrayFormulario el valos de aquellos campos que se hayan rellenado
            
            $arrayFormulario['campoAlfabeticoOpcional'] = $_POST['campoAlfabeticoOpcional'];
            $arrayFormulario['campoAlfanumericoOpcional'] = $_POST['campoAlfanumericoOpcional']; 
            $arrayFormulario['campoEnteroOpcional'] = $_POST['campoEnteroOpcional'];
            $arrayFormulario['campoFloatOpcional'] = $_POST['campoFloatOpcional'];
            $arrayFormulario['campoPasswordOpcional'] = $_POST['campoPasswordOpcional'];
            $arrayFormulario['campoDNIOpcional'] = $_POST['campoDNIOpcional'];
            $arrayFormulario['campoEmailOpcional'] = $_POST['campoEmailOpcional'];
            $arrayFormulario['campoURLOpcional'] = $_POST['campoURLOpcional'];
            $arrayFormulario['campoTelefonoOpcional'] = $_POST['campoTelefonoOpcional'];
            $arrayFormulario['campoCodigoPostalOpcional'] = $_POST['campoCodigoPostalOpcional'];
            $arrayFormulario['campoFechaOpcional'] = $_POST['campoFechaOpcional'];

            
            // Mostramos los valores de cada campo obligatorio
            echo "<h3>OBLIGATORIOS</h3>";
            echo "Alfabetico: " . $arrayFormulario['campoAlfabetico'] . "<br>";
            echo "Alfanumerico: " . $arrayFormulario['campoAlfanumerico'] . "<br>";
            echo "Entero: " . $arrayFormulario['campoEntero'] . "<br>";
            echo "Float: " . $arrayFormulario['campoFloat'] . "<br>";
            echo "Contraseña: " . $arrayFormulario['campoPassword'] . "<br>";
            echo "DNI: " . $arrayFormulario['campoDNI'] . "<br>";
            echo "Email: " . $arrayFormulario['campoEmail'] . "<br>";
            echo "URL: " . $arrayFormulario['campoURL'] . "<br>";
            echo "Telefono: " . $arrayFormulario['campoTelefono'] . "<br>";
            echo "Codigo Postal: " . $arrayFormulario['campoCodigoPostal'] . "<br>";
            echo "Fecha: " . date('d/m/Y', strtotime($arrayFormulario['campoFecha'])) . "<br>";
            echo "Campo de texto: " . $arrayFormulario['campoTexto'] . "<br>";
            echo "Radio button: " . $arrayFormulario['selectorRadio'] . "<br>";
            echo "Lista: " . $arrayFormulario['selectorLista'] . "<br>";
            echo "Checkbox: ";
            if(isset($arrayFormulario['selectorCheckbox']['opcion1'])){
                echo $arrayFormulario['selectorCheckbox']['opcion1'] . " ";
            }
            if(isset($arrayFormulario['selectorCheckbox']['opcion2'])){
                echo $arrayFormulario['selectorCheckbox']['opcion2'] . " ";
            }
            if(isset($arrayFormulario['selectorCheckbox']['opcion3'])){
                echo $arrayFormulario['selectorCheckbox']['opcion3'];
            }
            
            
            // Si los campos opcionales se han rellenado se muestran, sino no
            echo "<h3>OPCIONALES</h3>";
            if($arrayFormulario['campoAlfabeticoOpcional'] != null){
                echo "Alfabetico opcional: " . $arrayFormulario['campoAlfabeticoOpcional'] . "<br>";
            }
            if($arrayFormulario['campoAlfanumericoOpcional'] != null){
                echo "Alfanumerico opcional: " . $arrayFormulario['campoAlfanumericoOpcional'] . "<br>";
            }
            if($arrayFormulario['campoEnteroOpcional'] != null){
                echo "Entero opcional: " . $arrayFormulario['campoEnteroOpcional'] . "<br>";
            }
            if($arrayFormulario['campoFloatOpcional'] != null){
                echo "Float opcional: " . $arrayFormulario['campoFloatOpcional'] . "<br>";
            }
            if($arrayFormulario['campoPasswordOpcional'] != null){
                echo "Password opcional: " . $arrayFormulario['campoPasswordOpcional'] . "<br>";
            }
            if($arrayFormulario['campoDNIOpcional'] != null){
                echo "DNI opcional: " . $arrayFormulario['campoDNIOpcional'] . "<br>";
            }
            if($arrayFormulario['campoEmailOpcional'] != null){
                echo "Email opcional: " . $arrayFormulario['campoEmailOpcional'] . "<br>";
            }
            if($arrayFormulario['campoURLOpcional'] != null){
                echo "URL opcional: " . $arrayFormulario['campoURLOpcional'] . "<br>";
            }
            if($arrayFormulario['campoTelefonoOpcional'] != null){
                echo "Telefono opcional: " . $arrayFormulario['campoTelefonoOpcional'] . "<br>";
            }
            if($arrayFormulario['campoCodigoPostalOpcional'] != null){
                echo "CodigoPostal opcional: " . $arrayFormulario['campoCodigoPostalOpcional'] . "<br>";
            }
            if($arrayFormulario['campoFechaOpcional'] != null){
                echo "Fecha opcional: " . date('d/m/Y', strtotime($arrayFormulario['campoFechaOpcional'])) . "<br>";
            }
            
        } else { //Código que se ejecuta antes de rellenar el formulario
            ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset>
                    <legend>PLANTILLA FORMULARIO</legend>
                    
                    <!---------------------------- ALFABÉTICO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Alfabético: </label>
                        <input type = "text" name = "campoAlfabetico"
                               value="<?php if($arrayErrores['campoAlfabetico'] == NULL && isset($_POST['campoAlfabetico'])){ echo $_POST['campoAlfabetico'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoAlfabetico'] != NULL) {
                        echo $arrayErrores['campoAlfabetico']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Alfabético Opcional: </label>
                        <input type = "text" name = "campoAlfabeticoOpcional"
                               value="<?php if($arrayErrores['campoAlfabeticoOpcional'] == NULL && isset($_POST['campoAlfabeticoOpcional'])){ echo $_POST['campoAlfabeticoOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoAlfabeticoOpcional'] != NULL) {
                        echo $arrayErrores['campoAlfabeticoOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- ALFANUMERICO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Alfanumérico: </label>
                        <input type = "text" name = "campoAlfanumerico"
                               value="<?php if($arrayErrores['campoAlfanumerico'] == NULL && isset($_POST['campoAlfanumerico'])){ echo $_POST['campoAlfanumerico'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoAlfanumerico'] != NULL) {
                        echo $arrayErrores['campoAlfanumerico']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Alfanumérico Opcional: </label>
                        <input type = "text" name = "campoAlfanumericoOpcional"
                               value="<?php if($arrayErrores['campoAlfanumericoOpcional'] == NULL && isset($_POST['campoAlfanumericoOpcional'])){ echo $_POST['campoAlfanumericoOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoAlfanumericoOpcional'] != NULL) {
                        echo $arrayErrores['campoAlfanumericoOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- ENTERO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Entero: </label>
                        <input type = "number" name = "campoEntero"
                               value="<?php if($arrayErrores['campoEntero'] == NULL && isset($_POST['campoEntero'])){ echo $_POST['campoEntero'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoEntero'] != NULL) {
                        echo $arrayErrores['campoEntero']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Entero Opcional: </label>
                        <input type = "number" name = "campoEnteroOpcional"
                               value="<?php if($arrayErrores['campoEnteroOpcional'] == NULL && isset($_POST['campoEnteroOpcional'])){ echo $_POST['campoEnteroOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoEnteroOpcional'] != NULL) {
                        echo $arrayErrores['campoEnteroOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- FLOAT -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Float: </label>
                        <input type = "text" name = "campoFloat"
                               value="<?php if($arrayErrores['campoFloat'] == NULL && isset($_POST['campoFloat'])){ echo $_POST['campoFloat'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoFloat'] != NULL) {
                        echo $arrayErrores['campoFloat']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Float Opcional: </label>
                        <input type = "text" name = "campoFloatOpcional"
                               value="<?php if($arrayErrores['campoFloatOpcional'] == NULL && isset($_POST['campoFloatOpcional'])){ echo $_POST['campoFloatOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoFloatOpcional'] != NULL) {
                        echo $arrayErrores['campoFloatOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- CONTRASEÑA -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Contaseña: </label>
                        <input type = "password" name = "campoPassword" placeholder = "Mínimo 6 caracteres"
                               value="<?php if($arrayErrores['campoPassword'] == NULL && isset($_POST['campoPassword'])){ echo $_POST['campoPassword'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoPassword'] != NULL) {
                        echo $arrayErrores['campoPassword']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Contraseña Opcional: </label>
                        <input type = "password" name = "campoPasswordOpcional" placeholder = "Mínimo 6 caracteres"
                               value="<?php if($arrayErrores['campoPasswordOpcional'] == NULL && isset($_POST['campoPasswordOpcional'])){ echo $_POST['campoPasswordOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoPasswordOpcional'] != NULL) {
                        echo $arrayErrores['campoPasswordOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- DNI -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>DNI: </label>
                        <input type = "text" name = "campoDNI" placeholder = "12345678Z"
                               value="<?php if($arrayErrores['campoDNI'] == NULL && isset($_POST['campoDNI'])){ echo $_POST['campoDNI'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoDNI'] != NULL) {
                        echo $arrayErrores['campoDNI']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>DNI Opcional: </label>
                        <input type = "text" name = "campoDNIOpcional" placeholder = "12345678Z"
                               value="<?php if($arrayErrores['campoDNIOpcional'] == NULL && isset($_POST['campoDNIOpcional'])){ echo $_POST['campoDNIOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoDNIOpcional'] != NULL) {
                        echo $arrayErrores['campoDNIOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- EMAIL -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Email: </label>
                        <input type = "email" name = "campoEmail" placeholder = "example@hotmail.com"
                               value="<?php if($arrayErrores['campoEmail'] == NULL && isset($_POST['campoEmail'])){ echo $_POST['campoEmail'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoEmail'] != NULL) {
                        echo $arrayErrores['campoEmail']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Email Opcional: </label>
                        <input type = "email" name = "campoEmailOpcional" placeholder = "example@hotmail.com"
                               value="<?php if($arrayErrores['campoEmailOpcional'] == NULL && isset($_POST['campoEmailOpcional'])){ echo $_POST['campoEmailOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoEmailOpcional'] != NULL) {
                        echo $arrayErrores['campoEmailOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- URL -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>URL: </label>
                        <input type = "url" name = "campoURL" placeholder = "https://..."
                               value="<?php if($arrayErrores['campoURL'] == NULL && isset($_POST['campoURL'])){ echo $_POST['campoURL'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoURL'] != NULL) {
                        echo $arrayErrores['campoURL']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>URL Opcional: </label>
                        <input type = "url" name = "campoURLOpcional" placeholder = "https://..."
                               value="<?php if($arrayErrores['campoURLOpcional'] == NULL && isset($_POST['campoURLOpcional'])){ echo $_POST['campoURLOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoURLOpcional'] != NULL) {
                        echo $arrayErrores['campoURLOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- TELEFONO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Teléfono: </label>
                        <input type = "tel" name = "campoTelefono"
                               value="<?php if($arrayErrores['campoTelefono'] == NULL && isset($_POST['campoTelefono'])){ echo $_POST['campoTelefono'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoTelefono'] != NULL) {
                        echo $arrayErrores['campoTelefono']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Teléfono Opcional: </label>
                        <input type = "tel" name = "campoTelefonoOpcional"
                               value="<?php if($arrayErrores['campoTelefonoOpcional'] == NULL && isset($_POST['campoTelefonoOpcional'])){ echo $_POST['campoTelefonoOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoTelefonoOpcional'] != NULL) {
                        echo $arrayErrores['campoTelefonoOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- CODIGO POSTAL -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Código Postal: </label>
                        <input type = "text" name = "campoCodigoPostal"
                               value="<?php if($arrayErrores['campoCodigoPostal'] == NULL && isset($_POST['campoCodigoPostal'])){ echo $_POST['campoCodigoPostal'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoCodigoPostal'] != NULL) {
                        echo $arrayErrores['campoCodigoPostal']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Código Postal Opcional: </label>
                        <input type = "text" name = "campoCodigoPostalOpcional"
                               value="<?php if($arrayErrores['campoCodigoPostalOpcional'] == NULL && isset($_POST['campoCodigoPostalOpcional'])){ echo $_POST['campoCodigoPostalOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoCodigoPostalOpcional'] != NULL) {
                        echo $arrayErrores['campoCodigoPostalOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- FECHA -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Fecha: </label>
                        <input type = "date" name = "campoFecha"
                               value="<?php if($arrayErrores['campoFecha'] == NULL && isset($_POST['campoFecha'])){ echo $_POST['campoFecha'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoFecha'] != NULL) {
                        echo $arrayErrores['campoFecha']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Fecha Opcional: </label>
                        <input type = "date" name = "campoFechaOpcional"
                               value="<?php if($arrayErrores['campoFechaOpcional'] == NULL && isset($_POST['campoFechaOpcional'])){ echo $_POST['campoFechaOpcional'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoFechaOpcional'] != NULL) {
                        echo $arrayErrores['campoFechaOpcional']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- AREA DE TEXTO -------------------------------------------->
                    
                    <div>
                        <label>Texto:</label>
                        <textarea name="campoTexto" placeholder="Maximo 500 caracteres" value="<?php if($arrayErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])){ echo $_POST['campoTexto'];} ?>"></textarea>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoTexto'] != NULL) {
                        echo $arrayErrores['campoTexto']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- SELECTOR RADIO -------------------------------------------->
                    
                    <div>
                        <label>Radio Button: </label><br><br>
                        <input type="radio" id="RO1" name="selectorRadio" value="Opcion 1" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 1"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Opcion 1</label><br/>
                        <input type="radio" id="RO2" name="selectorRadio" value="Opcion 2" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 2"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Opcion 2</label><br/>
                        <input type="radio" id="RO3" name="selectorRadio" value="Opcion 3" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 3"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Opcion 3</label>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorRadio'] != NULL) {
                        echo $arrayErrores['selectorRadio']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- CHECKBOX -------------------------------------------->
                    
                    <div>
                        <label>CheckBox: </label><br><br>
                        <input type="checkbox" id="CO1" name="selectorCheckbox[opcion1]" value="Opcion 1" <?php if(isset($_POST['selectorCheckbox']['opcion1'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="CO1">Opcion 1</label><br/>
                        <input type="checkbox" id="CO2" name="selectorCheckbox[opcion2]" value="Opcion 2" <?php if(isset($_POST['selectorCheckbox']['opcion2'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="CO2">Opcion 2</label><br/>
                        <input type="checkbox" id="CO3" name="selectorCheckbox[opcion3]" value="Opcion 3" <?php if(isset($_POST['selectorCheckbox']['opcion3'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="CO3">Opcion 3</label><br/>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorCheckbox'] != NULL) {
                        echo $arrayErrores['selectorCheckbox']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- LISTA -------------------------------------------->
                    
                    <div>
                        <label>Lista: </label><br><br>
                        <select name="selectorLista">
                            <option value="opcion1" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion1"){ echo "selected";}} ?>>Opcion 1</option>
                            <option value="opcion2" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion2"){ echo "selected";}} ?>>Opcion 2</option>
                            <option value="opcion3" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "opcion3"){ echo "selected";}} ?>>Opcion 3</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorLista'] != NULL) {
                        echo $arrayErrores['selectorLista']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    
                    <div>
                        <br><input type = "submit" name = "enviar" value = "Enviar">
                    </div>
                </fieldset>
            </form>
        <?php } ?>
    </body>
</html>