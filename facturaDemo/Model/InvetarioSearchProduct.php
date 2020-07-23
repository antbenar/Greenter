<?php

require_once("dbConection.php");

if(!isset($_POST['codigo'])){
	echo "No se pudo acceder al producto(InventarioSearchProducto.php)";
}

$codigo = $conn->real_escape_string($_POST['codigo']);

require_once("dbConection.php"); 

$sql="SELECT codigo, nombre, unidad, 
	(CASE     
         WHEN precioVentaConIGV > 0 THEN ROUND(precioVenta*1.18 ,2)
         ELSE precioVenta
     END) AS precioVenta , precioCompra, precioVentaConIGV FROM Inventario WHERE codigo = ".$codigo." ORDER BY codigo;";

if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  
?>