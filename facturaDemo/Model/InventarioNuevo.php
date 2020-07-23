<?php
$response = array();
$response['error'] = ''; 
$response['message'] = ''; 

require_once("dbConection.php"); 
if(!isset($_POST['nombre'])){
	$response['error'] = $conn->error;
	$response['message'] = 'No se pudo crear el producto';
	exit(json_encode($response));
}

$nombre = $conn->real_escape_string($_POST['nombre']);
$precioVenta = $conn->real_escape_string($_POST['precioVenta']);
$impuesto = $conn->real_escape_string($_POST['impuesto']);
$unidadMedida = $conn->real_escape_string($_POST['unidadMedida']);
$costoUnidad = $conn->real_escape_string($_POST['costoUnidad']);
$cantidadInicial = $conn->real_escape_string($_POST['cantidadInicial']);
$fechaActual = date("Y-m-d H:i:s");

//$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
mysqli_autocommit($conn,FALSE);

// create string of queries separated by ;
$query  = "INSERT INTO Inventario(nombre, precioVenta, precioVentaConIGV, unidad, precioCompra, cantidad) VALUES ('".$nombre."',".$precioVenta.",".$impuesto.", '".$unidadMedida."',".$costoUnidad.",".$cantidadInicial.");";

if(!$result = $conn->query($query)){
	$response['error'] = $conn->error; 
	mysqli_rollback($conn);
}

//obtener el mayor id de Inventario

if(!$result = $conn->query("SELECT MAX(codigo) AS codigo FROM Inventario;")){
	$response['error'] = $conn->error; 
	mysqli_rollback($conn);
}
$row = mysqli_fetch_array($result);
$maxCode = $row[0];


//crear updateInventario
//aumento --> 0 si disminuye, 1 si aumenta
$query = "INSERT INTO UpdateInventario(codInventario, aumento, cantidad, fecha) VALUES (".$maxCode.", 1 ,".$cantidadInicial.",'".$fechaActual."');";

if(!$result = $conn->query($query)){
	$response['error'] = $conn->error; 
	mysqli_rollback($conn);
}


mysqli_commit($conn);

if($response['error']!=''){
	$response['message'] = 'No se pudo crear el producto';
}
else {
	$response['message'] = 'Producto creado exitosamente!';
}

echo json_encode($response);


?>