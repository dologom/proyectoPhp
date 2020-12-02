<?php
  session_start();

  $mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

    $idMensaje = $_GET['id'];
    $result = $mysqli ->query("Delete From mensaje Where id ='$idMensaje'");

      header("refresh:3;url=http://localhost/practicaRA3/solid/administrarMensajes.php");

?>