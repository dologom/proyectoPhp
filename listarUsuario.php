<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
$tableName = 'usuario';
$sql = "Select * From $tableName ";

$res=mysqli_query($mysqli,$sql);

$i = 0;
echo "<a onclick=\"location.href='http://localhost/practicaRA3/solid/registroAdministrador.html'\" style=\"margin-left: 30px; font-size: 30px;\">Crear nuevo admin</a><br>";
echo "<a style=\"margin-left: 30px; font-size: 30px;\">USUARIO</a>";
echo "<div>";
echo "<form method=\"post\">";
while($result = mysqli_fetch_array($res)){
	$id=$result['id'];
	echo $id;
    $alias=$result['alias'];
    echo "<a style=\"margin-left: 30px; font-size: 25px; color:black;\">".$result['alias']."</a>";
   /* echo "<input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/nuevoAdministrador.php?name=$id'\" value=\"Hacer Administrador\" style=\"margin-left: 50px; font-size: 15px; color:black;\"></input>";*/
  //  echo "<input type=\"hidden\" value=\"".$result['alias']."\" name=\"name\">";
    echo "<input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/adminEliminarUsuario.php?name=$id'\" value=\"Eliminar Usuario\"  style=\"margin-left: 30px; font-size: 15px; color: grey;\"></input>";
  //  echo "<input type=\"hidden\" value=\"".$result['alias']."\" name=\"name\" >";
    echo "<div>";
    echo "<br>";

}
echo "</form>";
echo "</div>"
?>
