<!-- INICIO CREAR EL MODAL-->

<div class='modal fade' id='VentaBoletaSeleccionarClienteModal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-xl modal-content'>

<div class="modal-header">
  <h5 class="modal-title">Seleccionar Cliente</h5>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class='container row col-xl-12 py-5'>

  <div class="container-fluid">

    <!-- DataTales Example -->

        <div class="table-responsive">
          <table class="table dataTable" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width='40%'>Nombre</th>
                <th width='27%'>Tipo de documento</th>
                <th width='27%'>N° de documento</th>
                <th >Seleccionar</th>
              </tr>
            </thead>
            <tbody id="tableBodyViewClients">     
              <!-- SE hace la consulta para imprimir cada producto del inventario-->  
              <?php
                //se incluye la tabla
                require_once("VentaBoletaModalSeleccionarClienteTable.php"); 
              ?>
            </tbody>
          </table>
        </div>

  </div>
  <!-- /.container-fluid -->

</div>


<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
