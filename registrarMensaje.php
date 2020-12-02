<?php

session_start();
//Conectar con base de datos
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

$admin = $_POST['administrador'];
$user = $_POST['user'];
$mensaje = $_POST['cuerpo'];
$asunto = $_POST['asunto'];

$datosAdmin=$mysqli->query("SELECT * FROM administrador WHERE alias = '$admin'");
$datosUser=$mysqli->query("SELECT * FROM usuario WHERE alias = '$user'");

$rowAdmin = $datosAdmin->fetch_array(MYSQLI_ASSOC);
$rowUser = $datosUser->fetch_array(MYSQLI_ASSOC);

$idAdmin = $rowAdmin['id'];
$idUser = $rowUser['id'];

$leido = 1;

$sql = $mysqli->prepare("INSERT INTO mensaje(id_administrador, id_usuario, leido, mensaje, asunto) VALUES (?, ?, ?, ?, ?)");
	$sql -> bind_param('iiiss', $idAdmin, $idUser, $leido, $mensaje, $asunto);
	$sql->execute();
	$verificacionSqlDatos = $sql->close();

if ($verificacionSqlDatos) {
    header("refresh:5;url=http://localhost/practicaRA3/solid/indexUsuario.php");
		exit("Mensaje enviado con exito. Volviendo al menu del usuario...");
}else{
	    header("refresh:5;url=http://localhost/practicaRA3/solid/indexUsuario.php");
		exit("Error al enviar el mensaje. Recargando la página en 5 segundos");
}
?>