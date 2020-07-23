<!-- INICIO CREAR EL MODAL-->

<div class="modal fade modalBorrarCliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">


    <div class="modal-header">
        Eliminar Cliente
    </div>
    <div class="modal-body">
        ¿Seguro que desea eliminar el cliente seleccionado?
    </div>
    <div class="modal-footer">
    	<input id="code_hidden_delete" name="code_hidden_delete" type="text" style="display:none">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" onClick="deleteProduct()" class="btn btn-danger" data-dismiss="modal" id="deleteClientButton">Eliminar</button>
    </div>
<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
</div>


<script>
	function deleteProduct(){
		var code = document.getElementById("code_hidden_client_edit").value;  

		$.ajax({
	       type: "POST",
	       url: '../Model/ClienteDelete.php',
	       data:{codigo:code},
	       success:function(data){  
	         alert(data);
	         location.reload();
	       }
	    });
	}
</script>
