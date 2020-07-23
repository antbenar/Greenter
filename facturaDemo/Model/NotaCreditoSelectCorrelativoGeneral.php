<?php
$response = array();
$response['error'] = ''; 

require_once("dbConection.php"); 

$sql="SELECT serie, MAX(correlativo)+1 AS correlativo FROM documentoNota WHERE tipoDoc='C';";

if(!$result = $conn->query($sql)){
	$response['error'] = $conn->error;
	exit(json_encode($response));
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  

?>
