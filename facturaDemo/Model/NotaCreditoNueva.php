<?php

require_once("dbConection.php"); 

if(!isset($_POST['NotaCreditoSerie'])){
    exit("No se pudo realizar la nota de crédito(P)");
}


//Nota de Credito
$NotaCreditoSerie = $conn->real_escape_string($_POST['NotaCreditoSerie']);
$NotaCreditoCorrelativo = $conn->real_escape_string($_POST['NotaCreditoCorrelativo']);
$NotaCreditoTipo = $conn->real_escape_string($_POST['NotaCreditoTipo']);
$descripcionNotaCredito = $conn->real_escape_string($_POST['NotaCreditoDescripcion']);
//Documento a modificar
$tipoDoc = $conn->real_escape_string($_POST['NotaCreditoTipoDoc']);
if($tipoDoc == 'Boleta') $tipoDoc = 'B'; else $tipoDoc = 'F';
$serie = $conn->real_escape_string($_POST['NotaCreditoSerieComprobante']);
$correlativo = $conn->real_escape_string($_POST['NotaCreditoCorrelativoComprobante']);
//documento-precios
$opGravadas = $conn->real_escape_string($_POST['NotaCreditoOpGravadas']);
$opExoneradas = $conn->real_escape_string($_POST['NotaCreditoOpExoneradas']);
$montoIGV = $conn->real_escape_string($_POST['NotaCreditoPrecioIGV']);
$total = $conn->real_escape_string($_POST['NotaCreditoTotal']);
//quitar parte de string
$opGravadas=substr($opGravadas,17);
$opExoneradas=substr($opExoneradas,19);
$montoIGV=substr($montoIGV,8);
$total=substr($total,10);

//cliente
$nombre = $conn->real_escape_string($_POST['NotaCreditoNombreCliente']);
$numDoc = $conn->real_escape_string($_POST['NotaCreditoNumDocCliente']);
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
$query  = "INSERT INTO Documento(tipoDoc, serie, correlativo, fecha, opGravadas, opExoneradas, montoIGV, clienteDoc, vigente,codigoDocModificado) VALUES('".$tipoDoc."','".$serie."',".$correlativo.",'".$fecha."',".$opGravadas.",".$opExoneradas.",".$montoIGV.",'".$numDoc."',".$NotaCreditoTipo.", ".$codigoFactura.");";

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




//----------------------------crear nueva nota de crédito

$query  = "INSERT INTO DocumentoNota(tipoDoc, serie, correlativo, fecha, codigoDocModificado, codMotivo, descripcion) VALUES('C','".$NotaCreditoSerie."',".$NotaCreditoCorrelativo.",'".$fecha."', ".$codigoNuevaFactura.",".$NotaCreditoTipo.",'".$descripcionNotaCredito."');";

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

    //--------atributos de producto de nota de credito
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

    //---------------solo agregamos cantidad aquellos que hayan cambiado de cantidad
    if($cantidadOriginal != $cantidadProducto ){
        $nuevaCantidad = $cantidadOriginal - $cantidadProducto;
        //----------------restar cantidad a Inventario
        $query  = "UPDATE Inventario SET cantidad = cantidad + ".$nuevaCantidad." WHERE codigo = ".$codigoProducto.";";
        
        if(!$result = $conn->query($query)){
            echo "No se pudo registrar nota de crédito(error al actualizar cantidad Inventario)[".$conn->error."]";
            mysqli_rollback($conn);
            exit();
        }
    }

}


$query  = "UPDATE Documento SET vigente = -3 WHERE codigo = ".$codigoFactura.";";
        
if(!$result = $conn->query($query)){
    echo "No se pudo registrar nota de crédito(error al actualizar factura vigente)[".$conn->error."]";
    mysqli_rollback($conn);
    exit();
}

require("greenterFiles/nota-credito.php");