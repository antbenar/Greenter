<!-- INICIO CREAR EL MODAL-->

<div class='modal fade' id='modalViewVentas' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-xl modal-content'>

<div class="modal-header">
  <div class="col-md-6"><h5 class="modal-title" id="titleVentasView"></h5></div>
  <div class="col-md-4"><h5 class="modal-title text-right" id="fechaVentasView"></h5></div>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<div class='container row col-xl-12 py-4'>

	<div class='container-fluid'>

    <!-- DATOS CLIENTE -->
      <div class="row">
        <div class="col-md-4 pl-5"><strong><p class="text-muted">Nombre del cliente/empresa:</p></strong></div>
        <div class="col-md-4 pl-5"><strong><p class="text-muted">Tipo Documento:</p></strong></div>
        <div class="col-md-4 pl-5"><strong><p class="text-muted">N° Documento:</p></strong></div>
      </div>

      <div class="row">
        <div class="col-md-4 pl-5"><p id="VentasViewClienteNombre" class="text-muted"></p></div>
        <div class="col-md-4 pl-5"><p id="VentasViewClienteTipoDoc" class="text-muted"></p></div>
        <div class="col-md-4 pl-5"><p id="VentasViewClienteNumDoc" class="text-muted"></p></div>
      </div>

    <hr class="style13"> <br>

      <!-- DataTales Example -->

      <div class="col-md-6"><h5 class="modal-title">Productos Vendidos</h5></div><br>

      <div class='table-responsive'>
        <table class='table' id='dataTable' width='100%' cellspacing='0'>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Precio Venta / Unidad</th>
              <th>IGV / Unidad </th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id='tableBodyViewUpdates'>
         <!-- 
              HERE GOES CODE FROM VENTASVIEWTABLE.PHP
              SENT BY INVENTARIOTABLE 
          -->
          </tbody>
        </table>
      </div>


      <hr class="style13"><br>
    <!-- DATOS TOTAL -->
      <div class="row">
        <div class="col-md-12 pr-5">
          <p id="VentasViewOpGravadas" class="text-muted text-right">Op. Gravadas S/. 0.00</p>
          <p id="VentasViewOpExoneradas" class="text-muted text-right">Op. Exoneradas S/. 0.00</p>
          <p id="VentasViewPrecioIGV" class="text-muted text-right">IGV S/. 0.00</p>
          <strong><h4 id="VentasViewTotal" class="text-muted text-right">Total S/. 0.00</h4></strong>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->

</div>


<!-- FIN DE CREAR EL MODAL-->

</div>
</div>
