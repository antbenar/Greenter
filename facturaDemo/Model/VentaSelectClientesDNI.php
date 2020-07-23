<?php
require_once("dbConection.php"); 


$sql="SELECT codigo, nombre, 
	'DNI' AS tipoDoc, numDoc
	FROM cliente
	WHERE tipoDoc = '3'
	ORDER BY codigo;";


if(!$result = $conn->query($sql)){
	exit('Hubo un error(VentaClientes.php) [' . $conn->error . ']');
}

?>