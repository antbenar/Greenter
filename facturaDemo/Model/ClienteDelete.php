<?php

require_once("dbConection.php"); 

if(!isset($_POST['codigo']))
	exit("No se pudo eliminar el elemento seleccionado(P)");


$codigo = $conn->real_escape_string($_POST['codigo']);

mysqli_autocommit($conn,FALSE);

$query  = "DELETE FROM Cliente WHERE codigo = ".$codigo.";";

if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado.";
	mysqli_rollback($conn);
}
else{
	echo "Se eliminó el elemento seleccionado.";
}

mysqli_commit($conn);

?>

