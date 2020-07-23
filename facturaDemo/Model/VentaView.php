<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once("dbConection.php"); 

$codigo = $_SESSION['codigo'];


$sql="SET @total=0;";
$result = $conn->query($sql);

$sql="
SELECT documento.fecha,
    (CASE     
        WHEN documento.tipoDoc = 'B' THEN 'Boleta'
        WHEN documento.tipoDoc = 'F' THEN 'Factura'
    END) AS tipoDoc, 
    CONCAT(serie,'-',correlativo) AS nombreDoc, documento.opGravadas, documento.opExoneradas, documento.montoIGV AS montoIGVTotal, (documento.opGravadas+documento.opExoneradas+documento.montoIGV) AS total,
    inventario.nombre AS nombreProducto, inventario.unidad AS unidad, InventarioXDocumento.cantidad AS cantidad,  InventarioXDocumento.precioVenta AS precioVenta,  InventarioXDocumento.montoIGV AS montoIGV, cliente.nombre AS clienteNombre, cliente.numDoc AS clienteNumDoc,
     (CASE     
        WHEN cliente.tipoDoc = '1' THEN 'RUC'
        WHEN cliente.tipoDoc = '3' THEN 'DNI'
    END) AS clienteTipoDoc,
    serie, correlativo, inventario.codigo AS codigoInv
FROM InventarioXDocumento
JOIN inventario ON inventario.codigo = InventarioXDocumento.codigoInv
JOIN documento ON documento.codigo = InventarioXDocumento.codigoDoc
JOIN cliente ON cliente.numDoc = documento.clienteDoc
WHERE documento.codigo = ".$codigo.";";


if(!$result = $conn->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
}

?>