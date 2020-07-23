
<!-- INICIO CREAR EL MODAL-->

<div class="modal fade VentaNuevoModalFactura" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Nueva Venta(Factura)</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>

	<div class="container">

	    <div class="col-xl-12 py-4">

	        <form id="nuevaVentaFacturaForm" method="post" onsubmit="crearVentaFactura()" role="form" autocomplete="off">

			    <div class="controls">
			        <div class="row">
			        	<h5 class="col-md-8">Datos de la Factura</h5>
					</div>
					<hr class="style13">

			    	<div class="row">
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="ventaFacturaSerie">Serie</label>
			                    <input id="ventaFacturaSerie" type="text" name="ventaFacturaSerie" class="form-control" placeholder="Serie" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="ventaFacturaCorrelativo">N° Correlativo</label>
			                    <input id="ventaFacturaCorrelativo" type="number" step="0.01" name="ventaFacturaCorrelativo" class="form-control" placeholder="Correlativo" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>
			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Datos del Cliente</h5>
						<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="seleccionarClienteFactura()"> <i class="fas fa-address-book fa-sm text-white-40"></i> Seleccionar Cliente </button>
					</div>
					<h7><small>Solo se podrán ingresar clientes con RUC. Si no selecciona un cliente, este se creará automaticamente con los datos ingresados.</small></h7>
					<hr class="style13">
					
			    	<div class="row">
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="nombreCliente_Facturaventa">Nombre</label>
			                    <input id="nombreCliente_Facturaventa" type="text" name="nombreCliente_Facturaventa" class="form-control" placeholder="Nombre" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="tipoDoc_Facturaventa">Tipo de documento *</label>
			                    <select id="tipoDoc_Facturaventa" name="tipoDoc_Facturaventa" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <!--option value="3">DNI</option-->
			                        <option value="1">RUC</option>
			                    </select>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="numDoc_Facturaventa">N° de documento</label>
			                    <input id="numDoc_Facturaventa" type="number" step="0.01" name="numDoc_Facturaventa" class="form-control" placeholder="N° de documento" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>

			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Productos</h5>
						<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="seleccionarProductoFactura()"> <i class="fas fa-fw fa-book fa-sm"></i> Añadir Producto </button>
					</div>
					<hr class="style13">

			        <div class="row">
			        	<!-- AQUI VA LA TABLA DE VentaProductoSeleccionarModaltosTable.php-->
			        	<?php
			        		require_once("VentaFacturaProductosTable.php");
			        	?>
			        	
					</div>


				<br><hr class="style13">
			    

			        <div class="row">
			        	<div class="col-md-12 pr-5">
			             	<p id="VentaFacturaOpGravadas" class="text-muted text-right">Op. Gravadas S/. 0.00</p>
							<p id="VentaFacturaOpExoneradas" class="text-muted text-right">Op. Exoneradas S/. 0.00</p>
							<p id="VentaFacturaprecioIGV" class="text-muted text-right">IGV S/. 0.00</p>
							<strong><h3 id="VentaFacturaTotal" class="text-muted text-right">Total S/. 0.00</h3></strong>
			            </div>

			        </div>
			        <br>


					<div class="row float-right pb-5 pr-4">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-success btn-send" value="Vender">
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
	require_once("VentaFacturaModalSeleccionarCliente.php");
	require_once("VentaFacturaProductoSeleccionarModal.php");
?>


<script>
    function seleccionarClienteFactura(){ 
        $.ajax({
			type: "POST",
			url: 'VentaFacturaModalSeleccionarClienteTable.php',
			success:function(data){  
				$('#VentaSeleccionarFacturaClienteModal').modal('show');
			}
	    });
	}

	function seleccionarProductoFactura(){ 
        $.ajax({
			type: "POST",
			url: 'VentaFacturaProductoSeleccionarModalTable.php',
			success:function(data){  
				$('#VentaFacturaModalSeleccionarProducto').modal('show');
			}
	    });
	}


	//--------------FUNCIONES CREAR VENTA
	function html2json(tablename) {
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
	

	function crearVentaFactura(){
		event.preventDefault();  
		operaciones = "&opGravadas=" + $("#VentaFacturaOpGravadas").text() + "&opExoneradas=" + $("#VentaFacturaOpExoneradas").text() + "&montoIGV=" + $("#VentaFacturaprecioIGV").text() +"&total=" + $("#VentaFacturaTotal").text();

        $.ajax({  
             url:"../Model/VentaNuevaFactura.php",  
             method:"POST",               
             data:$('#nuevaVentaFacturaForm').serialize()+ "&table=" + html2json("tableFacturaVentaProductos") + operaciones,  
             success:function(data){  
             	if(data.substring(0, 5) == "No se")
             		alert(data);
             	else{
             		alert(data);
	                $('.VentaNuevoModalFactura').modal('hide');  
	                location.reload();
	            }
             }  
        }); 
	}

</script>
