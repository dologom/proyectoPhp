	<?php
	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
	$tableName = 'inmueble';

	$referencia = $_POST['referencia'];
	$distancia = $_POST['distancia'];
	$tipo = $_POST['tipo'];
	$precio = $_POST['precio'];
	$n_habitaciones = $_POST['nHab'];
	$zona = $_POST['zona'];

	$directorio = '/practicaRA3/solid/imagenesBDDPisos/';

	$nombre_img = $_FILES['imagenPrincipal']['name'];
	$extension = pathinfo($nombre_img, PATHINFO_EXTENSION);
	$tamano = $_FILES['imagenPrincipal']['size'];
	$imagenPrincipal = $directorio.$nombre_img;
	//echo $_SESSION['url'];

	//DATOS IMAGEN2
	$nombre_img2 = $_FILES['imagen2']['name'];
	$extension = pathinfo($nombre_img2, PATHINFO_EXTENSION);
	$tamano = $_FILES['imagen2']['size'];
	$img2Url = $directorio.$nombre_img2;

	//DATOS IMAGEN3
	$nombre_img3 = $_FILES['imagen3']['name'];
	$extension = pathinfo($nombre_img3, PATHINFO_EXTENSION);
	$tamano = $_FILES['imagen3']['size'];
	$img3Url = $directorio.$nombre_img3;

	//DATOS IMAGEN4
	$nombre_img4 = $_FILES['imagen4']['name'];
	$extension = pathinfo($nombre_img4, PATHINFO_EXTENSION);
	$tamano = $_FILES['imagen4']['size'];
	$img4Url = $directorio.$nombre_img4;
	//DATOS IMAGEN5
	$nombre_img5 = $_FILES['imagen5']['name'];
	$extension = pathinfo($nombre_img5, PATHINFO_EXTENSION);
	$tamano = $_FILES['imagen5']['size'];
	$img5Url = $directorio.$nombre_img5;

	//DATOS TEXTO
	if (isset($nombre_img)) {
		$img1 =$mysqli->query("UPDATE $tableName SET imagenPrincipal='$imagenPrincipal' where referencia= '$referencia'");
	}

	if (isset($nombre_img2)) {
		$img2 =$mysqli->query("UPDATE $tableName SET imagenSecundaria1 ='$img2Url'where referencia= '$referencia'");
	}

	if (isset($nombre_img3)) {
		$img3 =$mysqli->query("UPDATE $tableName SET imagenSecundaria2= '$img3Url' where referencia= '$referencia'");
	}

	if (isset($nombre_img4)) {
		$img4 =$mysqli->query("UPDATE $tableName SET imagenSecundaria3= '$img4Url' where referencia= '$referencia'");
	}

	if (isset($nombre_img5)) {
		$img5 =$mysqli->query("UPDATE $tableName SET imagenSecundaria4= '$img5Url' where referencia= '$referencia'");
	}
	$sqlDistancia = $mysqli->query("UPDATE $tableName SET distancia='$distancia' where referencia= '$referencia'");
	$sqlTipo = $mysqli->query("UPDATE $tableName SET tipo='$tipo' where referencia= '$referencia'");
	$sqlPrecio = $mysqli->query("UPDATE $tableName SET precio='$precio' where referencia= '$referencia'");
	$sqlHab = $mysqli->query("UPDATE $tableName SET n_habitaciones='$n_habitaciones' where referencia= '$referencia'");
	$sqlZona = $mysqli->query("UPDATE $tableName SET zona='$zona' where referencia= '$referencia'");
	//DATOS IMG

	if (isset($img1)&&isset($img2)&&isset($img3)&&isset($img4)&&isset($img5)) {
    header("refresh:5;url=http://localhost/practicaRA3/solid/administrarPisos.php");
		exit("Piso modificado correctamente. Volviendo al menu del administrador...");
}else{
	    //header("refresh:5;url=http://localhost/practicaRA3/solid/administrarPisos.php");
		exit("Error al modificar el piso. Recargando la página en 5 segundos");
}
	?>