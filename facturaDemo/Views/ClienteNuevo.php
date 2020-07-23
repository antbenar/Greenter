<!-- INICIO CREAR EL MODAL-->

<div class="modal fade clientModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">


	<div class="container">

		<div class="row">

		    <div class="col-xl-8 offset-xl-2 py-5">

		        <p class="lead">Nuevo Cliente</p>

		        <form id="nuevoClienteForm" method="post" onsubmit="crearCliente()" role="form" autocomplete="off">

				    <div class="controls">

				        <div class="row">
				            <div class="col-md-12">
				                <div class="form-group">
				                    <label for="nombre">Nombre *</label>
				                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre *" required="required" data-error="Dato requerido.">
				                </div>
				            </div>
				        </div>
				        <div class="row">
				            <div class="col-md-6">
				                <div class="form-group">
				                    <label for="tipoDoc">Tipo de documento *</label>
				                    <select id="tipoDoc" name="tipoDoc" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
				                        <option value="3">DNI</option>
				                        <option value="1">RUC</option>
				                    </select>
				                </div>
				            </div>

				            <div class="col-md-6">
				                <div class="form-group">
				                    <label for="numDoc">N° de documento *</label>
				                    <input id="numDoc" type="number" name="numDoc" class="form-control" placeholder="N° de documento *" required="required" tytle="Introduzca un número de documento válido" data-error="Dato requerido.">
				                </div>
				            </div>
						</div>

				        <div class="row">

				            <div class="col-md-12">
				                <div class="form-group">
				                    <label for="direccion">Dirección</label>
				                    <input id="direccion" type="text" name="direccion" class="form-control" placeholder="Dirección" data-error="Dato requerido.">
				                </div>
				            </div>

				        </div>

				        <div class="row ">

				        	<div class="col-md-6">
				                <div class="form-group">
				                    <label for="email">Correo Electrónico</label>
				                    <input id="email" type="email" name="email" class="form-control" placeholder="Correo Electrónico" tytle="Introduzca un correo electrónico válido." data-error="Introduzca un correo electrónico válido.">
				                </div>
				            </div>

				            <div class="col-md-6">
				                <div class="form-group">
				                    <label for="telefono">Teléfono/Celular</label>
				                    <input id="telefono" type="number" name="telefono" class="form-control" placeholder="N° de documento *" tytle="Introduzca un número de documento válido">
				                </div>
				            </div>

				        </div>


						<div class="row float-right">
				            <div class="col-md-12">
				                <input type="submit" class="btn btn-success btn-send" value="Crear nuevo cliente">
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

	</div>


<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
</div>


<script>
	function crearCliente(){
		event.preventDefault();  
   
        $.ajax({  
             url:"../Model/ClienteNuevo.php",  
             method:"POST",  
             data:$('#nuevoClienteForm').serialize(),  
             dataType: 'json',
             success:function(data){  
             	alert(data.message);
                $('#nuevoClienteForm')[0].reset();  
                $('#clientModal').modal('hide');  
                location.reload();
             }  
        }); 
	}

</script>
