<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 28 - Arkaitz Rodriguez Martinez</title>
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
        <h2>ENCUESTA DE SATISFACCION PERSONAL</h2>
        <?php
        /*
         * Autor: Arkaitz Rodriguez Martinez
         * @since: 22/10/2020
         */

        //Declaramos la variables
        require_once '../core/201020libreriaValidacion.php'; //Importamos la librería 
        $entradaOK = true;
        
        $arrayErrores = [ //Recoge los errores del formulario
            'campoNombreApellidos' => null,
            
            'campoEntero' => null,
            
            'campoNacimiento' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorLista' => null
            
        ]; 
        
        $arrayFormulario = [ //Recoge los datos del formulario
            'campoNombreApellidos' => null,
            
            'campoEntero' => null,
            
            'campoNacimiento' => null,
            
            'campoTexto' => null,
            
            'selectorRadio' => null,
            
            'selectorLista' => null
            
        ];  


        if (isset($_POST['enviar'])) { //Código que se ejecuta cuando se envía el formulario
            
            #OBLIGATORIOS
            $arrayErrores['campoNombreApellidos'] = validacionFormularios::comprobarAlfabetico($_POST['campoNombreApellidos'], 20, 1, 1);  //Máximo, mínimo y opcionalidad            
            $arrayErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], 10, 1, 1); //Máximo, mínimo y opcionalidad
            $arrayErrores['campoNacimiento'] = validacionFormularios::validarFecha($_POST['campoNacimiento'], "01/01/2200", "01/01/1900", 1); //Opcionalidad
            $arrayErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 500, 1, 1); //Máximo, mínimo y opcionalidad
            if(!isset($_POST['selectorRadio'])){$arrayErrores['selectorRadio'] = "Debe marcarse un valor";}            
            $arrayErrores['selectorLista'] = validacionFormularios::validarElementoEnLista($_POST['selectorLista'], array("ni idea", "con la familia", "de fiesta", "trabajando", "estudiando DWES"), 1); //Opciones de la lista
            
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
            
            $arrayFormulario['campoNombreApellidos'] = $_POST['campoNombreApellidos'];
            $arrayFormulario['campoEntero'] = $_POST['campoEntero'];
            $arrayFormulario['campoNacimiento'] = $_POST['campoNacimiento'];
            $arrayFormulario['campoTexto'] = $_POST['campoTexto'];
            $arrayFormulario['selectorRadio'] = $_POST['selectorRadio'];
            $arrayFormulario['selectorLista'] = $_POST['selectorLista'];
            
            // Mostramos los valores de cada campo obligatorio
            $fechaActual = new DateTime();
            echo "<h3>INFORME DE SATISFACCION PERSONAL</h3>";
            echo "Hoy " . $fechaActual->format('d/m/Y') . " a las ". $fechaActual->format('H:i:s') ."<br>";
            echo "Dn/Dña: " . $arrayFormulario['campoNombreApellidos'] . " nacido " . date('d/m/Y', strtotime($arrayFormulario['campoNacimiento']))."<br>";
            echo "Se siente ". $arrayFormulario['selectorRadio'] . "<br>";
            echo "Valora su curso actual con un ". $arrayFormulario['campoEntero'] . " sobre 10<br>";
            echo "Estas navidades las dedicará " . $arrayFormulario['selectorLista'] . "<br>";
            echo "Y además opina que " . $arrayFormulario['campoTexto'] . "<br>";
        } else { //Código que se ejecuta antes de rellenar el formulario
            ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset>
                    <legend>PLANTILLA FORMULARIO</legend>
                    <div class="obligatorio">
                        <label>Nombre y Apellidos: </label>
                        <input type = "text" name = "campoNombreApellidos"
                               value="<?php if($arrayErrores['campoNombreApellidos'] == NULL && isset($_POST['campoNombreApellidos'])){ echo $_POST['campoNombreApellidos'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoNombreApellidos'] != NULL) {
                        echo $arrayErrores['campoNombreApellidos']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- FECHA -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Fecha de nacimiento: </label>
                        <input type = "date" name = "campoNacimiento"
                               value="<?php if($arrayErrores['campoNacimiento'] == NULL && isset($_POST['campoNacimiento'])){ echo $_POST['campoNacimiento'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoNacimiento'] != NULL) {
                        echo $arrayErrores['campoNacimiento']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- SELECTOR RADIO -------------------------------------------->
                    
                    <div>
                        <label>¿Como te sientes hoy?: </label><br><br>
                        <input type="radio" id="RO1" name="selectorRadio" value="Muy mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Muy mal</label><br/>
                        <input type="radio" id="RO2" name="selectorRadio" value="Mal" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Mal</label><br/>
                        <input type="radio" id="RO3" name="selectorRadio" value="Regular" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Regular"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Regular</label><br/>
                        <input type="radio" id="RO4" name="selectorRadio" value="Bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO4">Bien</label><br/>
                        <input type="radio" id="RO5" name="selectorRadio" value="Muy Bien" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy Bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO5">Muy Bien</label><br/>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorRadio'] != NULL) {
                        echo $arrayErrores['selectorRadio']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- ENTERO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>¿Cómo va el curso? (1 - 10)</label>
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
                    <br> <!---------------------------- LISTA -------------------------------------------->
                    
                    <div>
                        <label>¿Como se prensentan las vacaciondes de navidad?: </label><br><br>
                        <select name="selectorLista">
                            <option value="ni idea" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "ni idea"){ echo "selected";}} ?>>Ni idea</option>
                            <option value="con la familia" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "con la familia"){ echo "selected";}} ?>>Con la familia</option>
                            <option value="de fiesta" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "de fiesta"){ echo "selected";}} ?>>De fiesta</option>
                            <option value="trabajando" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "trabajando"){ echo "selected";}} ?>>Trabajando</option>
                            <option value="estudiando DWES" <?php if(isset($_POST['selectorLista'])){if($arrayErrores['selectorLista'] == NULL && $_POST['selectorLista'] == "estudiando DWES"){ echo "selected";}} ?>>Estudiando DWES</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['selectorLista'] != NULL) {
                        echo $arrayErrores['selectorLista']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br> <!---------------------------- AREA DE TEXTO -------------------------------------------->
                    
                    <div>
                        <label>Describe brevemente tu estado de animo:</label>
                        <br/><br/>
                        <textarea name="campoTexto" placeholder="Maximo 500 caracteres" value="<?php if($arrayErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])){ echo $_POST['campoTexto'];} ?>"></textarea>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['campoTexto'] != NULL) {
                        echo $arrayErrores['campoTexto']; //Mensaje de error que tiene el $arrayErrores
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