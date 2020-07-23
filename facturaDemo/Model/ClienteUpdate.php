<?php
$response = array();
$response['error'] = ''; 
$response['message'] = ''; 

require_once("dbConection.php"); 
if(!isset($_POST['code_hidden_client_edit'])){
	$response['error'] = $conn->error;
	$response['message'] = 'No se pudo actualizar el cliente (P)';
	exit(json_encode($response));
}


$codigo = $conn->real_escape_string($_POST['code_hidden_client_edit']);
$nombre = $conn->real_escape_string($_POST['nombreCliente_edit']);
$tipoDoc = $conn->real_escape_string($_POST['tipoDoc_edit']);
$numDoc = $conn->real_escape_string($_POST['numDoc_edit']);
$direccion = $conn->real_escape_string($_POST['direccion_edit']);
$email = $conn->real_escape_string($_POST['email_edit']);
$telefono = $conn->real_escape_string($_POST['telefono_edit']);


mysqli_autocommit($conn,FALSE);


$query  = "UPDATE Cliente SET nombre = '".$nombre."', tipoDoc = '".$tipoDoc."', numDoc = '".$numDoc."', direccion = '".$direccion."', email = '".$email."', telefono = '".$telefono."' WHERE codigo = ".$codigo.";";


if(!$result = $conn->query($query)){
	$response['error'] = $conn->error;
	mysqli_rollback($conn);
}



mysqli_commit($conn);

if($response['error']!=''){
	$response['message'] = 'No se pudo actualizar el cliente';
}
else {
	$response['message'] = 'Se actualizo el cliente seleccionado!';
}

echo json_encode($response);


?>

