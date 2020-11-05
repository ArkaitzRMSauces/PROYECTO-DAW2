<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">        
        <title>Ejercicio 21 - Arkaitz Rodriguez Martinez</title>        
    </head>
    <body>
        <!--
            Arkaitz Rodriguez
            14-10-2020
        -->        
        <form action="tratamiento.php" method="post"><!--Creacion del formulario-->
            <p>Nombre: <input type="text" name="nombre"/></p><!--Campo nombre-->  
            <p>Apellidos: <input type="text" name="apellidos" size="40"/></p><!--Campo apellidos-->   
            <p>Correo: <input type="text" name="email" size="35"/></p><!--Campo correo-->
            <p>Contraseña: <input type="password" name="contras"/></p><!--Campo contraseña-->
            <p>Sexo:</p>
            <p><input type="radio" name="sexo" value="V"/>Hombre</p><!--Radio hombre-->
            <p><input type="radio" name="sexo" value="M"/>Mujer</p><!--Radio mujer-->
         <p>Día de la semana:</p>
         <select name="dia"><!--Menu desplegable-->
             <option value="Lunes">Lunes</option> 
             <option value="Martes">Martes</option> 
             <option value="Miércoles">Miercoles</option> 
             <option value="Jueves">Jueves</option> 
             <option value="Viernes">Viernes</option> 
             <option value="Sábado">Sábado</option> 
             <option value="Domingo">Domingo</option> 
         </select>
         <p><input type="submit" value="Enviar"><!--Boton enviar formulario--> 
            <input type="reset" value="Borrar"></p><!--Boton borrar formulario-->
        </form>  
    </body>
</html>