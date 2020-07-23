<?php
$response = array();
$response['error'] = ''; 

require_once("dbConection.php"); 

if(!isset($_POST['codigo'])){
	$response['error'] = $conn->error;
	exit(json_encode($response));
}

$codigo = $conn->real_escape_string($_POST['codigo']);

$sql="SELECT codigo, precioCompra, precioVenta, nombre, cantidad, unidad,
	(CASE     
         WHEN precioVentaConIGV > 0 THEN ROUND(precioVenta*0.18,2)
         ELSE 0.00
     END) AS IGV
      FROM Inventario WHERE codigo = ".$codigo." ORDER BY codigo;";

if(!$result = $conn->query($sql)){
	$response['error'] = $conn->error;
	exit(json_encode($response));
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  

?>
