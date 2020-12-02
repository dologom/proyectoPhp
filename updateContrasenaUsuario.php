<?php

	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

	$tableName = 'usuario';
	$alias = $_SESSION['username'];

		$contrasena = $_POST['password'];
		$contrasena2 = $_POST['password2'];
		//Actualizo los datos de la BBDD mediante consultas

	if ($contrasena==$contrasena2) {
		$mysqli ->query("UPDATE $tableName SET contrasena='$contrasena' WHERE alias='$alias'");

		echo "Contraseña cambiada con exito. Redireccionando...";
		header("refresh:3;url=http://localhost/practicaRA3/solid/perfilUsuario.php");
	}else{
		echo "Las contraseñas no coinciden, no se ha podido cambiar la contraseña. Redireccionando...";
		header("refresh:3;url=http://localhost/practicaRA3/solid/perfilUsuario.php");
	}
		
	?>	
