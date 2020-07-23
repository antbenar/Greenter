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
      <button type='button' class='btn-sm btn-success' onClick='NotaCreditoSelectFactura(".$codigo.")'> <i class='fa fa-check'></i></button>
      </td>";

    $output .=  '</tr>';
  }
  echo $output;
?>

<script>
  function NotaCreditoSelectFactura(code){
    $.ajax({
      type: "POST",
      url: 'NotaCreditoNuevoTable.php',
      data:{codigo:code},
      dataType:"JSON",
      success:function(data){
          //tabla
          $('#NotaCreditoProductos').html(data.tableBody);
          //cambiar correlativo de la nota de credito segun su tipo(boleta/factura)
          if(data.tipoDoc == 'Boleta') $('#NotaCreditoSerie').val('BC01'); 
          else $('#NotaCreditoSerie').val('FC01');

          $.ajax({
            type: "POST",
            url: '../Model/NotaCreditoSelectCorrelativo.php',
            data:{serie:$('#NotaCreditoSerie').val()},
            dataType:'JSON',
            success:function(data){  
              if(data.error) alert(data.error);
              else{
                $('#NotaCreditoSerie').val(data.serie);
                $('#NotaCreditoCorrelativo').val(data.correlativo);
              }
            }
          });

          //head(boleta/factura)
          $('#NotaCreditoTipoDoc').val(data.tipoDoc);
          $('#NotaCreditoSerieComprobante').val(data.serieDoc);
          $('#NotaCreditoCorrelativoComprobante').val(data.correlativoDoc);
          //head(cliente)
          $('#NotaCreditoNombreCliente').val(data.clienteNombre);
          if(data.clienteTipoDoc == "DNI") $('#NotaCreditoTipoDocCliente').val("3");
          else $('#NotaCreditoTipoDocCliente').val("1");
          $('#NotaCreditoNumDocCliente').val(data.clienteNumDoc);
          //footer(total)
          $('#NotaCreditoOpGravadas').html("Op. Gravadas S/. " + data.opGravadas);
          $('#NotaCreditoOpExoneradas').html("Op. Exoneradas S/. " + data.opExoneradas);
          $('#NotaCreditoPrecioIGV').html("IGV S/. "+ data.montoIGVTotal);
          $('#NotaCreditoTotal').html("Total S/. " + data.total);

          $('#NotaCreditoSeleccionarFacturaModal').modal('hide');
      }
    });
  }

</script>