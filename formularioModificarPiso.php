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
	<link rel="stylesheet" type="text/css" href="css/plantillaModificarPiso.css">
</head>
<header role="banner" id="fh5co-header">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<!-- Mobile Toggle Menu Button -->
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
						<a class="navbar-brand" href="index.html">Pisos Pal Vicente</a> 
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

	?>
	<form action="updatePiso.php" method="post" enctype="multipart/form-data">

		<input type="text" name="referencia" id="referencia" placeholder="Insertar Referencia" value="<?php echo $referencia;?>">

		<input type="text" name="distancia" id="distanciaCM"  placeholder="Distancia Montesori" value="<?php echo $distancia;?>">

		<input type="text" name="tipo" id="descripcionC" placeholder="Tipo contrato" value="<?php echo $tipo;?>">
		
		<input type="text" name="precio" id="precio"  placeholder="precio" value="<?php echo $precio?>">

		<input type="text" name="nHab" id="nHab" placeholder="nº hab." value="<?php echo $n_habitaciones?>">

		<div id="imagenPrincipal"><img id="redimensionador" src="<?php echo $imagenPrincipal?>">
		<input style="z-index: 40" type="file" size="30" name="imagenPrincipal" value="<?php echo $imagenPrincipal?>">
		</div>

		<div  style="z-index: 40" id="ImagenSecundaria1"><img id="redimensionador" src="<?php echo $img2?>">
		<input type="file" size="30" name="imagen2" placeholder="ImagenSecundaria1" value="<?php echo $img2?>" >
		</div>
		
		<div style="z-index: 40" id="ImagenSecundaria2"><img id="redimensionador" src="<?php echo $img3?>">
			<input type="file" size="30" name="imagen3" value="<?php echo $img3?>"></div>
		
		<div style="z-index: 40; margin-bottom: 80px;" id="ImagenSecundaria3"><img id="redimensionador" src="<?php echo $img4?>">
			<input type="file" size="30" name="imagen4" value="<?php echo $img4?>"></div>
		
		<div style="z-index: 40; margin-bottom: 80px;" id="ImagenSecundaria4"><img id="redimensionador" src="<?php echo $img5?>">
			<input type="file" size="30" name="imagen5" value="<?php echo $img5?>"></div>
		

		<input type="text"  name="zona" id="zona" placeholder="Zona donde se encuentra el piso" value="<?php echo $zona?>">

		<!--<input type="text"  rows="30" name="descripcionL" id="descripcionL" placeholder="Inserta aquí la descripcion Larga" required="" >-->
		
		<br>
		<input type="submit" name="enviar" id="enviar" value="Actualizar">
</form>
</body>
</html>