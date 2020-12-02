<?php

session_start();

//Conectar con base de datos.
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

//Compruebo que he podido conectarme
/*
if (mysqli_connect("localhost", "root", "")) {
	echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario y clave</p>";
	}else{
	echo "<p>MySQL no conoce ese usuario y password, y rechaza el intento de conexión</p>";
	}*/

//Obtengo los datos del formulario.
$username = $_POST['name'];
$password = $_POST['password'];

//Tablas de las consultas.

//$tablaUsuario = 'usuario';
$tablaAdministrador = 'administrador';
 
//$consultaUsuario = "SELECT * FROM $tablaUsuario WHERE alias = '$username'";
$consultaAdministrador = "SELECT * FROM $tablaAdministrador WHERE alias = '$username'";

//$resultUsuario = $mysqli->query($consultaUsuario);
$resultAdministrador = $mysqli->query($consultaAdministrador);

//Compruebo si esta accediendo un usuario o un administrador.
/*if ($resultUsuario->num_rows > 0) {     
		//Cargo en un array asociativo la información del usuario.
	 $row = $resultUsuario->fetch_array(MYSQLI_ASSOC);

	 	if ($password == $row['contrasena']) { 
 
		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $username;
		    $_SESSION['contrasena'] =$password;
		    $_SESSION['start'] = time();
		    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		    
		    header("Location: indexUsuario.html");
 		} else { 
 			 echo "Username o Password estan incorrectos.";

  			header("refresh:5;url=http://localhost/practicaRA3/solid/loggin.html");
			exit("Error, la contraseña no coincide. Volviendo a inicio sesion en 5 segundos");
 			}

 }else */if ($resultAdministrador->num_rows > 0) {
 	$row = $resultAdministrador->fetch_array(MYSQLI_ASSOC);
 		if ($password == $row['contrasena']) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    header("Location: indexAdministrador.php");

	 } else { 
	   header("refresh:5;url=http://localhost/practicaRA3/solid/logginAdmin.html");
		exit("Error, la contraseña no coincide. Volviendo a inicio sesion en 5 segundos");
	 } 

 }else{
 	header("refresh:5;url=http://localhost/practicaRA3/solid/logginAdmin.html");
		exit("Error, el usuario no existe. Volviendo a inicio sesion en 5 segundos");
 }

 mysqli_close($mysqli); 
 

?>

