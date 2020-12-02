
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Solid &mdash; Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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

	<link rel="stylesheet" href="css/paginacion.css">
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
						<a class="navbar-brand"  onclick="location.href='http://localhost/practicaRA3/solid/index.php'">Pisos Pal Vicente</a> 
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a input type="button" href="#"onclick="location.href='registroUsuario.html'"><span>Registrarse</span></a></li>
							<li><a  input type="button" href="#" onclick="location.href='loggin.html'"><span>Iniciar sesion</span></a></li><li><a  input type="button" href="#" onclick="location.href='http://localhost/practicaRA3/solid/logginAdmin.html'"><span>Administrador</span></a></li>
						</ul>
					</div>
				</nav>
			</div>
	  </div>
	</header>
	<section id="fh5co-explore" data-section="explore">
		<div class="fh5co-project">
			<div class="container">
				<div class="row">
	<?php
	session_start();
	$mysqli = new mysqli("localhost", "root", "root", "pisospalvicente");
	$CantidadMostrar = 6;
 	$paginaActual=(int)(!isset($_GET['paginaActual'])) ? 1 : $_GET['paginaActual'];
 	$totalArticulos =$mysqli->query("SELECT * FROM inmueble");
 //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
 	//ceil redondea fracciones hacia arriba.
	$totalPaginas  =ceil($totalArticulos->num_rows/$CantidadMostrar);
	echo "<br>";
	//Consulta SQL
	$sql = "Select * FROM inmueble ";
		$res=mysqli_query($mysqli,$sql);
	
	$query = "
	SELECT SQL_CALC_FOUND_ROWS * FROM inmueble
	LIMIT $paginaActual, $CantidadMostrar
";
	$result = $mysqli->query($query);

	/*while($result = mysqli_fetch_array($res)){
	     echo $result['referencia'].$result['distancia'].$result['tipo'].$result['precio']
	     .$result['n_habitaciones'].$result['zona'].$result['imagenPrincipal'];
	     echo "<br>";
	}*/

	require 'paginacion.php';
?>

			</div>	
		</div>
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

