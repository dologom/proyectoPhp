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
				<?php foreach ($result as $res): ?>
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
										<?php echo "<a class=\"icon-heart2\"  onclick=\"location.href='http://localhost/practicaRA3/solid/agregarFavorito.php?name=$id'\"></a>"?>
										<?php echo "<a class=\"icon-eye2\"  onclick=\"location.href='http://localhost/practicaRA3/solid/detallePiso.php?name=$id'\"> ver piso</a>"?>
									
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</ul>
		</section>

		<div class="paginacion">
			<ul>
				<!-- Establecemos cuando el boton de "Anterior" estara desabilitado -->
				<?php if($paginaActual == 1): ?>
					<li class="disabled">&laquo;</li>
				<?php else: ?>
					<li><a href="?paginaActual=<?php echo $paginaActual - 1 ?>">&laquo;</a></li>
				<?php endif; ?>

				<!-- Ejecutamos un ciclo para mostrar las paginas -->
				<?php 
					for($i = 1; $i <= $totalPaginas; $i++){
						if ($paginaActual === $i) {
							echo "<li class='active'><a href='?paginaActual=$i'>$i</a></li>";
						} else {
							echo "<li><a href='?paginaActual=$i'>$i</a></li>";
						}
					}
				 ?>

				<!-- Establecemos cuando el boton de "Siguiente" estara desabilitado -->
				<?php if($paginaActual == $totalPaginas): ?>
					<li class="disabled">&raquo;</li>
				<?php else: ?>
					<li><a href="?paginaActual=<?php echo $paginaActual + 1 ?>">&raquo;</a></li>
				<?php endif; ?>
					
			</ul>
		</div>
	</div>
</body>
</html>