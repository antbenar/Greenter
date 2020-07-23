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
    //producto
  $nombreProducto = $row['nombreProducto'];
  $cantidad = $row['cantidad'];
  $precioVenta = $row['precioVenta'];
  $montoIGV = $row['montoIGV'];
  $unidad = $row['unidad'];
  $codigo = $row['codigoInv'];

  $output .= '<tr>';
  $output .= '<td style="display:none">' . $codigo . "</td>";
  $output .= '<td>' . $nombreProducto . "</td>";
  $output .= "<td><input type='number' onchange='NotaCreditoCalcularTotal()' step='0.1' class='form-control' required='required' style='border:0' value=" . $cantidad . "></td>";
  $output .= '<td>' . $unidad . "</td>";
  $output .= "<td><input type='number' onchange='NotaCreditoCalcularTotal()' step='0.1' class='form-control' required='required' style='border:0' value=" . $precioVenta . "></td>";
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
$response['serieDoc'] = $row['serie'];
$response['correlativoDoc'] = $row['correlativo'];

echo json_encode($response, JSON_UNESCAPED_SLASHES );


?>
