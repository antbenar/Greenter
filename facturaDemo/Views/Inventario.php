<!-- 
- header.php
- contenido.php(contenido de este php)
- footer.php
-->    
<?php 

require_once("header.php");

require_once("InventarioNuevo.php");

//se incluyen los modales para ser las funciones de los botones en la seccion acciones de la tabla
require_once("InventarioModalViewUpdates.php"); 
require_once("InventarioModalEdit.php"); 
require_once("InventarioModalDelete.php"); 

?>

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>


    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inventario</h1>

        <!-- Crear un nuevo modal para crear un nuevo producto -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".InventarioNuevoModal"> <i class="fas fa-download fa-sm text-white-50"></i> Nuevo Producto </button>

      </div>


      <!-- Content Row -->

      <div class="row">

        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado del inventario</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table dataTable" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="20%">Nombre</th>
                      <th>Stock</th>
                      <th>Unidad</th>
                      <th>Precio de venta</th>
                      <th>Precio de compra</th>
                      <th width="20%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="inventarioTableBody">     
                  <!-- SE hace la consulta para imprimir cada producto del inventario-->  
                    <?php
                      //se incluye la tabla
                      require_once("InventarioTable.php"); 
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>

    </div>
    <!-- /.container-fluid --> 
        
  </div>
  <!-- End of Main Content -->

</script>

<?php require_once("footer.php"); ?>