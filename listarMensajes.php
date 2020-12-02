<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
$tableName = 'mensaje';
$sqlSinLeer = "Select * From $tableName WHERE leido = 1";
$sqlLeidos = "Select * From $tableName WHERE leido = 0";

$res1=mysqli_query($mysqli,$sqlSinLeer);
$res2=mysqli_query($mysqli,$sqlLeidos);
//Consulta nombre usuario.

$i = 0;
echo "<div>";
echo "<table style=\"margin-left: 30px; padding: 15px;\">";
echo "<a style=\"margin-left: 30px; font-size: 30px;\">Mensajes Sin Leer</a>";
echo "<tr><td style=\"color:black\"> id </td><td style=\"color:black\"> asunto </td><td style=\"color:black\"> usuario </td><tr>";
while($result = mysqli_fetch_array($res1)){
	$id=$result['id'];
  $idUser=$result['id_usuario'];
  $asunto=$result['asunto'];
    $sql = "Select * From usuario WHERE id = '$idUser' ";
    $resUser=mysqli_query($mysqli,$sql);
    $resultUser = mysqli_fetch_array($resUser);
  $user=$resultUser['alias'];
  $mensaje=$result['mensaje'];

  echo "<tr>";
	echo "<td ".$id."</td>";
  echo "<td>".$asunto."</td>";
  echo "<td>".$user."</td>";
 
   echo "<td><input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/verMensaje.php?id=$id'\" value=\"Leer\" style=\"margin-left: 50px; font-size: 15px; color:black;\"></input></td>";

    echo "<td><input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/eliminarMensaje.php?id=$id'\" value=\"Eliminar Mensaje\"  style=\"margin-left: 30px; font-size: 15px; color: grey;\"></input></td></tr>";
    echo "<br>";

}
echo "</div>";
echo "<div>";
echo "<table style=\"margin-left: 30px; padding: 15px;\">";
echo "<a style=\"margin-left: 30px; font-size: 30px;\">Mensajes Leidos</a>";
echo "<tr><td style=\"color:black\"> id </td><td style=\"color:black\"> asunto </td><td style=\"color:black\"> usuario </td><tr>";

while($result = mysqli_fetch_array($res2)){
  $id=$result['id'];
  $idUser=$result['id_usuario'];
  $asunto=$result['asunto'];
    $sql = "Select * From usuario WHERE id = '$idUser' ";
    $resUser=mysqli_query($mysqli,$sql);
    $resultUser = mysqli_fetch_array($resUser);
  $user=$resultUser['alias'];
  $mensaje=$result['mensaje'];

  echo "<tr>";
  echo "<td>".$id."</td>";
  echo "<td>".$asunto."</td>";
  echo "<td>".$user."</td>";
 
   echo "<td><input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/verMensaje.php?id=$id'\" value=\"Leer\" style=\"margin-left: 50px; font-size: 15px; color:black;\"></input></td>";

    echo "<td><input type=\"button\" onclick=\"location.href='http://localhost/practicaRA3/solid/eliminarMensaje.php?id=$id'\" value=\"Eliminar Mensaje\"  style=\"margin-left: 30px; font-size: 15px; color: grey;\"></input></td></tr>";
    echo "<br>";

}
echo "</table>";
echo "</div>";

?>