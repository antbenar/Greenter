<?php
  require_once("../Model/InventarioSelect.php"); 

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
    <button type='button' class='btn-sm btn-primary' onClick='viewUpdate(".$codigo.")'> <i class='far fa-eye'></i></button>

    <button type='button' onClick='editProduct(".$codigo.")' class='btn-sm btn-success'> <i class='far fa-edit'></i></button>

    <button type='button' onClick='saveCode(".$codigo.")' class='btn-sm btn-danger' data-toggle='modal' data-target='.modalBorrarProducto'> <i class='far fa-trash-alt'></i></button>
    </td>";


    $output .=  '</tr>';
  }
  echo $output;
?>

<script>
  function viewUpdate(code){
    $.ajax({
       type: "POST",
       url: 'InventarioModalViewUpdateTable.php',
       data:{codigo:code},
       success:function(data){  
         $('#tableViewUpdates').html(data);
         $('#modalViewUpdates').modal('show');
       }
    });
  }

  function editProduct(code){ 
     $.ajax({  
          url:"../Model/InvetarioSearchProduct.php",  
          method:"POST",  
          data:{codigo:code},  
          dataType:"json",  
          success:function(data){  
               $('#nombreProducto_edit').val(data.nombre);  
               $('#costoUnidadProducto_edit').val(data.precioCompra);  
               $('#precioVenta_edit').val(data.precioVenta);  
               $('#unidadMedida_edit').val(data.unidad);  
               $('#impuesto_edit').val(data.precioVentaConIGV);  
               $('#code_hidden_edit').val(data.codigo); 
               
               $("#total_edit").text("Total S/. " + data.precioVenta + " ");

                var number = data.precioVenta;  
                document.getElementById("precioVenta_edit").value = (number/1.18).toFixed(2)

                $('#modalEditProduct').modal('show');  
          }  
     });  
  }


  function saveCode(code){
    $('#code_hidden_delete').val(code); 
  }

</script>