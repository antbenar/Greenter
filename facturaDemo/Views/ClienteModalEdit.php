<!-- INICIO CREAR EL MODAL-->

<div class="modal fade" id="modalEditClient" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<div class="modal-header">
	  <h5 class="modal-title">Modificar Cliente</h5>
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>


	<div class="container">

	    <div class="col-xl-8 offset-xl-2 py-4">

	        <p class="lead">Modificar Cliente</p>

	        <form id="ClientEditForm" method="post" role="form" onsubmit="editarCliente()" autocomplete="off">

			    <div class="controls">

			        <div class="row">
			            <div class="col-md-12">
			                <div class="form-group">
			                    <label for="nombreCliente_edit">Nombre *</label>
			                    <input id="nombreCliente_edit" type="text" name="nombreCliente_edit" class="form-control" placeholder="Nombre *" required="required" data-error="Dato requerido.">
			                </div>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="tipoDoc_edit">Tipo de Identificación *</label>
			                    <select id="tipoDoc_edit" name="tipoDoc_edit" class="form-control" required="required" data-error="Dato requerido, seleccione una opción.">
			                        <option value="3">DNI</option>
			                        <option value="1">RUC</option>
			                    </select>
			                </div>
			            </div>

			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="numDoc_edit">N° de documento *</label>
			                    <input id="numDoc_edit" type="number" name="numDoc_edit" class="form-control" placeholder="N° de documento *" required="required" tytle="Introduzca un número de documento válido" data-error="Dato requerido.">
			                </div>
			            </div>
					</div>

			        <div class="row">

			            <div class="col-md-12">
			                <div class="form-group">
			                    <label for="direccion_edit">Dirección</label>
			                    <input id="direccion_edit" type="text" name="direccion_edit" class="form-control" placeholder="Dirección" data-error="Dato requerido.">
			                </div>
			            </div>

			        </div>

			        <div class="row ">

			        	<div class="col-md-6">
			                <div class="form-group">
			                    <label for="email_edit">Correo Electrónico</label>
			                    <input id="email_edit" type="email" name="email_edit" class="form-control" placeholder="Correo Electrónico" tytle="Introduzca un correo electrónico válido." data-error="Introduzca un correo electrónico válido.">
			                </div>
			            </div>

			            <div class="col-md-6">
			                <div class="form-group">
			                    <label for="telefono_edit">Teléfono/Celular</label>
			                    <input id="telefono_edit" type="number" name="telefono_edit" class="form-control" placeholder="N° de documento *" tytle="Introduzca un número de documento válido">
			                </div>
			            </div>
			            <input id="code_hidden_client_edit" name="code_hidden_client_edit" type="text" style="display:none">
			        </div>


					<div class="row float-right">
			            <div class="col-md-12">
			                <input type="submit" class="btn btn-success btn-send" id="ClientSubmitButton_edit" value="Modificar Cliente">
			            </div>
			        </div>

			        <div class="row">
			            <div class="col-md-12">
			                <h6>Campos con <strong>*</strong> son obligatorios.</h6>
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
	//---------------FUNCIONES LLAMAR ACTUALIZACION

    function editarCliente(){
		event.preventDefault();  
   
        $.ajax({  
             url:"../Model/ClienteUpdate.php",  
             method:"POST",  
             data:$('#ClientEditForm').serialize(),  
             dataType: 'json',
             success:function(data){  
             	alert(data.message);
                $('#ClientEditForm')[0].reset();  
                $('#modalEditClient').modal('hide');  
                location.reload();
             }  
        }); 
	}

</script>
