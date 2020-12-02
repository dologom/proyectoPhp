<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Solid &mdash; Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<title>Plantilla para insertar Piso</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">
	<!--Mi estilo-->
	<link rel="stylesheet" type="text/css" href="css/plantillaPiso.css">
</head>
<header role="banner" id="fh5co-header">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<!-- Mobile Toggle Menu Button -->
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
						<a class="navbar-brand" href="index.php">Pisos Pal Vicente</a> 
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a input type="button" href="#"onclick="location.href='http://localhost/practicaRA3/solid/indexAdministrador.html'"><span>Volver a la pestaña de administrador</span></a></li>
						</ul>
					</div>
				</nav>
			</div>
	  </div>
	</header>
<body>
	<?php
	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
	$tableName = 'inmueble';
	$idPiso = $_GET['name'];
	$datosPiso = $mysqli->query("SELECT * FROM $tableName WHERE id = '$idPiso'");
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

	//url
	$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	?>
	<form action="registroPiso.php" method="post" enctype="multipart/form-data">

		<div id="referencia"><b>Ref.:</b><?php echo $referencia;?></div>

		<div id="distanciaCM"><b>De Montessori a: </b><?php echo $distancia;?></div>

		<div id="descripcionC"><b>Contrato: </b><?php echo $tipo;?></div>
		
		<div id="precio"><?php echo $precio?> €</div>

		<div id="nHab"><b>Habs: </b><?php echo $n_habitaciones;?></div>

		<div id="imagenPrincipal"><img id="redimensionador" src="<?php echo $imagenPrincipal?>"></div>

		<div id="ImagenSecundaria1"><img id="redimensionador" src="<?php echo $img2?>"></div>

		<div id="ImagenSecundaria2"><img id="redimensionador" src="<?php echo $img3?>"></div>

		<div id="ImagenSecundaria3"><img id="redimensionador" src="<?php echo $img4?>"></div>

		<div id="ImagenSecundaria4"><img id="redimensionador" src="<?php echo $img5?>"></div>

		<div id="zona"><b>Zona: </b><?php echo $zona?></div>

		<!--<input type="text"  rows="30" name="descripcionL" id="descripcionL" placeholder="Inserta aquí la descripcion Larga" required="" >-->

		<br>
		<input type="button" name="enviar" id="enviar" value="Descargar Piso" <?php echo "onclick=\"location.href='http://localhost/practicaRA3/solid/imprimirPDF.php?name=$referencia'\""?> >

</body>
</html>