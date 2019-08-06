<?php

	$host="localhost";
	$usuario="root";
	$senha="imagine4";
	$database="bd_molduraria";
	$conecta=mysqli_connect($host, $usuario, $senha, $database);
	mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta,'SET character_set_connection=utf8');
mysqli_query($conecta,'SET character_set_client=utf8');
mysqli_query($conecta,'SET character_set_results=utf8');

	



?>