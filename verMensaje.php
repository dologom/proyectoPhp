<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

$id = $_GET['id'];
$sql = "Select * From mensaje WHERE id = $id";

$res=mysqli_query($mysqli,$sql);
$result = mysqli_fetch_array($res);
echo $result['mensaje'];

$mysqli ->query("UPDATE mensaje SET leido=0 WHERE id='$id'");

echo "<br><input type=\"button\" value=\"volver\" onclick=\"location.href='http://localhost/practicaRA3/solid/administrarMensajes.php'\" >"
?>