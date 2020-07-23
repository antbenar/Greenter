<?php

require_once("dbConection.php"); 

$sql="SELECT codigo, nombre, cantidad, unidad, precioVenta,
	(CASE     
         WHEN precioVentaConIGV > 0 THEN ROUND(precioVenta*0.18 ,2)
         ELSE 0.00
     END) AS IGV
      FROM Inventario ORDER BY codigo;";

if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

?>
