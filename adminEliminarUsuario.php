<html>
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
$tableName = 'usuario';

//Recupero aqui el alias del usuario para no tener que pasarlo por url.
$tableName = 'usuario';
	//Traigo el id del formulario anterior por URL
$id = $_GET['name'];
$consultaAlias = $mysqli->query("SELECT * FROM $tableName WHERE id = '$id'");
$row = $consultaAlias->fetch_array(MYSQLI_ASSOC);
$alias = $row['alias'];

/*echo "<p style=\"font-size: 30px;\">Esta seguro de que desea eliminar el usuario: </p><b style=\"font-size: 30px;\">ID: ".$id.". ALIAS: ".$alias."<br><br>"*/;
?>
<!-- ME DEJO DE ROLLOS QUE ME ESTOY VOLVIENDO LOCO POR NADA
<form action="#" method="_GET">
	<input style="font-size: 30px;" type="submit" name="si" value="Si, deseo eliminar este usuario">
	<input style="font-size: 30px;margin-left: 15px;" type="submit" name="no" value="No">
</form>-->
<?php
/*
$confirmado="";
$confirmado="";
$confirmado = $_GET['si'];
$Confirmado = $_GET['no'];
if ($confirmado="si") {
	echo "Usuario eliminado";
}else if($confirmado="no"){
	echo "El usuario no ha sido eliminado";
}else{
	echo "Ha ocurrido un error";
}*/
echo "El usuario : ".$alias." ha sido eliminado con exito. Redireccionando...";
header("refresh:3;url=http://localhost/practicaRA3/solid/administrarUsuarios.php");
$mysqli ->query("Delete From $tableName Where alias='$alias'");

//Enviar mensaje al correo del usuario.
?>
</html>