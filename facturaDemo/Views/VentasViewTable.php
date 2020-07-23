<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$response = array();

if(!isset($_POST['codigo'])){
  $response['error'] = 'No se posteo el codigo (VentasViewTable.php).';
}

$_SESSION['codigo'] = $_POST['codigo'];

require_once("../Model/VentaView.php"); 

$output = "";

foreach ( $result as $row ) {   
/* 
  $correlativo = $row['nombreDoc'];
  $fecha = $row['fecha'];
  $tipoDoc = $row['tipoDoc'];
  $opGravadas = $row['opGravadas'];
  $opExoneradas = $row['opExoneradas'];
  $montoIGVTotal = $row['montoIGVTotal'];
  $total = $row['total'];
    //cliente
  $clienteNombre = $row['clienteNombre'];
  $clienteTipoDoc = $row['clienteTipoDoc'];
  $clienteNumDoc = $row['clienteNumDoc'];
*/

  //producto
  $nombreProducto = $row['nombreProducto'];
  $cantidad = $row['cantidad'];
  $precioVenta = $row['precioVenta'];
  $montoIGV = $row['montoIGV'];
  $unidad = $row['unidad'];

  $output .= '<tr>';
  $output .= '<td>' . $nombreProducto . "</td>";
  $output .= '<td>' . $cantidad . "</td>";
  $output .= '<td>' . $unidad . "</td>";
  $output .= '<td>' . $precioVenta . "</td>";
  $output .= '<td>' . $montoIGV . "</td>";
  $output .= '<td>' . number_format(($precioVenta + $montoIGV)*$cantidad,2) . "</td>";
  $output .= "</tr>";
} 

//exit(json_encode( $output, JSON_UNESCAPED_SLASHES ));
$response['tableBody'] = $output; 
$response['nombreDoc'] = $row['nombreDoc'];
$response['fecha'] = $row['fecha'];
$response['tipoDoc'] = $row['tipoDoc'];
$response['opGravadas'] = $row['opGravadas'];
$response['opExoneradas'] = $row['opExoneradas'];
$response['montoIGVTotal'] = $row['montoIGVTotal'];
$response['total'] = $row['total'];
$response['clienteNombre'] = $row['clienteNombre'];
$response['clienteTipoDoc'] = $row['clienteTipoDoc'];
$response['clienteNumDoc'] = $row['clienteNumDoc'];

exit(json_encode($response, JSON_UNESCAPED_SLASHES ));


?>