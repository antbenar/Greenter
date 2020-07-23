<div class='container row col-xl-12 py-3'>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-editable" id="tableVentaProductos" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="display:none"> codigo </th>
            <th width='30%'>Nombre</th>
            <th width='15%'>Cantidad</th>
            <th width='5%'>Unidad</th>
            <th width='15%'>Precio Venta / Unidad</th>
            <th width='10%'>IGV / Unidad</th>
            <th width='10%'>Precio Venta</th>
            <th width='10%'>IGV</th>
            <th >Acciones</th>
          </tr>
        </thead>
        <tbody>     
          <!-- Se va llenando en ventaaProductosFillTable.php--> 
          <?php
            //require_once("VentaProductosTableFill.php"); 
          ?>
        </tbody>
      </table>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>