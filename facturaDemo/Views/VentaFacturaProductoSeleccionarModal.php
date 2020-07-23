<!-- INICIO CREAR EL MODAL-->

<div class='modal fade' id='VentaFacturaModalSeleccionarProducto' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-xl modal-content'>

<div class="modal-header">
  <h5 class="modal-title">Seleccionar Producto</h5>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class='container row col-xl-12 py-3'>

  <div class="container-fluid">

    <!-- DataTales Example -->
        <div class="table-responsive">
          <table class="table dataTable" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width='40%'>Nombre</th>
                <th width='14%'>Cantidad</th>
                <th width='14%'>Unidad</th>
                <th width='14%'>Precio de venta</th>
                <th width='14%'>IGV</th>
                <th >Seleccionar</th>
              </tr>
            </thead>
            <tbody id="tableBodyViewSelectProdcutos">     
              <!-- SE hace la consulta para imprimir cada producto del inventario-->  
              <?php
                //se incluye la tabla
                require_once("VentaFacturaProductoSeleccionarModalTable.php"); 
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
