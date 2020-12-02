<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/paginacion.css">
	<title>Paginacion</title>
</head>
<body>
	<div class="contenedor">
		<section class="articulos">
			<ul>
				<?php 
				session_start();
				$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

				$name_usuario = $_SESSION['username'];//ESTO NO DEBERIA DE FUNCIONAR... PERO LO HACE
				$datosUsuario = $mysqli->query("SELECT * FROM usuario WHERE alias = '$name_usuario'");
				$row2= $datosUsuario->fetch_array(MYSQLI_ASSOC);
				$idUser = $row2['id'];

				$sql = "Select * FROM favoritos WHERE id_usuario = '$idUser' ";
				$res=mysqli_query($mysqli,$sql);

				?>
				<?php foreach ($res as $res): ?>
						<div class="col-md-4">
						<div class="fh5co-portfolio animate-box">
							<a href="#">
								<div class="portfolio-entry" style="background-image: url(<?php echo $res['imagenPrincipal']?>);">
									<div class="desc">
										<?php $id=$res['id'];?>
										<p>Número habitaciones: <?php echo $res['n_habitaciones'] ?> </p>
										<p>Contrato: <?php echo $res['tipo'] ?> </p>
										<p>Precio: <?php echo $res['precio'] ?> </p>
										<p>DistanciaMontesori: <?php echo $res['distancia'] ?></p>
										<p>Zona: <?php echo $res['zona'] ?></p>
									</div>
								</div>
								<div class="portfolio-text text-center">
									<h3>Referencia: <?php echo $res['referencia'] ?></h3>
									<ul class="stuff">
										<?php echo "<a class=\"icon-eye2\"  onclick=\"location.href='http://localhost/practicaRA3/solid/detallePiso.php?name=$id'\"> ver piso</a>"?>
									
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</ul>
		</section>
	</div>
</body>
</html>