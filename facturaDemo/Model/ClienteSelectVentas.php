<?php
require_once("dbConection.php"); 

$codigo = $_SESSION['codigo'];

//obtener el numero de documento
$query  = "SELECT numDoc FROM cliente WHERE codigo = ".$codigo.";";

if(!$result = $conn->query($query)){
    echo "No se pudo seleccionar el cliente(ClienteSelectVentas.php))[".$conn->error."].";
    mysqli_rollback($conn);
    exit();
}
$row = mysqli_fetch_row($result);
$numDoc = $row[0];


$sql="SELECT CONCAT(day(Documento.fecha),'/',month(Documento.fecha),'/',year(Documento.fecha)) AS fecha,
    (CASE     
        WHEN tipoDoc = 'B' THEN 'Boleta'
        WHEN tipoDoc = 'F' THEN 'Factura'
    END) AS tipoDoc,  CONCAT(serie,'-',correlativo) AS 'serie-correlativo', opGravadas, opExoneradas, montoIGV, (opGravadas+opExoneradas+montoIGV) AS total
    FROM Documento 
    WHERE clienteDoc = '".$numDoc."'
    ORDER BY codigo;";


if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

?>