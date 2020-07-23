<?php
$response = array();
$response['error'] = ''; 

require_once("dbConection.php"); 

$sql="SELECT serie, MAX(correlativo)+1 AS correlativo FROM documento WHERE tipoDoc='B';";

if(!$result = $conn->query($sql)){
	$response['error'] = $conn->error;
	exit(json_encode($response));
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  

?>
