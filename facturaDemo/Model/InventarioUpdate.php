<?php
$response = array();
$response['error'] = ''; 
$response['message'] = ''; 

require_once("dbConection.php"); 
if(!isset($_POST['code_hidden_edit']))
	echo "No se postearon los datos";


$codigo = $conn->real_escape_string($_POST['code_hidden_edit']);
$nombre = $conn->real_escape_string($_POST['nombreProducto_edit']);
$precioVenta = $conn->real_escape_string($_POST['precioVenta_edit']);
$impuesto = $conn->real_escape_string($_POST['impuesto_edit']);
$unidadMedida = $conn->real_escape_string($_POST['unidadMedida_edit']);
$costoUnidad = $conn->real_escape_string($_POST['costoUnidadProducto_edit']);
$cantidad = $conn->real_escape_string($_POST['cantidad_edit']);

$operacion = $conn->real_escape_string($_POST['operacion_edit']);

$fechaActual = date("Y-m-d H:i:s");

mysqli_autocommit($conn,FALSE);

//-----actualizar inventario
if($operacion == 1 or $operacion == 2){
	$query  = "UPDATE Inventario SET nombre = '".$nombre."', precioVenta = ".$precioVenta.", precioVentaConIGV = ".$impuesto.", unidad = '".$unidadMedida."', precioCompra = ".$costoUnidad.", cantidad = cantidad + ".$cantidad." WHERE codigo = ".$codigo.";";
}
else if($operacion == 0 or $operacion == 3){
	$query  = "UPDATE Inventario SET nombre = '".$nombre."', precioVenta = ".$precioVenta.", precioVentaConIGV = ".$impuesto.", unidad = '".$unidadMedida."', precioCompra = ".$costoUnidad.", cantidad = cantidad - ".$cantidad." WHERE codigo = ".$codigo.";";
}
else{
	$query  = "UPDATE Inventario SET nombre = '".$nombre."', precioVenta = ".$precioVenta.", precioVentaConIGV = ".$impuesto.", unidad = '".$unidadMedida."', precioCompra = ".$costoUnidad." WHERE codigo = ".$codigo.";";
}

if(!$result = $conn->query($query)){
	$response['error'] = $conn->error;
	mysqli_rollback($conn);
}



//----------actualizar los incrementos de inventario
if($operacion >= 0){
	$query  = "INSERT INTO updateinventario (codInventario, aumento, cantidad, fecha) VALUES (".$codigo.", ".$operacion.", ".$cantidad.",'".$fechaActual."');";


	if(!$result = $conn->query($query)){
		$response['error'] = $conn->error;
		mysqli_rollback($conn);
	}
}

mysqli_commit($conn);

if($response['error']!=''){
	$response['message'] = 'No se pudo actualizar el producto seleccionado';
}
else {
	$response['message'] = 'Se actualizo el producto seleccionado!';
}

echo json_encode($response);


?>

