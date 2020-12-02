<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
$tableName = 'usuario';
$tableAdmin = 'administrador';
$sql = "Select * From $tableName ";

$res=mysqli_query($mysqli,$sql);

$id = $_GET['name'];
//Hago una consulta para traer los datos del usuario al que doy privilegios.
$datosUsuario = $mysqli->query("SELECT * FROM $tableName WHERE id = '$id'");
$row = $datosUsuario->fetch_array(MYSQLI_ASSOC);
$alias = $row['alias'];
$aliasFinal = "Admin".$row['alias'];
$correo = "Admin".$row['alias'];
$contrasena = $row['contrasena'];

//Comprobar que el usuario no se haya añadido ya como administrador.
$sqlAdmin = "SELECT * FROM $tableAdmin WHERE alias = '$aliasFinal'";

$notAdminCheck="";
$emailCheck="";

//Obtener datos comprobaciones Admin.
if ($resultAdminName = $mysqli->query($sqlAdmin)) {
	while ($objetoAdminName=$resultAdminName->fetch_object()) {
		$notAdminCheck=($objetoAdminName->alias);
	}
}

 if ($aliasFinal==$notAdminCheck) {
    	header("refresh:5;url=http://localhost/practicaRA3/solid/administrarUsuarios.php");
		exit("Error, este usuario ya es un administrador. Volviendo al formulario en 5 segundos");
		}else{
		//Preparo los datos en la tabla
	$stmt = $mysqli->prepare("INSERT INTO $tableAdmin(alias, contrasena, correo) VALUES (?, ?, ?)");
	//Capa de seguridad 'sss' tipo dato de cada variable
    $stmt->bind_param('sss',$aliasFinal, $contrasena, $correo);
	//Ejecuta la consulta
    $stmt->execute(); 
    $result= $stmt->close();
    header("refresh:5;url=http://localhost/practicaRA3/solid/administrarUsuarios.php");
		exit("Ahora el usuario ".$alias." es un adminsitrador. Su alias para iniciar sesion de administrador es:  ".$aliasFinal.". Volviendo al formulario en 5 segundos");
	}

	//Importante enviar mensaje al nuevo administrador.
?>