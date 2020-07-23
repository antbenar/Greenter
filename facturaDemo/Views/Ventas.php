<!-- 
- header.php
- contenido.php(contenido de este php)
- footer.php
-->    
<?php 

require_once("header.php");

require_once("VentaBoletaNueva.php");
require_once("VentaFacturaNueva.php");

//se incluyen los modales para ser las funciones de los botones en la seccion acciones de la tabla

require_once("VentasModalView.php"); 
require_once("VentasModalDelete.php"); 

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
            <button class="btn btn-danger" type="button">
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
      <h1 class="h3 mb-0 text-gray-800">Ventas</h1>

      <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <div class="col-md-8"></div>
        <!-- Crear un nuevo modal para crear un nuevo producto -->
        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="iniciarFactura()" > <i class="fas fa-download fa-sm text-white-50"></i> Nueva Factura </button>

        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="iniciarBoleta()" > <i class="fas fa-download fa-sm text-white-50"></i> Nueva Boleta </button>

      </div>


      <!-- Content Row -->

      <div class="row">

        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Listado de las ventas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table dataTable" width="100%" cellspacing="0"  data-toggle="table">
                  <thead>
                    <tr>
                      <th >Fecha</th>
                      <th >Detalles</th>
                      <th >Tipo</th>
                      <th >Serie - Correlativo</th>
                      <!--th >Op. Gravadas</th>
                      <th >Op. Exoneradas</th>
                      <th >Monto IGV </th-->
                      <th >Total</th>
                      <th >Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="VentasTableBody">     
                  <!-- SE hace la consulta para imprimir cada producto del inventario-->  
                    <?php
                      //se incluye la tabla
                      require_once("VentasTable.php"); 
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
 
<?php require_once("footer.php"); ?>



<script>
  function iniciarBoleta(){ 
    $.ajax({
      type: "POST",
      url: '../Model/VentaSelectBoletaCorrelativo.php',
      //data:{tipoDoc:'3'},
      dataType:'JSON',
      success:function(data){  
        if(data.error) alert(data.error);
        else{
          $('#ventaBoletaSerie').val(data.serie);
          $('#ventaBoletaCorrelativo').val(data.correlativo);
          $('.VentaNuevoModalBoleta').modal('show');
        }
      }
    });
  }

  function iniciarFactura(){ 
    $.ajax({
      type: "POST",
      url: '../Model/VentaSelectFacturaCorrelativo.php',
      //data:{tipoDoc:'3'},
      dataType:'JSON',
      success:function(data){  
        if(data.error) alert(data.error);
        else{
          $('#ventaFacturaSerie').val(data.serie);
          $('#ventaFacturaCorrelativo').val(data.correlativo);
          $('.VentaNuevoModalFactura').modal('show');
        }
      }
    });
  }

</script>
