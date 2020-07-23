<?php

require_once("dbConection.php");

if(!isset($_POST['codigo'])){
	echo "No se pudo acceder al cliente(ClienteSearch.php)";
}

$codigo = $conn->real_escape_string($_POST['codigo']);

require_once("dbConection.php"); 


$sql="SELECT codigo, nombre, tipoDoc, numDoc, email, direccion, telefono
	FROM cliente WHERE codigo = ".$codigo.";";

if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  

?>