<?php

require_once("dbConection.php"); 

if(!isset($_POST['NotaDebitoSerie'])){
    exit("No se pudo realizar la nota de crédito(P)");
}


//Nota de Debito
$NotaDebitoSerie = $conn->real_escape_string($_POST['NotaDebitoSerie']);
$NotaDebitoCorrelativo = $conn->real_escape_string($_POST['NotaDebitoCorrelativo']);
$NotaDebitoTipo = $conn->real_escape_string($_POST['NotaDebitoTipo']);
$descripcionNotaDebito = $conn->real_escape_string($_POST['NotaDebitoDescripcion']);
//Documento a modificar
$tipoDoc = $conn->real_escape_string($_POST['NotaDebitoTipoDoc']);
if($tipoDoc == 'Boleta') $tipoDoc = 'B'; else $tipoDoc = 'F';
$serie = $conn->real_escape_string($_POST['NotaDebitoSerieComprobante']);
$correlativo = $conn->real_escape_string($_POST['NotaDebitoCorrelativoComprobante']);
//documento-precios
$opGravadas = $conn->real_escape_string($_POST['NotaDebitoOpGravadas']);
$opExoneradas = $conn->real_escape_string($_POST['NotaDebitoOpExoneradas']);
$montoIGV = $conn->real_escape_string($_POST['NotaDebitoPrecioIGV']);
$total = $conn->real_escape_string($_POST['NotaDebitoTotal']);
//quitar parte de string
$opGravadas=substr($opGravadas,17);
$opExoneradas=substr($opExoneradas,19);
$montoIGV=substr($montoIGV,8);
$total=substr($total,10);

//cliente
$nombre = $conn->real_escape_string($_POST['NotaDebitoNombreCliente']);
$numDoc = $conn->real_escape_string($_POST['NotaDebitoNumDocCliente']);
//tabla
$tablaJSONPost = $conn->real_escape_string($_POST['table']);
$tablaJSON = str_replace("\\", "", $tablaJSONPost);
$table = json_decode($tablaJSON,true);
//fecha
$fecha = date("Y-m-d H:i:s");


mysqli_autocommit($conn,FALSE);


//--------------------------seleccionar el codigo de la factura/boleta a modificar
$query = "SELECT codigo FROM documento  WHERE serie = '".$serie."' AND correlativo = ".$correlativo." ORDER BY codigo DESC;";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito(obtener codigo Comprobante) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

$row = mysqli_fetch_array($result);
$codigoFactura = $row[0];


//----------------------------crear nueva factura
$query  = "INSERT INTO Documento(tipoDoc, serie, correlativo, fecha, opGravadas, opExoneradas, montoIGV, clienteDoc, vigente,codigoDocModificado) VALUES('".$tipoDoc."','".$serie."',".$correlativo.",'".$fecha."',".$opGravadas.",".$opExoneradas.",".$montoIGV.",'".$numDoc."',".$NotaDebitoTipo.", ".$codigoFactura.");";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito (crear nueva factura) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

//--------------------------seleccionar el codigo de la factura creada
$query = "SELECT MAX(codigo) AS codigo FROM documento;";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito (obtener codigo maximo) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

$row = mysqli_fetch_array($result);
$codigoNuevaFactura = $row[0];




//----------------------------crear nueva nota de debito

$query  = "INSERT INTO DocumentoNota(tipoDoc, serie, correlativo, fecha, codigoDocModificado, codMotivo, descripcion) VALUES('D','".$NotaDebitoSerie."',".$NotaDebitoCorrelativo.",'".$fecha."', ".$codigoNuevaFactura.",".$NotaDebitoTipo.",'".$descripcionNotaDebito."');";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito (crear nueva nota de crédito) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}



//--------------------------seleccionar el codigo deldocumento creado
$query = "SELECT MAX(codigo) AS codigo FROM documento;";

if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito (obtener codigo maximo) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

$row = mysqli_fetch_array($result);
$codigoDoc = $row[0];

    


//---------------insertarr cada uno de los productos con el respectivo documento
$numRows = count($table);

$query = "SELECT cantidad FROM InventarioXDocumento WHERE codigoDoc = ".$codigoFactura.";";

$result_cantidad = "";
if(!$result_cantidad = $conn->query($query)){
    echo "No se pudo registrar nota de crédito (obtener codigo maximo) [".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}


for ($i = 1; $i < $numRows; $i++) {
    //---------atributos de producto original
    $row = mysqli_fetch_array($result_cantidad);
    $cantidadOriginal = $row[0];
    //echo($cantidadOriginal."  --- ");

    //--------atributos de producto de nota de Debito
    $codigoProducto = $table[$i][0];
    $nombreProducto = $table[$i][1];
    $cantidadProducto = $table[$i][2];
    $PrecioUnitarioProducto = $table[$i][4];
    $IGVUnitarioProducto = $table[$i][5];
    
    $query  = "INSERT INTO InventarioXDocumento(codigoInv, codigoDoc, cantidad, fecha, precioVenta, montoIGV) VALUES(".$codigoProducto.",".$codigoNuevaFactura.",".$cantidadProducto.",'".$fecha."',".$PrecioUnitarioProducto.",".$IGVUnitarioProducto.");";


    if(!$result = $conn->query($query)){
        echo "No se pudo registrrar nota de crédito(insertar productos)[".$conn->error."]";
        mysqli_rollback($conn);
        exit();
    }

}


$query  = "UPDATE Documento SET vigente = -3 WHERE codigo = 10 + ".$codigoFactura.";";
        
if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito(error al actualizar factura vigente)[".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

require("greenterFiles/nota-debito.php");