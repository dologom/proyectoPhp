<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
$tableName = 'inmueble';
$sql = "Select * From $tableName ";

$res=mysqli_query($mysqli,$sql);

$i = 0;
echo "<a onclick=\"location.href='http://localhost/practicaRA3/solid/formularioNuevoPiso.php'\" style=\"margin-left: 30px; font-size: 30px;\">Insertar Nuevo Piso</a><br>";

echo "<a style=\"margin-left: 30px; font-size: 30px;\">Pisos</a>";
echo "<div>";

while($result = mysqli_fetch_array($res)){
	$id=$result['id'];
	echo $id;
    $inmueble=$result['referencia'];
    echo "<a style=\"margin-left: 30px; font-size: 25px; color:black;\">".$result['referencia']."</a>";

    echo "<input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/detallePiso.php?name=$id'\" value=\"Ver Piso\" style=\"margin-left: 50px; font-size: 15px; color:black;\"></input>";

    echo "<input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/formularioModificarPiso.php?name=$id'\" value=\"Modificar Piso\" style=\"margin-left: 50px; font-size: 15px; color:black;\"></input>";

    echo "<input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/eliminarPiso.php?name=$id'\" value=\"Eliminar Piso\"  style=\"margin-left: 30px; font-size: 15px; color: grey;\"></input>";

    echo "<div>";
    echo "<br>";

}
echo "</form>";
echo "</div>"
?>
