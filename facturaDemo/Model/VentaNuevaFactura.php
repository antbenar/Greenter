<?php

require_once("dbConection.php"); 

if(!isset($_POST['ventaFacturaSerie'])){
    exit("No se realizó la venta (P)");
}


//documento
$serie = $conn->real_escape_string($_POST['ventaFacturaSerie']);
$correlativo = $conn->real_escape_string($_POST['ventaFacturaCorrelativo']);
//documento-precios
$opGravadas = $conn->real_escape_string($_POST['opGravadas']);
$opExoneradas = $conn->real_escape_string($_POST['opExoneradas']);
$montoIGV = $conn->real_escape_string($_POST['montoIGV']);
$total = $conn->real_escape_string($_POST['total']);
//quitar parte de string
$opGravadas=substr($opGravadas,17);
$opExoneradas=substr($opExoneradas,19);
$montoIGV=substr($montoIGV,8);
$total=substr($total,10);

//cliente
$nombre = $conn->real_escape_string($_POST['nombreCliente_Facturaventa']);
$tipoDoc = $conn->real_escape_string($_POST['tipoDoc_Facturaventa']);
$numDoc = $conn->real_escape_string($_POST['numDoc_Facturaventa']);
//tabla
$tablaJSONPost = $conn->real_escape_string($_POST['table']);
$tablaJSON = str_replace("\\", "", $tablaJSONPost);
$table = json_decode($tablaJSON,true);
//fecha
$fecha = date("Y-m-d H:i:s");

$numRows = count($table);
if($numRows == 1){
    exit("No se ingresaron los productos a vender.");
}

mysqli_autocommit($conn,FALSE);

//----------------------------crear nueva factura
$query  = "INSERT INTO Documento(tipoDoc, serie, correlativo, fecha, opGravadas, opExoneradas, montoIGV, clienteDoc, vigente) VALUES('F','".$serie."',".$correlativo.",'".$fecha."',".$opGravadas.",".$opExoneradas.",".$montoIGV.",'".$numDoc."',-1);";

if(!$result = $conn->query($query)){
    echo "No se pudo registrrar venta [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

//--------------------------seleccionar el codigo de la factura creada
$query = "SELECT MAX(codigo) AS codigo FROM documento;";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar venta (obtener codigo maximo) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

$row = mysqli_fetch_array($result);
$codigoDoc = $row[0];

    
//---------------insertarr cada uno de los productos con el respectivo documento
for ($i = 1; $i < $numRows; $i++) {
    $codigoProducto = $table[$i][0];
    $nombreProducto = $table[$i][1];
    $cantidadProducto = $table[$i][2];
    $PrecioUnitarioProducto = $table[$i][4];
    $IGVUnitarioProducto = $table[$i][5];
    //$PrecioVentaTotalProducto = $table[$i][6];
    //$IGVTotalProducto = $table[$i][7];

    if($cantidadProducto == 0){
        mysqli_rollback($conn);
        exit("No se ingresó la cantidad del producto: ".$nombreProducto);
    }

    //---------------crear documento por inventario
    $query  = "INSERT INTO InventarioXDocumento(codigoInv, codigoDoc, cantidad, fecha, precioVenta, montoIGV) VALUES(".$codigoProducto.",".$codigoDoc.",".$cantidadProducto.",'".$fecha."',".$PrecioUnitarioProducto.",".$IGVUnitarioProducto.");";

    if(!$result = $conn->query($query)){
        echo "No se pudo registrrar venta (insertar productos)[".$conn->error."]";
        mysqli_rollback($conn);
        exit();
    }

    //----------------restar cantidad a Inventario
    $query  = "UPDATE Inventario SET cantidad = cantidad - ".$cantidadProducto." WHERE codigo = ".$codigoProducto.";";
    
    if(!$result = $conn->query($query)){
        echo "No se pudo registrrar venta (error al actualizar cantidad Inventario)[".$conn->error."]";
        mysqli_rollback($conn);
        exit();
    }
}




require("greenterFiles/factura.php");