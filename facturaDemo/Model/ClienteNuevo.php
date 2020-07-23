<?php

$response = array();
$response['error'] = ''; 
$response['message'] = ''; 

require_once("dbConection.php"); 
if(!isset($_POST['nombre'])){
	$response['error'] = $conn->error;
	$response['message'] = 'No se pudo crear el cliente';
	exit(json_encode($response));
}

$nombre = $conn->real_escape_string($_POST['nombre']);
$tipoDoc = $conn->real_escape_string($_POST['tipoDoc']);
$numDoc = $conn->real_escape_string($_POST['numDoc']);
$direccion = $conn->real_escape_string($_POST['direccion']);
$email = $conn->real_escape_string($_POST['email']);
$telefono = $conn->real_escape_string($_POST['telefono']);

$fecha = date("Y-m-d H:i:s");

//$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
mysqli_autocommit($conn,FALSE);

// create string of queries separated by ;
$query  = "INSERT INTO Cliente(nombre, tipoDoc, numDoc, direccion, email, telefono, fecha) VALUES ('".$nombre."','".$tipoDoc."','".$numDoc."', '".$direccion."','".$email."','".$telefono."','".$fecha."');";

if(!$result = $conn->query($query)){
	$response['error'] = $conn->error;
	mysqli_rollback($conn);
}

mysqli_commit($conn);

if($response['error']!=''){
	$response['message'] = 'No se pudo crear el cliente';
}
else {
	$response['message'] = 'Cliente creado exitosamente!';
}

echo json_encode($response);

//mysqli_close($conn);

?>
