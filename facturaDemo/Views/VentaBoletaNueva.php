
<!-- INICIO CREAR EL MODAL-->

<div class="modal fade VentaNuevoModalBoleta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Nueva Venta(Boleta)</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>

	<div class="container">

	    <div class="col-xl-12 py-4">

	        <form id="nuevaVentaForm" method="post" onsubmit="crearVentaBoleta()" role="form" autocomplete="off">

			    <div class="controls">
			        <div class="row">
			        	<h5 class="col-md-8">Datos de la Boleta</h5>
					</div>
					<hr class="style13">

			    	<div class="row">
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="ventaBoletaSerie">Serie</label>
			                    <input id="ventaBoletaSerie" type="text" name="ventaBoletaSerie" class="form-control" placeholder="Serie" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="ventaBoletaCorrelativo">N° Correlativo</label>
			                    <input id="ventaBoletaCorrelativo" type="number" step="0.01" name="ventaBoletaCorrelativo" class="form-control" placeholder="Correlativo" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>
			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Datos del Cliente</h5>
						<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="seleccionarClienteBoleta()"> <i class="fas fa-address-book fa-sm text-white-40"></i> Seleccionar Cliente </button>
					</div>
					<h7><small>Solo se podrán ingresar clientes con DNI. Si no selecciona un cliente, este se creará automaticamente con los datos ingresados.</small></h7>
					<hr class="style13">
					
			    	<div class="row">
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="nombreCliente_venta">Nombre</label>
			                    <input id="nombreCliente_venta" type="text" name="nombreCliente_venta" class="form-control" placeholder="Nombre" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="tipoDoc_venta">Tipo de documento *</label>
			                    <select id="tipoDoc_venta" name="tipoDoc_venta" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <option value="3">DNI</option>
			                        <!--option value="1">RUC</option-->
			                    </select>
			                </div>
			            </div>

			            <div class="col-md-4">
			                <div class="form-group">
			                    <label for="numDoc_venta">N° de documento</label>
			                    <input id="numDoc_venta" type="number" step="0.01" name="numDoc_venta" class="form-control" placeholder="N° de documento" required="required" data-error="Dato requerido.">
			                    
			                </div>
			            </div>
			        </div>

			        <br>
			        <div class="row">
			        	<h5 class="col-md-9">Productos</h5>
						<button type="button" class="btn btn-primary col-md-3" data-toggle="modal" onclick="seleccionarProductoBoleta()"> <i class="fas fa-fw fa-book fa-sm"></i> Añadir Producto </button>
					</div>
					<hr class="style13">

			        <div class="row">
			        	<!-- AQUI VA LA TABLA DE VentaProductoSeleccionarModaltosTable.php-->
			        	<?php
			        		require_once("VentaBoletaProductosTable.php");
			        	?>
			        	
					</div>


				<br><hr class="style13">
			    

			        <div class="row">
			        	<div class="col-md-12 pr-5">
			             	<p id="VentaBoletaOpGravadas" class="text-muted text-right">Op. Gravadas S/. 0.00</p>
							<p id="VentaBoletaOpExoneradas" class="text-muted text-right">Op. Exoneradas S/. 0.00</p>
							<p id="VentaBoletaprecioIGV" class="text-muted text-right">IGV S/. 0.00</p>
							<strong><h3 id="VentaBoletaTotal" class="text-muted text-right">Total S/. 0.00</h3></strong>
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
	require_once("VentaBoletaModalSeleccionarCliente.php");
	require_once("VentaBoletaProductoSeleccionarModal.php");
?>


<script>
    function seleccionarClienteBoleta(){ 
        $.ajax({
			type: "POST",
			url: 'VentaBoletaModalSeleccionarClienteTable.php',
			success:function(data){  
				$('#VentaBoletaSeleccionarClienteModal').modal('show');
			}
	    });
	}

	function seleccionarProductoBoleta(){ 
        $.ajax({
			type: "POST",
			url: 'VentaBoletaProductoSeleccionarModalTable.php',
			success:function(data){  
				$('#VentaBoletaModalSeleccionarProducto').modal('show');
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
	

	function crearVentaBoleta(){
		event.preventDefault();  
		operaciones = "&opGravadas=" + $("#VentaBoletaOpGravadas").text() + "&opExoneradas=" + $("#VentaBoletaOpExoneradas").text() + "&montoIGV=" + $("#VentaBoletaprecioIGV").text() +"&total=" + $("#VentaBoletaTotal").text();
        $.ajax({  
             url:"../Model/VentaNuevaBoleta.php",  
             method:"POST",               
             data:$('#nuevaVentaForm').serialize()+ "&table=" + html2json("tableVentaProductos") + operaciones,  
             success:function(data){  
             	if(data.substring(0, 5) == "No se")
             		alert(data);
             	else{
             		alert(data);
	                $('.VentaNuevoModalBoleta').modal('hide');  
	                location.reload();
	            }
             }  
        }); 
	}

</script>
