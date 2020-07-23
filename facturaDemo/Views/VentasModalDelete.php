<!-- INICIO CREAR EL MODAL-->

<div class="modal fade modalBorrarVenta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">


    <div class="modal-header">
        Eliminar Venta
    </div>
    <div class="modal-body">
        ¿Seguro que desea eliminar la venta seleccionada?
    </div>
    <div class="modal-footer">
    	<input id="codeVentaDelete" name="codeVentaDelete" type="text" style="display:none">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" onClick="deleteVenta()" class="btn btn-danger" data-dismiss="modal" id="deleteClientButton">Eliminar</button>
    </div>
<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
</div>


<script>
	function deleteVenta(){
		var code = document.getElementById("codeVentaDelete").value;  

		$.ajax({
	       type: "POST",
	       url: '../Model/VentaDelete.php',
	       data:{codigo:code},
	       success:function(data){  
	         alert(data);
	         location.reload();
	       }
	    });
	}
</script>
