<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perfil Usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
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


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	</head>
	<body>
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
							<li><a input type="button" href="#"><span>Favoritos</span></a></li>
							<li><a  input type="button" href="#" onclick="location.href='http://localhost/practicaRA3/solid/perfilUsuario.php'"><span>Perfil</span></a></li>
						</ul>
					</div>
				</nav>
			</div>
	  </div>
	</header>

	<!--Vinculo con la sesión del usuario -->
	<section id="fh5co-explore" data-section="explore">
		<div class="container">
	<?php
	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
	
	//Traigo los datos del usuario a esta pagina.
	$alias = $_SESSION['username'];
	$contrasena = $_SESSION['contrasena'];
	$tableName = 'usuario';
	//Extraigo el resto de datos con una consulta
	$consultaUsuario = "SELECT * FROM $tableName WHERE alias = '$alias'";
	$datosUsuario = $mysqli->query($consultaUsuario);
	//var_dump($datosUsuario);
	//Guardo los datos en un array
	$arrayDatosUsuario = $datosUsuario->fetch_array(MYSQLI_ASSOC);
	//var_dump($arrayDatosUsuario);

	//Guardo cada dato en su variable correspondiente.
	$nombre = $arrayDatosUsuario['nombre'];
	$apellido1 = $arrayDatosUsuario['apellido1'];
	$apellido2 = $arrayDatosUsuario['apellido2'];
	$edad = $arrayDatosUsuario['edad'];
	$telefono = $arrayDatosUsuario['telefono'];
	$contrasena = $arrayDatosUsuario['contrasena'];
	/*
	//Compruebo que los datos del usuario llegan a esta pagina.
	echo $username;
	echo $password;*/
	?>
		<h3>Modificar Perfil</h3>
			<form class="contact-form" name="loggin" method="post" action="updateDatosUsuario.php">
				<div class="form-group">
					<div class="form-group">
						<label for="name" class="sr-only" title="Nombre">Name</label>
						<a>Nombre: </a>
						<input type="name" class="form-control" id="name" name="name" placeholder="nombre" 
						value="<?php echo $nombre; ?>" >
					</div>
						<div class="form-group">
						<label for="apellido1" class="sr-only"></label>
						<a>Primer Apellido: </a>
						<input type="name" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido" value="<?php echo $apellido1; ?>" >
					</div>
						<div class="form-group">
						<label for="apellido2" class="sr-only"></label>
						<a>Segundo Apellido: </a>
						<input type="name" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" value="<?php echo $apellido2; ?>" >
					</div>
						<div class="form-group">
						<label for="edad" class="sr-only"></label>
						<a>Edad:</a>
						<input type="name" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $edad; ?>" >
					</div>
						<div class="form-group">
						<label for="telefono" class="sr-only"></label>
						<a>Telefono </a>
						<input type="name" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="<?php echo $telefono ?>" >
					</div>
					<span>
					<div class="form-group">
						<input type="submit" id="btn-submit-guardar" class="btn btn-send-message btn-md" value="Guardar">
					</div>
					<div class="form-group">
						<label for="cancelar" class="sr-only">Descartar cambios</label>
						<input type="button" class="form-control" id="dCambios" name="dCambios" value="Descartar Cambios" href="#"
						onclick="location.href='http://localhost/practicaRA3/solid/perfilUsuario.php'">
					</div>
					</span>
				</div>
			</form>
			<br>
			<h3>Cambiar Contraseña</h3>
			<form class="contact-form" name="loggin" method="post" action="updateContrasenaUsuario.php">
			<div class="form-group">
				<div class="form-group">
					<label for="password" class="sr-only">Contraseña</label>
					<a>Introduzca su nueva contraseña </a>
					<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña Nueva" value="">
				</div>
					<div class="form-group">
					<label for="password2" class="sr-only">Contraseña</label>
					<a>Confirma la contraseña que has introducido </a>
					<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmar Contraseña" value="">
				</div>
				<div class="form-group">
					<input type="submit" id="btn-submit-guardar" class="btn btn-send-message btn-md" value="Cambiar">
				</div>
			</div>
			</form>
		<br>
		<h3>Eliminar Perfil</h3>
			<form class="contact-form" name="loggin" method="post" action="eliminarUsuario.php">
			<div class="form-group">
				<label for="eliminar" class="sr-only"></label>
				<a href=""> </a>
				<input type="name" class="form-control" id="eliminar" name="eliminar" placeholder="Para eliminar su usuario introduzca su alias como en el ejemplo. Ejemplo.: DELETE_ejemplo" >
			</div>
			<div class="form-group">
					<input type="submit" id="btn-submit-eliminar" class="btn btn-send-message btn-md" value="Eliminar">
				</div>
			</form>
	</section>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>
