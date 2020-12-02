<?php
 session_start();

 session_destroy();

 header("refresh:1;url=http://localhost/practicaRA3/solid/index.php");
		exit("");
?>