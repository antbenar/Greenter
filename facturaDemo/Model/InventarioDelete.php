<?php

require_once("dbConection.php"); 

if(!isset($_POST['codigo']))
	exit("No se pudo eliminar el elemento seleccionado");


$codigo = $conn->real_escape_string($_POST['codigo']);

$flag = 0;//false

mysqli_autocommit($conn,FALSE);

$query  = "DELETE FROM updateinventario WHERE codinventario = ".$codigo.";";

if(!$result = $conn->query($query)){
	$flag = 1;
	mysqli_rollback($conn);
}

$query  = "DELETE FROM Inventario WHERE codigo = ".$codigo.";";

if(!$result = $conn->query($query)){
	$flag = 1;
	mysqli_rollback($conn);
}



if($flag == 1){
	echo "No se pudo eliminar el elemento seleccionado debido a que tiene ventas registradas.";
}
else{
	mysqli_commit($conn);
	echo "Se eliminó el elemento seleccionado.";
}


?>

