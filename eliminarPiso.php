<?php

  session_start();

  $mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

  $tableName = 'inmueble';
  $idPiso = $_GET['name'];

   $result = $mysqli ->query("Delete From $tableName Where id ='$idPiso'");
if ($result) {
    echo "El piso ".$idPiso ." ha sido eliminado con exito. Redireccionando...";
    header("refresh:3;url=http://localhost/practicaRA3/solid/administrarPisos.php");

  }else{
    echo "El piso ".$idPiso  ." NO se ha eliminado. Redireccionando...";
    header("refresh:3;url=http://localhost/practicaRA3/solid/administrarPisos.php"); 
  }
   

?>
