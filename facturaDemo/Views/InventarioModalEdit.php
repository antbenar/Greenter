<!-- INICIO CREAR EL MODAL-->

<div class="modal fade" id="modalEditProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Modificar Producto</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>

	<div class="container">

	    <div class="col-xl-8 offset-xl-2 py-4">

	        <form id="Product_edit_form" method="post" role="form" onsubmit="editarProducto()" autocomplete="off">

			    <div class="controls">

			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="nombreProducto_edit">Nombre</label>
			                    <input id="nombreProducto_edit" type="text" name="nombreProducto_edit" class="form-control" placeholder="Nombre" required="required" data-error="Dato requerido.">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="costoUnidadProducto_edit">Costo de Unidad</label>
			                    <input id="costoUnidadProducto_edit" type="number" step="0.01" name="costoUnidadProducto_edit" class="form-control" placeholder="Costo de Unidad" required="required" data-error="Dato requerido."title="Costo con el que se compró cada unidad">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="precioVenta_edit">Precio de Venta</label>
			                    <input id="precioVenta_edit" onchangue='escribirTotal()' type="number" step="0.01" name="precioVenta_edit" class="form-control" placeholder="Precio de Venta *" required="required" data-error="Dato requerido.">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="unidadMedida_edit">Unidad de medida</label>
			                    <select id="unidadMedida_edit" name="unidadMedida_edit" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
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
			                    <label for="impuesto_edit">Impuesto</label>
			                    <select id="impuesto_edit" name="impuesto_edit" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                    	<option value="1.00">IGV - (18%)</option>
			                    	<!-- <option value="1.18">IGV ya incluido</option> -->
			                        <option value="0">Exonerado - (0%)</option>
			                    </select>
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>

			        </div>
				<hr class="style13"><br>
			        <div class="row">

						<div class="col-md-6">
			                <div class="form-group">
			                    <label for="operacion_edit">Operación</label>
			                    <select id="operacion_edit" name="operacion_edit" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                    	<option value=-1 title="No se modificará la cantidad de elementos.">Neutro</option>
			                    	<option value=2 title="Se aumentarán los elementos(Considerado en egreso mensual).">Aumentar</option>
			                        <option value=3 title="Se disminuirán los elementos(No es considerado en ingreso ni en egreso).">Disminuir</option>
			                    </select>
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>

			            <div class="col-md-6" id="cantidadBox" style="display:none">
			                <div class="form-group">
			                    <label for="cantidad_edit">Cantidad</label>
			                    <input id="cantidad_edit" type="number" step="0.01" name="cantidad_edit" class="form-control" value="0" required="required" data-error="Dato requerido." title="Cantidad a aumentar o disminuir">
			                    <div class="help-block with-errors"></div>
			                </div>
			            </div>
						<input id="code_hidden_edit" name="code_hidden_edit" type="text" style="display:none">
			        </div>

			        <div class="row ">

			        	<div class="col-md-6"><strong>
			                <h4 id="total_edit" class="text-muted">
			                    Total S/. 0.
							</h4>
			            </strong></div>

			        </div>

					<div class="row float-right">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-primary btn-send" id="submitButton_edit" value="Modificar Producto">
			            </div>
			        </div>

			        <div class="row">
			            <div class="col-md-12">
			                <h6><strong>Precaución </strong> - Tener en cuenta que al momento de actualizar el precio de compra o de venta del producto, este también afectará a todas las operaciones anteriormente realizadas.</h6>
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
	//-------------agregar o quitar cantidad

	$("#operacion_edit").change(function(){
    	if(document.getElementById("operacion_edit").value == -1){
			document.getElementById("cantidadBox").style.display = 'none';  
			cantidadBox.required = false;
		}
		else{
			document.getElementById("cantidadBox").style.display = 'block';  
			cantidadBox.required = true;
		}
    });

	//---------------FUNCIONES MODIFICAR PRECIO TOTAL.

	function cambiarTotal_edit(){
		var number = document.getElementById("precioVenta_edit").value;  

		if(document.getElementById("impuesto_edit").value == "1.00"){
			number = 1.18*number;
			$("#total_edit").text("Total S/. " + number.toFixed(2) + " ");
		}
		else if(document.getElementById("impuesto_edit").value == "1.18"){
			document.getElementById("precioVenta_edit").value = (number/1.18).toFixed(2)
			$("#total_edit").text("Total S/. " + number + " ");
		}
		else{
			$("#total_edit").text("Total S/. " + number + " ");
		}
	}

    $("#precioVenta_edit").change(function(){
    	cambiarTotal_edit();
    });

    $("#impuesto_edit").change(function(){
    	cambiarTotal_edit();
    });

	//---------------FUNCIONES LLAMAR ACTUALIZACION

    function editarProducto(){
		event.preventDefault();  
   
        $.ajax({  
             url:"../Model/InventarioUpdate.php",  
             method:"POST",  
             data:$('#Product_edit_form').serialize(),  
             dataType: 'json',
             success:function(data){  
             	alert(data.message);
                $('#Product_edit_form')[0].reset();  
                $('#modalEditProduct').modal('hide');  
                location.reload();
             }  
        }); 
	}

</script>
