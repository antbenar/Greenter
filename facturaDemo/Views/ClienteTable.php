<?php
  require_once("../Model/ClienteSelect.php"); 

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
    <button type='button' class='btn-sm btn-primary' onClick='viewSellsClient(".$codigo.")'> <i class='far fa-eye'></i></button>

    <button type='button' onClick='editClient(".$codigo.")' class='btn-sm btn-success'> <i class='far fa-edit'></i></button>

    <button type='button' onClick='saveCode(".$codigo.")' class='btn-sm btn-danger' data-toggle='modal'> <i class='far fa-trash-alt'></i></button>
    </td>";

    $output .=  '</tr>';
  }
  echo $output;
?>

<script>
  function viewSellsClient(code){
    $.ajax({
       type: "POST",
       url: 'ClienteModalViewVentasContenidoTable.php',
       data:{codigo:code},
       success:function(data){  
         $('#tableViewVentasClientes').html(data);
         $('#ClienteModalViewVentas').modal('show');
       }
    });
  }

  function editClient(code){ 
     $.ajax({  
          url:"../Model/ClienteSearch.php",  
          method:"POST",  
          data:{codigo:code},  
          dataType:"json",  
          success:function(data){  
              $('#nombreCliente_edit').val(data.nombre);  
              $('#tipoDoc_edit').val(data.tipoDoc);  
              $('#numDoc_edit').val(data.numDoc);  
              $('#direccion_edit').val(data.direccion);  
              $('#email_edit').val(data.email);  
              $('#telefono_edit').val(data.telefono); 

              $("#code_hidden_client_edit").val(data.codigo); 

              $('#modalEditClient').modal('show');  
          }  
     });  
  }


  function saveCode(code){
    $('#code_hidden_client_edit').val(code); 
    $('.modalBorrarCliente').modal('show'); 
  }

</script>