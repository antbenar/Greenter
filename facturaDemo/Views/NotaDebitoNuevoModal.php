
<!-- INICIO CREAR EL MODAL-->

<div class="modal fade NotaDebitoNuevoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Nueva Nota de Debito</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<h7  class="px-4"><small>Tener cuidado al modificar los datos de la boleta/factura, ya que, se harán permanentes al momento de crear la nota de Debito.</small></h7>

	<div class="container">

	    <div class="col-xl-12 py-4">

	        <form id="nuevaNotaDebitoForm" method="post" onsubmit="crearNotaDebito()" role="form" autocomplete="off">

        	 	<div class="row">
		        	<h5 class="col-md-8">Datos de la Nota de Debito</h5>
				</div>
				<hr class="style13">

		    	<div class="row">
		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaDebitoSerie">Serie</label>
		                    <input readonly id="NotaDebitoSerie" type="text" name="NotaDebitoSerie" class="form-control-plaintext" placeholder="Serie" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>
		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaDebitoCorrelativo">N° Correlativo</label>
		                    <input readonly id="NotaDebitoCorrelativo" type="number" step="0.01" name="NotaDebitoCorrelativo" class="form-control-plaintext" placeholder="Correlativo" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>

		            <div class="col-md-4">
		                <div class="form-group">
		                    <label for="NotaDebitoTipo">Tipo de Nota de Debito *</label>
		                    <select id="NotaDebitoTipo" name="NotaDebitoTipo" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
		                    	<option></option>
		                        <option value="01" title="">Intereses por mora</option>
		                        <option value="02" title="">Aumento en el valor</option>
		                        <option value="03" title="">Penalidades/ otros conceptos</option>
		                    </select>
		                </div>
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-12">
		                <div class="form-group">
		                    <label for="NotaDebitoDescripcion">Descripcion/Motivo</label>
		                    <input id="NotaDebitoDescripcion" type="text" name="NotaDebitoDescripcion" class="form-control" placeholder="Descripcion/Motivo" required="required" data-error="Dato requerido.">
		                    
		                </div>
		            </div>
		        </div>   
		        <br>

			    <div class="controls">


			        <div class="row">
			        	<h5 class="col-md-9">Datos de la Boleta/Factura a modificar</h5>
			        	<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="NotaDebitoSeleccionarFactura()"> <i class="fas fa-fw fa-book fa-sm"></i> Seleccionar Factura/Boleta</button>
					</div>
					<hr class="style13">

					
			    	<div class="row">
			    		<div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaDebitoTipoDoc">Tipo Doc.</label>
			                    <input readonly id="NotaDebitoTipoDoc" type="text" name="NotaDebitoTipoDoc" class="form-control-plaintext" placeholder="Tipo Doc." required="required" data-error="Dato requerido.">
			                    
			                </div>
		            	</div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaDebitoSerieComprobante">Serie</label>
			                    <input readonly id="NotaDebitoSerieComprobante" name="NotaDebitoSerieComprobante" type="text" class="form-control-plaintext" placeholder="Serie" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaDebitoCorrelativoComprobante">N° Correlativo</label>
			                    <input readonly id="NotaDebitoCorrelativoComprobante" name="NotaDebitoCorrelativoComprobante" type="number" step="0.01" class="form-control-plaintext" placeholder="Correlativo" required="required" data-error="Dato requerido.">
			                    
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
			                    <label for="NotaDebitoNombreCliente">Nombre</label>
			                    <input readonly id="NotaDebitoNombreCliente" type="text" name="NotaDebitoNombreCliente" class="form-control-plaintext" placeholder="Nombre" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaDebitoTipoDocCliente">Tipo de documento *</label>
			                    <select readonly id="NotaDebitoTipoDocCliente" name="NotaDebitoTipoDocCliente" class="form-control-plaintext" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <option value="3">DNI</option>
			                        <option value="1">RUC</option>
			                    </select>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="NotaDebitoNumDocCliente">N° de documento</label>
			                    <input readonly id="NotaDebitoNumDocCliente" type="number" step="0.01" name="NotaDebitoNumDocCliente" class="form-control-plaintext" placeholder="N° de documento" required="required" data-error="Dato requerido.">
			                    
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
						      <table class="table table-editable" id="tableViewNotaDebito" width="100%" cellspacing="0">
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
						        <tbody id="NotaDebitoProductos">     
						          <!-- Se va llenando en la consulta de NotaDebitoSeleccionarFacturaModalTable.php--> 
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
			             	<p id="NotaDebitoOpGravadas" name="NotaDebitoOpGravadas" class="text-muted text-right">Op. Gravadas S/. 0.00</p>
							<p id="NotaDebitoOpExoneradas" name="NotaDebitoOpExoneradas" class="text-muted text-right">Op. Exoneradas S/. 0.00</p>
							<p id="NotaDebitoPrecioIGV" name="NotaDebitoPrecioIGV"  class="text-muted text-right">IGV S/. 0.00</p>
							<strong><h3 id="NotaDebitoTotal" name="NotaDebitoTotal"  class="text-muted text-right">Total S/. 0.00</h3></strong>
			            </div>

			        </div>
			        <br>


					<div class="row float-right pb-5 pr-4">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-success btn-send" value="Crear Nota de Debito">
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
	require_once("NotaDebitoSeleccionarFacturaModal.php");
?>


<script>
    function NotaDebitoSeleccionarFactura(){ 
        $.ajax({
			type: "POST",
			//url: 'NotaDebitoSeleccionarFacturaModalTable.php',
			success:function(data){  
				//$('#tableBodyViewNotaDebito').html(data);
				$('#NotaDebitoSeleccionarFacturaModal').modal('show');
			}
	    });
	}


	//--------------FUNCIONES CREAR VENTA
	function html2jsonNotaDebito(tablename) {
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
	

	function crearNotaDebito(){
		event.preventDefault();  
		
		operaciones = "&NotaDebitoOpGravadas=" + $("#NotaDebitoOpGravadas").text() + "&NotaDebitoOpExoneradas=" + $("#NotaDebitoOpExoneradas").text() + "&NotaDebitoPrecioIGV=" + $("#NotaDebitoPrecioIGV").text() +"&NotaDebitoTotal=" + $("#NotaDebitoTotal").text();

        $.ajax({  
             url:"../Model/NotaDebitoNueva.php",  
             method:"POST",               
             data:$('#nuevaNotaDebitoForm').serialize()+ "&table=" + html2jsonNotaDebito("tableViewNotaDebito") + operaciones,  
             success:function(data){  
             	if(data.substring(0, 5) == "No se")
             		alert(data);
             	else{
             		alert(data);
	                $('.NotaDebitoNuevoModal').modal('hide');  
	                location.reload();
	            }
             }  
        }); 
	}


  function NotaDebitoCalcularTotal(){
    //recorrer la tabla y sumar el total
    var i;
    var table = "#tableViewNotaDebito";
    
    var size = $('#tableViewNotaDebito tr').length;
    
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

    $('#NotaDebitoOpGravadas').html("Op. Gravadas S/. " + opGravadas.toFixed(2));
    $('#NotaDebitoOpExoneradas').html("Op. Exoneradas S/. " + opExoneradas.toFixed(2));
    $('#NotaDebitoPrecioIGV').html("IGV S/. " + sumaIGV.toFixed(2));
    $('#NotaDebitoTotal').html("Total S/. " + total.toFixed(2));
  }

</script>
