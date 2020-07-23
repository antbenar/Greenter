<?php
require_once("dbConection.php"); 

$sql="SELECT codigo, nombre, 
	(CASE     
         WHEN tipoDoc = '3' THEN 'DNI'
         WHEN tipoDoc = '1' THEN 'RUC'
     END) AS tipoDoc, 
     numDoc, telefono
	FROM cliente ORDER BY codigo;";


if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

?>