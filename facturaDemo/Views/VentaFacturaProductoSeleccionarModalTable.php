<?php

require("../Model/VentaSelectProducto.php"); 

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
  <button type='button' class='btn-sm btn-success' onClick='VentaAnadirProductoFactura(".$codigo.")'> <i class='fa fa-plus'></i></button>
  </td>";

  $output .= '</tr>';
} 

echo $output;  

?>

<script>
  function CalcularTotalFactura(){
    //recorrer la tabla y sumar el total
    var i;
    var table = "#tableFacturaVentaProductos";
    
    var size = $('#tableFacturaVentaProductos tr').length;
    
    var opGravadas = 0;
    var opExoneradas = 0;
    var sumaIGV = 0;

    for (i = 1; i < size; i++) {
      var cantidad = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(3) input[type='number']").val());
      var precio = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(5) input[type='number']").val());

      var precioIGV = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(6)").text());

      //en caso de que sea op. gravada, se cambia los datos
      if(precioIGV != 0){
        //actualiar IGV segun el precio de venta actual
        precioIGV = Math.round((0.18*precio)*100)/100;
        $(table + " tr:nth-child("+i+") td:nth-child(6)").text(precioIGV);

        //cambiar la columna de IGV total
        var nuevoIGVTotal = Math.round((cantidad*precioIGV)*100)/100;
        $(table + " tr:nth-child("+i+") td:nth-child(8)").text(nuevoIGVTotal.toFixed(2));

        opGravadas += cantidad*precio;
        sumaIGV += cantidad*precioIGV;
      }
      else{
        opExoneradas += cantidad*precio;
      }
      
      //cambiar la columna de precioVenta
      var nuevoPrecio = Math.round((cantidad*precio)*100)/100;
      $(table + " tr:nth-child("+i+") td:nth-child(7)").text(nuevoPrecio.toFixed(2));
    }

    var total = Math.round((opGravadas  + opExoneradas + sumaIGV)*100)/100;
    var opGravadas = Math.round(opGravadas*100)/100;
    var opExoneradas = Math.round(opExoneradas*100)/100;
    var sumaIGV = Math.round(sumaIGV*100)/100;

    $('#VentaFacturaOpGravadas').html("Op. Gravadas S/. " + opGravadas.toFixed(2));
    $('#VentaFacturaOpExoneradas').html("Op. Exoneradas S/. " + opExoneradas.toFixed(2));
    $('#VentaFacturaprecioIGV').html("IGV S/. " + sumaIGV.toFixed(2));
    $('#VentaFacturaTotal').html("Total S/. " + total.toFixed(2));
  }




  const $tableIDFactura = $('#tableFacturaVentaProductos');

  $tableIDFactura.on("click", ".table_remove", function (event) {
      $(this).closest("tr").remove();     
      CalcularTotalFactura();  
  });


  function AgregarFilaATablaFactura(data){
    var newRow = $("<tr>");

    formato = `<td><input type='number' onchange="CalcularTotalFactura()" step='0.1' class="form-control" required="required" style="border:0" value=`;

    formatoDecimal = `<td><input type='number' onchange="CalcularTotalFactura()" step='0.1' class="form-control" required="required" style="border:0" value=`;

    cols = '<td style="display:none">' + data.codigo +   '</td>';
      cols += "<td><label>" + data.nombre + '</label></td>';
      cols += formato + "0 ></td>";
      cols += "<td><label>" + data.unidad + '</label></td>';
      cols += formatoDecimal + data.precioVenta + '></td>';
      cols += "<td><label>" + data.IGV + '</label></td>';
      cols += "<td><label>0.0</label></td>";//venta total
      cols += "<td><label>0.0</label></td>";//igv total

      cols += `<td>
              <span><button type='button'
                  class='table_remove btn btn-danger btn-rounded btn-sm my-0'>Remover</button></span>
            </td>`; 

      newRow.append(cols);
      $('#tableFacturaVentaProductos').append(newRow);

  }

  function VentaAnadirProductoFactura(code){   
   $.ajax({  
    url:"../Model/VentaSelectEspecificProduct.php",  
    type:"POST",  
    data:{codigo:code},  
    dataType:"json",  
    success:function(data){  
      AgregarFilaATablaFactura(data);
      $('#VentaFacturaModalSeleccionarProducto').modal('hide');   
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert(textStatus, errorThrown);
    }  
   }); 
  }
  
</script>