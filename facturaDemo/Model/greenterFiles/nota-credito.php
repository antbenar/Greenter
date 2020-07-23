<?php

use Greenter\Model\Client\Client;
use Greenter\Model\Sale\Document;
use Greenter\Model\Sale\Note;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;
use Greenter\Ws\Services\SunatEndpoints;

require_once("src/numToLetras.php");
require __DIR__.'\vendor\autoload.php';
require __DIR__.'\config.php';

//CONFIGURACION DE LOS DATOS GENERALES DEL EMISOR
$config = Configure::getInstance();
$util = $config->getUtil();
$see = $config->getSee();
$company  = $config->getCompany();

//editar codigo factura
$tipoDocCliente='';
if($tipoDoc == 'B'){ 
    $tipoDoc = '03';
    $tipoDocCliente='1';
}
else{
    $tipoDoc = '01';
    $tipoDocCliente='6';
} 

// Cliente
$client = new Client();
$client->setTipoDoc($tipoDocCliente)
    ->setNumDoc($numDoc)
    ->setRznSocial($nombre);

//DETALLES Venta
$invoice = (new Note())
    ->setUblVersion('2.1')
    //->setTipoOperacion('0101') // Catalog. 51
    ->setTipoMoneda('PEN')
    ->setFechaEmision(new DateTime())
    ->setCompany($company)
    ->setClient($client)

    ->setTipoDoc('07')//07 de nota de credito
    ->setSerie($NotaCreditoSerie)
    ->setCorrelativo($NotaCreditoCorrelativo)

    ->setTipDocAfectado($tipoDoc)
    ->setNumDocfectado($serie.'-'.$correlativo)
    ->setCodMotivo($NotaCreditoTipo)
    ->setDesMotivo($descripcionNotaCredito)

    ->setMtoOperExoneradas($opExoneradas)//exoneradas
    ->setMtoOperGravadas($opGravadas)//precio sin igv
    //->setValorVenta($opExoneradas+$opGravadas)//precio sin igv(gravadas+exoneradas)
    ->setMtoIGV($montoIGV)//costo IGV
    ->setTotalImpuestos($montoIGV)//costo IGV
    ->setMtoImpVenta($total)//total
    ;

$detalles=array();

//DETALLES POR PRODUCTO
for ($i = 1; $i < $numRows; $i++) {
    $codigoProducto = $table[$i][0];
    $nombreProducto = $table[$i][1];
    $cantidadProducto = $table[$i][2];
    $PrecioUnitarioProducto = $table[$i][4];
    $IGVUnitarioProducto = $table[$i][5];


    $item = (new SaleDetail())
    ->setUnidad('NIU')
    ->setPorcentajeIgv(18.00) // 18%
    //->setCodProducto('P001')
    ->setCantidad($cantidadProducto)
    ->setDescripcion($nombreProducto)    
    ->setMtoBaseIgv($PrecioUnitarioProducto*$cantidadProducto)//total sin igv
    ->setMtoValorVenta($PrecioUnitarioProducto*$cantidadProducto)//total sin igv
    ->setIgv($IGVUnitarioProducto*$cantidadProducto)//igv del total
    ->setTotalImpuestos($IGVUnitarioProducto*$cantidadProducto)//igv del total
    ->setMtoValorUnitario($PrecioUnitarioProducto)//unitario sin igv
    ->setMtoPrecioUnitario($PrecioUnitarioProducto + $IGVUnitarioProducto);//unitario con igv

    if($IGVUnitarioProducto == 0){
        $item->setTipAfeIgv('20');//operacion exonearda onorosa
    }
    else{
        $item->setTipAfeIgv('10');
    }


    array_push($detalles,$item);
}

$legend = (new Legend())
    ->setCode('1000')
    ->setValue("Son ".NumerosEnLetras::convertir($total,'SOLES',true));

$invoice->setDetails($detalles)
        ->setLegends([$legend]);


// Envio a SUNAT.
$res = $see->send($invoice);

if (!$res->isSuccess()) {
    echo "Error CDR\n";
    echo $util->getErrorResponse($res->getError());

    mysqli_rollback($conn);
    exit();
}
else{
    $util->writeXml($invoice, $see->getFactory()->getLastXml());
    $util->writeCdr($invoice, $res->getCdrZip());


    $cdr = $res->getCdrResponse();
    echo 'Enviado Correctamete, 
    -------Datos CDR-------
    ID:'.$cdr->getId().'
    Código:'.$cdr->getCode().'
    Descripción:'.$cdr->getDescription();

    mysqli_commit($conn);//recien hacemos el commit de la db

}
