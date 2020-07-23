<!-- INICIO CREAR EL MODAL-->

<div class='modal fade' id='NotaCreditoSeleccionarFacturaModal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-xl modal-content'>

<div class="modal-header">
  <h5 class="modal-title">Seleccionar Boleta/Factura</h5>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class='container row col-xl-12 py-5'>

  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Boletas/Facturas</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table dataTable"  width="100%" cellspacing="0">
            <thead>
              <tr>
                <th >Fecha</th>
                <th >Detalle</th>
                <th >Tipo</th>
                <th >Serie - Correlativo</th>
                <th >Total</th>
                <th >Acciones</th>
              </tr>
            </thead>
            <tbody id="tableBodyViewNotaCredito">     
              <!-- SE hace la consulta para imprimir cada producto del inventario-->  
              <?php
                //se incluye la tabla
                require_once("NotaCreditoSeleccionarFacturaModalTable.php"); 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>


<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
