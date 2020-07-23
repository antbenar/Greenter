<?php
require_once("../Model/VentaSelectClientesRUC.php"); 

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

  $output .= "<td>
  <button type='button' class='btn-sm btn-success' onClick='editVentasClientFactura(".$codigo.")'> <i class='fa fa-check'></i></button>
  </td>";

  $output .= '</tr>';
} 

echo $output;  

?>

<script>
  function editVentasClientFactura(code){ 
     $.ajax({  
          url:"../Model/ClienteSearch.php",  
          method:"POST",  
          data:{codigo:code},  
          dataType:"json",  
          success:function(data){  
              $('#nombreCliente_Facturaventa').val(data.nombre);  
              $('#tipoDoc_Facturaventa').val(data.tipoDoc);  
              $('#numDoc_Facturaventa').val(data.numDoc);   
              $('#VentaSeleccionarFacturaClienteModal').modal('hide');   
          }  
     });  
  }
</script>