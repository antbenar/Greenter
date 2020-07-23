<?php

use Greenter\Model\Client\Client;
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;

require_once("src/numToLetras.php");
require __DIR__.'\vendor\autoload.php';
require __DIR__.'\config.php';

//------------------------GENERAR BOLETA CON GREENTER--------------------------

//CONFIGURACION DE LOS DATOS GENERALES DEL EMISOR
$config = Configure::getInstance();
$util = $config->getUtil();
$see = $config->getSee();
$company  = $config->getCompany();

// Cliente
$client = new Client();
$client->setTipoDoc("6")
    ->setNumDoc($numDoc)
    ->setRznSocial($nombre);


//DETALLES Venta
$invoice = (new Invoice())
    ->setUblVersion('2.1')
    ->setTipoOperacion('0101') // Catalog. 51
    ->setTipoMoneda('PEN')
    ->setFechaEmision(new \DateTime())
    ->setCompany($company)
    ->setClient($client)

    ->setTipoDoc('01')//01 de factura
    ->setSerie($serie)
    ->setCorrelativo($correlativo)

    ->setMtoOperExoneradas($opExoneradas)//exoneradas
    ->setMtoOperGravadas($opGravadas)//precio sin igv
    ->setValorVenta($opExoneradas+$opGravadas)//precio sin igv(gravadas+exoneradas)
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


/*
$cdr = $res->getCdrResponse();
$util->writeCdr($invoice, $res->getCdrZip());
//$util->showResponse($invoice, $cdr);
*/

/*
//show pdf
try {
    $pdf = $util->getPdf($invoice);
    $util->showPdf($pdf, $invoice->getName().'.pdf');
} catch (Exception $e) {
    var_dump($e);
}

*/