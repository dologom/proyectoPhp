	<?php

	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

	$tableName = 'usuario';
	$alias = $_SESSION['username'];

		$nombre = $_POST['name'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$edad = $_POST['edad'];
		$telefono = $_POST['telefono'];

		//Actualizo los datos de la BBDD mediante consultas

		$mysqli ->query("UPDATE $tableName SET nombre='$nombre' WHERE alias='$alias'");
		$mysqli ->query("UPDATE $tableName SET apellido1='$apellido1' WHERE alias='$alias'");
		$mysqli ->query("UPDATE $tableName SET apellido2='$apellido2' WHERE alias='$alias'");
		$mysqli ->query("UPDATE $tableName SET edad='$edad' WHERE alias='$alias'");
		$mysqli ->query("UPDATE $tableName SET telefono='$telefono' WHERE alias='$alias'");

		echo "Su perfil se ha actualizado. Redireccionando...";
		header("refresh:3;url=http://localhost/practicaRA3/solid/perfilUsuario.php");
	?>