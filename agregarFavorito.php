<?php
	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
	$tableName = 'favoritos';
	$idPiso = $_GET['name'];
	$datosPiso = $mysqli->query("SELECT * FROM inmueble WHERE id = '$idPiso'");
	$row = $datosPiso->fetch_array(MYSQLI_ASSOC);
	$referencia = $row['referencia'];
	$distancia = $row['distancia'];
	$tipo = $row['tipo'];
	$precio = $row['precio'];
	$n_habitaciones = $row['n_habitaciones'];
	$zona = $row['zona'];
	$imagenPrincipal = $row['imagenPrincipal'];
	$img2 = $row['imagenSecundaria1'];
	$img3 = $row['imagenSecundaria2'];
	$img4 = $row['imagenSecundaria3'];
	$img5 = $row['imagenSecundaria4'];


	$name_usuario = $_SESSION['username'];//ESTO NO DEBERIA DE FUNCIONAR... PERO LO HACE
	$datosUsuario = $mysqli->query("SELECT * FROM usuario WHERE alias = '$name_usuario'");
	$row2= $datosUsuario->fetch_array(MYSQLI_ASSOC);
	$id_usuario = $row2['id'];
	$sqlDatos = $mysqli->prepare("INSERT INTO $tableName(referencia, distancia, tipo, n_habitaciones, zona, precio, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$sqlDatos -> bind_param('sssissi', $referencia, $distancia, $tipo, $n_habitaciones, $zona, $precio, $id_usuario);
	$sqlDatos->execute();
	$verificacionSqlDatos = $sqlDatos->close();

	//En lugar de insertar los datos actualizo los campos de las imagenes para que no se genere un nuevo ID.
	$sql1 =$mysqli->query("UPDATE $tableName SET imagenPrincipal='$imagenPrincipal' where referencia= '$referencia'");
	$sql2 =$mysqli->query("UPDATE $tableName SET imagenSecundaria1 ='$img2'where referencia= '$referencia'");
	$sql3 =$mysqli->query("UPDATE $tableName SET imagenSecundaria2= '$img3' where referencia= '$referencia'");
	$sql4 =$mysqli->query("UPDATE $tableName SET imagenSecundaria3= '$img4' where referencia= '$referencia'");
	$sql5 =$mysqli->query("UPDATE $tableName SET imagenSecundaria4= '$img5' where referencia= '$referencia'");
	if ($verificacionSqlDatos&&isset($sql1)&&isset($sql2)&&isset($sql3)&&isset($sql4)&&isset($sql5)) {
    header("refresh:1;url=http://localhost/practicaRA3/solid/indexUsuario.php");
		exit("Piso añadido correctamente.");
}else{
	    header("refresh:1;url=http://localhost/practicaRA3/solid/indexUsuario.php");
		exit("Error al añadir el piso. Recargando la página en 5 segundos");
}
	?>