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
      <button type='button' class='btn-sm btn-success' onClick='NotaDebitoSelectFactura(".$codigo.")'> <i class='fa fa-check'></i></button>
      </td>";

    $output .=  '</tr>';
  }
  echo $output;
?>

<script>
  function NotaDebitoSelectFactura(code){
    $.ajax({
      type: "POST",
      url: 'NotaDebitoNuevoTable.php',
      data:{codigo:code},
      dataType:"JSON",
      success:function(data){
          //tabla
          $('#NotaDebitoProductos').html(data.tableBody);
          //cambiar correlativo de la nota de Debito segun su tipo(boleta/factura)
          if(data.tipoDoc == 'Boleta') $('#NotaDebitoSerie').val('BD01'); 
          else $('#NotaDebitoSerie').val('FD01');

          $.ajax({
            type: "POST",
            url: '../Model/NotaDebitoSelectCorrelativo.php',
            data:{serie:$('#NotaDebitoSerie').val()},
            dataType:'JSON',
            success:function(data){  
              if(data.error) alert(data.error);
              else{
                $('#NotaDebitoSerie').val(data.serie);
                $('#NotaDebitoCorrelativo').val(data.correlativo);
              }
            }
          });

          //head(boleta/factura)
          $('#NotaDebitoTipoDoc').val(data.tipoDoc);
          $('#NotaDebitoSerieComprobante').val(data.serieDoc);
          $('#NotaDebitoCorrelativoComprobante').val(data.correlativoDoc);
          //head(cliente)
          $('#NotaDebitoNombreCliente').val(data.clienteNombre);
          if(data.clienteTipoDoc == "DNI") $('#NotaDebitoTipoDocCliente').val("3");
          else $('#NotaDebitoTipoDocCliente').val("1");
          $('#NotaDebitoNumDocCliente').val(data.clienteNumDoc);
          //footer(total)
          $('#NotaDebitoOpGravadas').html("Op. Gravadas S/. " + data.opGravadas);
          $('#NotaDebitoOpExoneradas').html("Op. Exoneradas S/. " + data.opExoneradas);
          $('#NotaDebitoPrecioIGV').html("IGV S/. "+ data.montoIGVTotal);
          $('#NotaDebitoTotal').html("Total S/. " + data.total);

          $('#NotaDebitoSeleccionarFacturaModal').modal('hide');
      }
    });
  }

</script>