
<?php

session_start();
//Conectar con base de datos
$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

/*
if (mysqli_connect("localhost", "root", "")) {
	echo "<p>MySQL le ha dado permiso a PHP para ejecutar consultas con ese usuario y clave</p>";
	}else{
	echo "<p>MySQL no conoce ese usuario y password, y rechaza el intento de conexión</p>";
	}*/

$tableName = 'inmueble';
$tableNameAdmin = 'administrador';

//Datos del formulario
$referencia = $_POST['referencia'];
$distancia = $_POST['distanciaCM'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$n_hab = $_POST['nHab'];
$zona = $_POST['zona'];

//DATOS IMAGEN1
$nombre_img = $_FILES['imagenPrincipal']['name'];
$extension = pathinfo($nombre_img, PATHINFO_EXTENSION);
$tamano = $_FILES['imagenPrincipal']['size'];
/*//Comprobacion
echo $nombre_img;
echo"<br>";
echo $extension;
echo"<br>";
echo $tamano;
echo"<br>"; 
echo "Ruta donde se va a almacenar la imagen =>".$_SERVER['DOCUMENT_ROOT'];*/
$directorio = '/practicaRA3/solid/imagenesBDDPisos/';
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
//Compruebo que vicente no me este colando un archivo malicioso... capaz es.
	//1
	if (is_uploaded_file($_FILES['imagenPrincipal']['tmp_name'])||is_uploaded_file($_FILES['imagen2']['tmp_name'])||is_uploaded_file($_FILES['imagen3']['tmp_name'])||is_uploaded_file($_FILES['imagen4']['tmp_name'])||is_uploaded_file($_FILES['imagen5']['tmp_name'])){
		
	}else{
		header("refresh:5;url=http://localhost/practicaRA3/solid/posiblePlantillaPiso.php");
		exit("Operación cancelada la imagen que intenta subir podria contener codigo malicioso. Sinvergüenza!!");
	}

//SUBIDA IMAGEN
	//1
	move_uploaded_file($_FILES['imagenPrincipal']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$nombre_img);

	$_SESSION['url']= $directorio.$nombre_img;
	//2
	move_uploaded_file($_FILES['imagen2']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$nombre_img2);

	$_SESSION['url']= $directorio.$nombre_img2;
	//3
	move_uploaded_file($_FILES['imagen3']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$nombre_img3);

	$_SESSION['url']= $directorio.$nombre_img3;
	//4
	move_uploaded_file($_FILES['imagen4']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$nombre_img4);

	$_SESSION['url']= $directorio.$nombre_img4;
	//5
	move_uploaded_file($_FILES['imagen5']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$nombre_img5);

	$_SESSION['url']= $directorio.$nombre_img5;

//Genero una consulta para insertar los datos de los pisos.
		//Separo la insercion de las imagenes del resto de los datos. Y lo paso los datos con un bind_param para que vicente este contento.

$sqlDatos = $mysqli->prepare("INSERT INTO $tableName(referencia, distancia, tipo, n_habitaciones, zona, precio) VALUES (?, ?, ?, ?, ?, ?)");
	$sqlDatos -> bind_param('sssiss', $referencia, $distancia, $tipo, $n_hab, $zona, $precio);
	$sqlDatos->execute();
	$verificacionSqlDatos = $sqlDatos->close();

	//En lugar de insertar los datos actualizo los campos de las imagenes para que no se genere un nuevo ID.
	$img1 =$mysqli->query("UPDATE $tableName SET imagenPrincipal='$imagenPrincipal' where referencia= '$referencia'");
	$img2 =$mysqli->query("UPDATE $tableName SET imagenSecundaria1 ='$img2Url'where referencia= '$referencia'");
	$img3 =$mysqli->query("UPDATE $tableName SET imagenSecundaria2= '$img3Url' where referencia= '$referencia'");
	$img4 =$mysqli->query("UPDATE $tableName SET imagenSecundaria3= '$img4Url' where referencia= '$referencia'");
	$img5 =$mysqli->query("UPDATE $tableName SET imagenSecundaria4= '$img5Url' where referencia= '$referencia'");


//Mensaje de que el usuario se ha añadido correctamente y consulta cerrada

if ($verificacionSqlDatos&&isset($img1)&&isset($img2)&&isset($img3)&&isset($img4)&&isset($img5)) {
    header("refresh:5;url=http://localhost/practicaRA3/solid/administrarPisos.php");
		exit("Piso añadido correctamente. Volviendo al menu del administrador...");
}else{
	    header("refresh:5;url=http://localhost/practicaRA3/solid/aregistroPiso.php");
		exit("Error al añadir el piso. Recargando la página en 5 segundos");
}
?>
