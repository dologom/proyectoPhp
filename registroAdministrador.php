
<?php

//Conectar con base de datos
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

//Compruebo que he podido conectarme
/*
if (mysqli_connect("localhost", "root", "")) {
	echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario y clave</p>";
	}else{
	echo "<p>MySQL no conoce ese usuario y password, y rechaza el intento de conexión</p>";
	}*/

//Tabla de la base de datos en la que quiero realizar los cambios
$tableName = 'usuario';
$tableAdmin = 'administrador';

//Datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordCheck = $_POST['passwordCheck'];
$terminos = $_POST['terminos'];

//Cargo dos consultas para comprobar que el usuario y el correo no existan ya en la base de datos. RQ16

$sqlUser = "SELECT * FROM $tableName WHERE alias = '$name'";
$sqlEmail = "SELECT * FROM $tableName WHERE correo = '$email'";
$sqlAdmin = "SELECT * FROM $tableAdmin WHERE alias = '$name'";
$sqlAdminEmail = "SELECT * FROM $tableAdmin WHERE correo = '$email'";

$userCheck="";
$emailCheck="";
//Compruebo también que el nombre y el correo no pertenezcan a un administrador.
$notAdminCheck="";
$notAdminEmailCheck="";

//Obtener datos comprobaciones User.
//Guardo los resultados de la consulta en una variable. query para ejecutar consulta.
if ($resultName = $mysqli->query($sqlUser)) {
		//fetch_object convierte la fila de datos guardados en la variable anterior en un objeto.
	while ($objetoName=$resultName->fetch_object()) {
		$userCheck=($objetoName->alias);
	}
}

//var_dump($username);

if ($resultEmail = $mysqli->query($sqlEmail)) {
	while ($objetoEmail=$resultEmail->fetch_object()) {
		$emailCheck=($objetoEmail->correo);
	}
}

//Obtener datos comprobaciones Admin.
if ($resultAdminName = $mysqli->query($sqlAdmin)) {
	while ($objetoAdminName=$resultAdminName->fetch_object()) {
		$notAdminCheck=($objetoAdminName->alias);
	}
}
if ($resultAdminEmail = $mysqli->query($sqlAdminEmail)) {
	while ($objetoAdminEmail=$resultAdminEmail->fetch_object()) {
		$notAdminEmailCheck=($objetoAdminEmail->correo);
	}
}

//Compruebo que la contraseña coincida.
if ($password==$passwordCheck) {
	
}else{
	header("refresh:5;url=http://localhost/practicaRA3/solid/registroUsuario.html");
	exit("Error, la contraseña no coincide. Volviendo al formulario en 5 segundos");
}

//Compruebo que se han aceptado los terminos y condiciones
if (isset($terminos)){

}else{
	header("refresh:5;url=http://localhost/practicaRA3/solid/registroUsuario.html");
	exit("Error, no has aceptado los terminos y condiciones. Volviendo al formulario en 5 segundos");
}

    if ($name==$userCheck||$name==$notAdminCheck) {
    	header("refresh:5;url=http://localhost/practicaRA3/solid/registroUsuario.html");
		exit("Error, el nombre de usuario ya existe. Volviendo al formulario en 5 segundos");
    }else if($email==$emailCheck||$email==$notAdminEmailCheck){
    	header("refresh:5;url=http://localhost/practicaRA3/solid/registroUsuario.html");
		exit("Error, esta dirección de correo ya ha sido utilizada. Volviendo al formulario en 5 segundos");
    }else{
	//Preparo los datos en la tabla
	$stmt = $mysqli->prepare("INSERT INTO administrador(alias, contrasena, correo) VALUES (?, ?, ?)");
	//Capa de seguridad 'sss' tipo dato de cada variable
    $stmt->bind_param('sss',$name, $password, $email);
	//Ejecuta la consulta
    $stmt->execute(); 
    $result= $stmt->close();
	}
//Mensaje de que el usuario se ha añadido correctamente y consulta cerrada

if ($result) {
	echo "Adminstrador añadido correctamente. Redirigiendo a la pagina de inicio...";
	header("refresh:5;url=http://localhost/practicaRA3/solid/index.php");
}else{
	echo "Error, no se ha podido añadir el administrador. Redirigiendo...";
	header("refresh:5;url=http://localhost/practicaRA3/solid/registroAdministrador.php");
}
?>
