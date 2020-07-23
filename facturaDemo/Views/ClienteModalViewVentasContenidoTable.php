<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_POST['codigo'])){

  $_SESSION['codigo'] = $_POST['codigo'];

  require_once("../Model/ClienteSelectVentas.php"); 

  $output = " 
  <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Tipo Doc.</th>
        <th>Serie-Correlativo</th>
        <th>Op. Gravadas</th>
        <th>Op. Exoneradas</th>
        <th>Monto IGV</th>
        <th>Total</th>
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