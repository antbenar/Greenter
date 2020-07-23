<?php

require_once("dbConection.php"); 

if(!isset($_POST['codigo']))
	exit("No se pudo eliminar el elemento seleccionado(P)");


$codigo = $conn->real_escape_string($_POST['codigo']);

mysqli_autocommit($conn,FALSE);


//-------------consultar si vigente = 1(boleta enviada a SUNAT) y por tanto no se puede eliminar
//--------------------------vigente = 2(boleta ya eliminada de la SUNAT) sin embargo el correlativo continua

$query  = "SELECT vigente, tipoDoc FROM Documento WHERE codigo = ".$codigo.";";
if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado(Error al obtener vigente)[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}
$row = mysqli_fetch_row($result);
$vigente = $row[0];
$tipoDoc = $row[1];

if($vigente == 1){
	echo "Documento no eliminado debido a que fue enviado a SUNAT, la manera de eliminar la venta es creando un resumen diario";
	mysqli_rollback($conn);
	exit();
}

//-------------aumentar cantidades vendidas al producto
//--seleccionar las cantidades de cada producto
$query  = "SELECT codigoInv AS codigo, cantidad FROM InventarioXDocumento WHERE codigoDoc = ".$codigo.";";

if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado(Error al consultar inventario)[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}

while ($row = mysqli_fetch_row($result)) { 
	$codigoProducto = $row[0];
	$cantidad = $row[1];

	$query  = "UPDATE Inventario SET cantidad = cantidad + ".$cantidad." WHERE codigo = ".$codigoProducto.";";

	if(!$conn->query($query)){
		echo "No se pudo eliminar el elemento seleccionado(Error al actualizar inventario)[".$conn->error."].";
		mysqli_rollback($conn);
		exit();
	}
}

//-------------eliminar relaciones del producto con documento
$query  = "DELETE FROM InventarioXDocumento WHERE codigoDoc = ".$codigo.";";

if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado(Error al eliminar INVxDOC)[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}


//-------------todas las ventas con correlativo posterior al documento a eliminar tendrán un correlativo menos
$query  = "SELECT tipoDoc FROM Documento WHERE codigo = ".$codigo." AND tipoDoc = '".$tipoDoc."';";
if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado(Error al actualizar correlativos)[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}
$row = mysqli_fetch_row($result);
$tipoVenta = $row[0];

$query  = "UPDATE Documento SET correlativo = correlativo - 1 WHERE codigo > ".$codigo." AND tipoDoc = '".$tipoVenta."';";


if(!$conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado(Error al actualizar correlativos)[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}


//-------------eliminar documento
$query  = "DELETE FROM Documento WHERE codigo = ".$codigo.";";

if(!$result = $conn->query($query)){
	echo "No se pudo eliminar el elemento seleccionado[".$conn->error."].";
	mysqli_rollback($conn);
	exit();
}

echo "Se eliminó el elemento seleccionado.";
mysqli_commit($conn);

?>

