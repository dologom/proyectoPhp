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
	<form action="registroPiso.php" method="post" enctype="multipart/form-data">

		<input type="text" name="referencia" id="referencia" required="" placeholder="Insertar Referencia">

		<input type="text" name="distanciaCM" id="distanciaCM" required=""  placeholder="Distancia Montesori">

		<input type="text" name="tipo" id="descripcionC" required=""  placeholder="Tipo contrato">
		
		<input type="text" name="precio" id="precio" required=""  placeholder="precio">

		<input type="text" name="nHab" id="nHab" required=""  placeholder="nº hab.">

		<input type="file" size="30" name="imagenPrincipal" id="imagenPrincipal" required="" >

		<input type="file" size="30" name="imagen2" id="ImagenSecundaria1" placeholder="ImagenSecundaria1" required="" >

		<input type="file" size="30" name="imagen3" id="ImagenSecundaria2" required="" >

		<input type="file" size="30" name="imagen4" id="ImagenSecundaria3" required="" >

		<input type="file" size="30" name="imagen5" id="ImagenSecundaria4" required="" >

		<input type="text"  name="zona" id="zona" placeholder="Zona donde se encuentra el piso" required="" >

		<!--<input type="text"  rows="30" name="descripcionL" id="descripcionL" placeholder="Inserta aquí la descripcion Larga" required="" >-->
		
		<br>
		<input type="submit" name="enviar" id="enviar" value="Introducir Piso">
</form>
</body>
</html>