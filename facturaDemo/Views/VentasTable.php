<?php
  require_once("../Model/VentaSelect.php"); 

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
    <button type='button' class='btn-sm btn-primary' onClick='viewVentas(".$codigo.")'> <i class='far fa-eye'></i></button>

    <button type='button' onClick='saveCode(".$codigo.")' class='btn-sm btn-danger' data-toggle='modal' data-target='.modalBorrarVenta'> <i class='far fa-trash-alt'></i></button>
    </td>";

    $output .=  '</tr>';
  }
  echo $output;
?>

<script>
  function viewVentas(code){
    $.ajax({
      type: "POST",
      url: 'VentasViewTable.php',
      data:{codigo:code},
      dataType:"JSON",
      success:function(data){
          //cabecera
          $('#titleVentasView').html("Venta("+ data.tipoDoc +"): " + data.nombreDoc);
          $('#fechaVentasView').html(data.fecha);
          //tabla
          $('#tableBodyViewUpdates').html(data.tableBody);
          //head(cliente)
          $('#VentasViewClienteNombre').html(data.clienteNombre);
          $('#VentasViewClienteTipoDoc').html(data.clienteTipoDoc);
          $('#VentasViewClienteNumDoc').html(data.clienteNumDoc);
          //footer(total)
          $('#VentasViewOpGravadas').html("Op. Gravadas S/. " + data.opGravadas);
          $('#VentasViewOpExoneradas').html("Op. Exoneradas S/. " + data.opExoneradas);
          $('#VentasViewPrecioIGV').html("IGV S/. "+ data.montoIGVTotal);
          $('#VentasViewTotal').html("Total S/. " + data.total);

          $('#modalViewVentas').modal('show');
      }
    });
  }

  function saveCode(code){
    $('#codeVentaDelete').val(code); 
  }
</script>