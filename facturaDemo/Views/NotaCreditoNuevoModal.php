
<!-- INICIO CREAR EL MODAL-->

<div class="modal fade NotaCreditoNuevoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Nueva Nota de Crédito</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<h7  class="px-4"><small>Tener cuidado al modificar los datos de la boleta/factura, ya que, se harán permanentes al momento de crear la nota de crédito.</small></h7>

	<div class="container">

	    <div class="col-xl-12 py-4">

	        <form id="nuevaNotaCreditoForm" method="post" onsubmit="crearNotaCredito()" role="form" autocomplete="off">

        	 	<div class="row">
		        	<h5 class="col-md-8">Datos de la Nota de Crédito</h5>
				</div>
				<hr class="style13">

		    	<div class="row">
		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaCreditoSerie">Serie</label>
		                    <input readonly id="NotaCreditoSerie" type="text" name="NotaCreditoSerie" class="form-control-plaintext" placeholder="Serie" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaCreditoCorrelativo">N° Correlativo</label>
		                    <input readonly id="NotaCreditoCorrelativo" type="number" step="0.01" name="NotaCreditoCorrelativo" class="form-control-plaintext" placeholder="Correlativo" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>

		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaCreditoTipo">Tipo de Nota de Crédito *</label>
		                    <select id="NotaCreditoTipo" name="NotaCreditoTipo" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
		                    	<option></option>
		                        <option value="01" title="Motivo a utilizarse cuando se produce una anulación total de la venta de bienes o la anulación total  de los servicios no ejecutados. La anulación de la venta o servicios no ejecutados está condicionada a la correspondiente devolución de los bienes y de la retribución efectuada, cuando corresponda.">Anulación de la operación</option>
		                        <option value="02" title="Anulación del comprobante de pago electrónico cuando este ha sido emitido a un sujeto distinto del adquirente o usuario.">Anulación por error en el RUC</option>
		                        <option value="03" title="Emisión de nota de crédito para corregir un comprobante de pago electrónico que contenga una descripción que no corresponde al bien vendido o cedido en uso o al tipo de servicio prestado.">Corrección por error en la descripción</option>
		                        <option value="06" title="Cuando la emisión de la nota de crédito sea para documentar la devolución de los bienes facturados.">Devolución total</option>
		                        <option value="07" title="Cuando la emisión de la nota de crédito sea para documentar la devolución de parte de los bienes facturados, inclusive una devolución de una parte de la cantidad de los bienes consignados en una línea.">Devolución por ítem</option>
		                        <option value="09" title="Motivo a ser utilizado para ajustar el valor inicialmente facturado por otras circunstancias, que de acuerdo a la Ley del IGV y su Reglamento resulte posible ser deducido de las operaciones facturadas y no corresponda a ninguno de los motivos anteriores.">Disminución en el valor</option>
		                    </select>
		                </div>
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-12">
		                <div class="form-group">
		                    <label for="NotaCreditoDescripcion">Descripcion/Motivo</label>
		                    <input id="NotaCreditoDescripcion" type="text" name="NotaCreditoDescripcion" class="form-control" placeholder="Descripcion/Motivo" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>
		        </div>   
		        <br>

			    <div class="controls">


			        <div class="row">
			        	<h5 class="col-md-9">Datos de la Boleta/Factura a modificar</h5>
			        	<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="NotaCreditoSeleccionarFactura()"> <i class="fas fa-fw fa-book fa-sm"></i> Seleccionar Factura/Boleta</button>
					</div>
					<hr class="style13">

					
			    	<div class="row">
			    		<div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoTipoDoc">Tipo Doc.</label>
			                    <input readonly id="NotaCreditoTipoDoc" type="text" name="NotaCreditoTipoDoc" class="form-control-plaintext" placeholder="Tipo Doc." required="required" data-error="Dato requerido.">
			                    
			                </div>
		            	</div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoSerieComprobante">Serie</label>
			                    <input readonly id="NotaCreditoSerieComprobante" name="NotaCreditoSerieComprobante" type="text" class="form-control-plaintext" placeholder="Serie" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoCorrelativoComprobante">N° Correlativo</label>
			                    <input readonly id="NotaCreditoCorrelativoComprobante" name="NotaCreditoCorrelativoComprobante" type="number" step="0.01" class="form-control-plaintext" placeholder="Correlativo" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>
			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Datos del Cliente</h5>
					</div>
					<hr class="style13">
					
			    	<div class="row">
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoNombreCliente">Nombre</label>
			                    <input readonly id="NotaCreditoNombreCliente" type="text" name="NotaCreditoNombreCliente" class="form-control-plaintext" placeholder="Nombre" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoTipoDocCliente">Tipo de documento *</label>
			                    <select readonly id="NotaCreditoTipoDocCliente" name="NotaCreditoTipoDocCliente" class="form-control-plaintext" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <option value="3">DNI</option>
			                        <option value="1">RUC</option>
			                    </select>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaCreditoNumDocCliente">N° de documento</label>
			                    <input readonly id="NotaCreditoNumDocCliente" type="number" step="0.01" name="NotaCreditoNumDocCliente" class="form-control-plaintext" placeholder="N° de documento" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>

			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Productos</h5>
						<h7  class="px-4"><small>Solo en "Devolución por item" se puede modificar la cantidad.</small></h7>
			    		<h7  class="px-4"><small>Solo en "Disminución por valor" se puede modificar el precio de venta.</small></h7>
					</div>

			        <div class="row">
			        	<!-- AQUI VA LA TABLA DE VentaProductoSeleccionarModaltosTable.php-->
			        	<div class='container row col-xl-12 py-3'>

						  <div class="container-fluid">
						    <div class="table-responsive">
						      <table class="table table-editable" id="tableViewNotaCredito" width="100%" cellspacing="0">
						        <thead>
						          <tr>
						            <th style="display:none"> codigo </th>
						            <th width='30%'>Nombre</th>
						            <th width='15%'>Cantidad</th>
						            <th width='5%'>Unidad</th>
						            <th width='15%'>Precio Venta / Unidad</th>
						            <th width='10%'>IGV / Unidad</th>
						            <th width='10%'>Total / Item</th>
						          </tr>
						        </thead>
						        <tbody id="NotaCreditoProductos">     
						          <!-- Se va llenando en la consulta de NotaCreditoSeleccionarFacturaModalTable.php--> 
						        </tbody>
						      </table>
						    </div>

						  </div>
						  <!-- /.container-fluid -->

						</div>
					</div>


				<hr class="style13">

			        <div class="row">
			        	<div class="col-md-12 pr-5">
			             	<p id="NotaCreditoOpGravadas" name="NotaCreditoOpGravadas" class="text-muted text-right">Op. Gravadas S/. 0.00</p>
							<p id="NotaCreditoOpExoneradas" name="NotaCreditoOpExoneradas" class="text-muted text-right">Op. Exoneradas S/. 0.00</p>
							<p id="NotaCreditoPrecioIGV" name="NotaCreditoPrecioIGV"  class="text-muted text-right">IGV S/. 0.00</p>
							<strong><h3 id="NotaCreditoTotal" name="NotaCreditoTotal"  class="text-muted text-right">Total S/. 0.00</h3></strong>
			            </div>

			        </div>
			        <br>


					<div class="row float-right pb-5 pr-4">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-success btn-send" value="Crear Nota de Crédito">
			            </div>
			        </div>

			        <div class="row">
			            <div class="col-md-12">
			                <h6>Todos los campos son requeridos.</h6>
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

<?php
	require_once("NotaCreditoSeleccionarFacturaModal.php");
?>


<script>
    function NotaCreditoSeleccionarFactura(){ 
        $.ajax({
			type: "POST",
			//url: 'NotaCreditoSeleccionarFacturaModalTable.php',
			success:function(data){  
				//$('#tableBodyViewNotaCredito').html(data);
				$('#NotaCreditoSeleccionarFacturaModal').modal('show');
			}
	    });
	}


	//--------------FUNCIONES CREAR VENTA
	function html2jsonNotaCredito(tablename) {
	   var json = '{';
	   var otArr = [];
	   var tbl2 = $("#" + tablename + " tr").each(function(i) {        
	      x = $(this).children();
	      var itArr = [];
	      x.each(function() {
	      	if($(this).text() != "")
	        	itArr.push('"' + $(this).text() + '"');
	        else 
	        	itArr.push('"' + $(this).find("input[type='number']").val() + '"');
	      });
	      otArr.push('"' + i + '": [' + itArr.join(',') + ']');
	   })
	   json += otArr.join(",") + '}'

	   return json;
	}
	

	function crearNotaCredito(){
		event.preventDefault();  
		
		operaciones = "&NotaCreditoOpGravadas=" + $("#NotaCreditoOpGravadas").text() + "&NotaCreditoOpExoneradas=" + $("#NotaCreditoOpExoneradas").text() + "&NotaCreditoPrecioIGV=" + $("#NotaCreditoPrecioIGV").text() +"&NotaCreditoTotal=" + $("#NotaCreditoTotal").text();

        $.ajax({  
             url:"../Model/NotaCreditoNueva.php",  
             method:"POST",               
             data:$('#nuevaNotaCreditoForm').serialize()+ "&table=" + html2jsonNotaCredito("tableViewNotaCredito") + operaciones,  
             success:function(data){  
             	if(data.substring(0, 5) == "No se")
             		alert(data);
             	else{
             		alert(data);
	                $('.NotaCreditoNuevoModal').modal('hide');  
	                location.reload();
	            }
             }  
        }); 
	}


  function NotaCreditoCalcularTotal(){
    //recorrer la tabla y sumar el total
    var i;
    var table = "#tableViewNotaCredito";
    
    var size = $('#tableViewNotaCredito tr').length;
    
    var opGravadas = 0;
    var opExoneradas = 0;
    var sumaIGV = 0;

    for (i = 1; i < size; i++) {
      var cantidad = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(3) input[type='number']").val());
      var precio = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(5) input[type='number']").val());
      var precioIGV = parseFloat($(table + " tr:nth-child("+i+") td:nth-child(6)").text());

      var nuevoPrecio = Math.round((cantidad*precio)*100)/100;
      //en caso de que sea op. gravada, se cambia los datos
      if(precioIGV != 0){
        opGravadas += cantidad*precio;
        sumaIGV += cantidad*precioIGV;
        nuevoPrecio += cantidad*precioIGV;
      }
      else{
        opExoneradas += cantidad*precio;
      }
      
      //cambiar la columna de precioVenta
      
      $(table + " tr:nth-child("+i+") td:nth-child(7)").text(nuevoPrecio.toFixed(2));
    }

    var total = Math.round((opGravadas  + opExoneradas + sumaIGV)*100)/100;
    var opGravadas = Math.round(opGravadas*100)/100;
    var opExoneradas = Math.round(opExoneradas*100)/100;
    var sumaIGV = Math.round(sumaIGV*100)/100;

    $('#NotaCreditoOpGravadas').html("Op. Gravadas S/. " + opGravadas.toFixed(2));
    $('#NotaCreditoOpExoneradas').html("Op. Exoneradas S/. " + opExoneradas.toFixed(2));
    $('#NotaCreditoPrecioIGV').html("IGV S/. " + sumaIGV.toFixed(2));
    $('#NotaCreditoTotal').html("Total S/. " + total.toFixed(2));
  }

</script>
