<?php

  session_start();

  $mysqli = new mysqli("localhost", "root", "", "pisospalvicente");

  $tableName = 'usuario';

  $idPiso = $_GET['name'];

    //Actualizo los datos de la BBDD mediante consultas

  if ($eliminar==("DELETE_".$alias)) {
     $mysqli ->query("Delete From $tableName Where alias ='$alias'");

    echo "Tu usuario ha sido eliminado con exito. Redireccionando...";
    header("refresh:3;url=http://localhost/practicaRA3/solid/index.html");

   session_destroy();
  }else{
    echo "El usuario NO se ha eliminado. Redireccionando...";
    header("refresh:3;url=http://localhost/practicaRA3/solid/perfilUsuario.php"); 
  }
   

?>