<?php 
error_reporting(E_ALL);
session_start(); 

?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rest Aurant</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href=" ../index.php">
        <!-- ICONO -->
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-lemon"></i>
        </div>
        
        <div class="sidebar-brand-text mx-3">Rest Aurant</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Opciones Primarias:
      </div>

      <li class="nav-item">
        <a class="nav-link" href="Ventas.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Ventas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Resumen.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Resumen Diario</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Gastos</span></a>
      </li>


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="NotaCredito.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Notas de Crédito</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="NotaDebito.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Notas de Débito</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Otros:
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="cliente.php">
          <i class="fas fa-fw fa-address-book"></i>
          <span>Clientes</span></a>
      </li>

            <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="Inventario.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Inventario</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReportes" aria-expanded="true" aria-controls="collapseReportes">
          <i class="fas fa-fw fa-flag"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReportes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Ingresos y Egresos</a>
            <a class="collapse-item" href="cards.html">Ventas por Item</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        

