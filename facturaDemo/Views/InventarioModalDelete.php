<!-- INICIO CREAR EL MODAL-->

<div class="modal fade modalBorrarProducto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">


    <div class="modal-header">
        Eliminar Producto
    </div>
    <div class="modal-body">
        ¿Seguro que desea eliminar el producto seleccionado?
    </div>
    <div class="modal-footer">
    	<input id="code_hidden_delete" name="code_hidden_delete" type="text" style="display:none">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" onClick="deleteProduct()" class="btn btn-danger" data-dismiss="modal" id="deleteProductoButton">Eliminar</button>
    </div>
<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
</div>


<script>
	function deleteProduct(){
		var code = document.getElementById("code_hidden_delete").value;  

		$.ajax({
	       type: "POST",
	       url: '../Model/InventarioDelete.php',
	       data:{codigo:code},
	       success:function(data){  
	         alert(data);
	         location.reload();
	       }
	    });
	}
</script>
