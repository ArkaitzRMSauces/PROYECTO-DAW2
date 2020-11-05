<!DOCTYPE html>
<html>
<head>
    <title>Comprobar datos</title> 
</head>
<body>
    <h1>Parametros recibidos: </h1>
    <?php  
    echo "Nombre: "; 
    echo $_POST['nombre'];//Recogida del parametro Nombre 
    echo "<br/>";
    echo "apellidos: "; 
    echo $_POST['apellidos'];//Recogida del parametro apellidos 
    echo "<br/>";
    echo "E-mail: "; 
    echo $_POST['email'];//Recogida del parametro email 
    echo "<br/>";
    echo "contraseña: "; 
    echo $_POST['contras'];//Recogida del parametro contras 
    echo "<br/>";
    echo "Sexo: "; 
    echo $_POST['sexo'];//Recogida del parametro sexo 
    echo "<br/>";
    echo "Día de la semana: ";//Recogida del parametro dia de la semana 
    echo $_POST['dia']; 
    echo "<br/>";
    ?>
    <p>Los datos son correctos: <a href="enviar.php">Enviar</a><!--Te redirige a una pagina que confirma que has enviado el formulario-->
    <p>Los datos no son correctos: <a href="ejercicio21.php">Volver a escribirlos</a><!--Te redirige a la pagina del formulario para volverlo a escribir-->
</body>
</html>