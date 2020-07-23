<?php
  require_once("../Model/NotaCreditoSelect.php"); 

  $codigo = 0;
  $output = "";

  foreach ( $result as $row ) {
    $i = 0;
    
    $output .= '<tr>';

    foreach ( $row as $element ) {
      if ($i == 0) {
        $codigo = $element;
      } 
      else{
        $output .= '<td>' . $element . '</td>';
      }
      $i++;
    }

    $output .=  '</tr>';
  }
  echo $output;
?>
