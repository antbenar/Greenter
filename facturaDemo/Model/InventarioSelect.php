<?php
require_once("dbConection.php"); 

$sql="SELECT codigo, nombre, cantidad, unidad, 
	(CASE     
         WHEN precioVentaConIGV > 0 THEN ROUND(precioVenta*1.18 ,2)
         ELSE precioVenta
     END) AS precioVenta , 
     precioCompra  
	FROM Inventario ORDER BY codigo;";


if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

?>