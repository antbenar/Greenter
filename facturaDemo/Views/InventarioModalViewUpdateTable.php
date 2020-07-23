<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_POST['codigo'])){

  $_SESSION['codigo'] = $_POST['codigo'];

  require_once("../Model/InventarioSelectUpdate.php"); 

  $output = " 
  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
      <tr>
        <th width='20%'>Fecha</th>
        <th width='20%'>Nombre</th>
        <th>Detalle</th>
        <th>Aumento</th>
        <th>Disminucion</th>
        <th>Saldo</th>
      </tr>
    </thead>
    <tbody>";


  foreach ( $result as $row ) {    
    $output .= '<tr>';

    foreach ( $row as $element ) {
      $output .= '<td>' . $element . '</td>';
    }

    $output .= '</tr>';
  } 
  $output .= "               
			</tbody>
    </table>
  ";  

  echo $output;  
 }  
?>