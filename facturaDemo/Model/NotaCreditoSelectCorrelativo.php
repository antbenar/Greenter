<?php
$response = array();
$response['error'] = ''; 

require_once("dbConection.php"); 

$serie = $conn->real_escape_string($_POST['serie']);

$sql="SELECT serie, MAX(correlativo)+1 AS correlativo FROM documentoNota WHERE tipoDoc='C' AND serie = '".$serie."';";

if(!$result = $conn->query($sql)){
	$response['error'] = $conn->error;
	exit(json_encode($response));
}

$row = mysqli_fetch_array($result);  
echo json_encode($row);  

?>
