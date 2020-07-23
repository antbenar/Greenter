<!-- INICIO CREAR EL MODAL-->

<div class="modal fade InventarioNuevoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Nuevo Producto</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>

	<div class="container">

	    <div class="col-xl-8 offset-xl-2 py-4">

	        <!--form id="nuevoProductoForm" method="post" action="../Model/NuevoInventario.php" role="form" autocomplete="off"-->
	        <form id="nuevoProductoForm" method="post" onsubmit="crearProducto()" role="form" autocomplete="off">

			    <div class="controls">

			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="nombre">Nombre *</label>
			                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre *" required="required" data-error="Dato requerido.">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="costoUnidad">Costo de Unidad *</label>
			                    <input id="costoUnidad" type="number" step="0.01" name="costoUnidad" class="form-control" placeholder="Costo de Unidad *" required="required" data-error="Dato requerido." title="Costo con el que se compró cada unidad">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="precioVenta">Precio de Venta(inc. IGV) *</label>
			                    <input id="precioVenta" onchangue='escribirTotal()' type="number" step="0.01" name="precioVenta" class="form-control" placeholder="Precio de Venta *" required="required" data-error="Dato requerido.">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="unidadMedida">Unidad de medida *</label>
			                    <select id="unidadMedida" name="unidadMedida" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <option value="u">Unidad</option>
			                        <option value="Kg">Kilogramo(Kg)</option>
			                        <option value="g">Gramo(g)</option>
			                        <option value="l">Litro(l)</option>
			                        <option value="ml">Mililitro(ml)</option>
			                        <option value="Gal">Galon(Gal)</option>
			                    </select>
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
					</div>

			        <div class="row">

						<div class="col-md-6">
			                <div class="form-group">
			                    <label for="impuesto">Impuesto *</label>
			                    <select id="impuesto" name="impuesto" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                    	<option value="1.00">IGV - (18%)</option>
			                    	<!-- <option value="1.18">IGV ya incluido</option> -->
			                        <option value="0">Exonerado - (0%)</option>
			                    </select>
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>

			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="cantidadInicial">Cantidad Inicial *</label>
			                    <input id="cantidadInicial" type="number" step="0.01" name="cantidadInicial" class="form-control" placeholder="Cantidad Inicial *" required="required" data-error="Dato requerido.">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>

			        </div>

			        <div class="row ">

			        	<div class="col-md-6">
			        		<p id="precioSinIGV" class="text-muted">
			                    Subtotal S/. 0
							</p>
							<p id="precioIGV" class="text-muted">
			                    IGV      S/. 0
							</p>
							<strong><h4 id="total" class="text-muted">
			                    Total    S/. 0
							</h4></strong>
			        	</div>

			        </div>


					<div class="row float-right">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-primary btn-send" value="Crear nuevo Producto">
			            </div>
			        </div>

			        <div class="row">
			            <div class="col-md-12">
			                <h6>Campos con <strong>*</strong> son requeridos.</h6>
			            </div>
			        </div>
			    </div>

			</form>

	    </div>

	</div>


<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
</div>


<script>
	function cambiarTotal(){
		var number = document.getElementById("precioVenta").value;  

		if(document.getElementById("impuesto").value == "1.00"){	
			$("#precioSinIGV").text("Subtotal S/. " + (number/1.18).toFixed(2) + " ");
			$("#precioIGV").text("IGV S/. " + (number-number/1.18).toFixed(2) 	 + " ");
			$("#total").text("Total S/. " + parseFloat(number).toFixed(2) + " ");
		}
		else{
			$("#precioSinIGV").text("Subtotal S/. " +  parseFloat(number).toFixed(2) + " ");
			$("#precioIGV").text("IGV S/. 0.00");
			$("#total").text("Total S/. " +  parseFloat(number).toFixed(2) + " ");
		}
	}

    $("#precioVenta").change(function(){
    	cambiarTotal();
    });

    $("#impuesto").change(function(){
    	cambiarTotal();
    });


    function crearProducto(){
		event.preventDefault();  
   
        $.ajax({  
             url:"../Model/InventarioNuevo.php",  
             method:"POST",  
             data:$('#nuevoProductoForm').serialize(),  
             dataType: 'json',
             success:function(data){  
             	alert(data.message);
                $('#nuevoProductoForm')[0].reset();  
                $('#InventarioNuevoModal').modal('hide');  
                location.reload();
             }  
        }); 
	}
</script>
