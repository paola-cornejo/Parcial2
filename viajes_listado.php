<?php 
session_start();
// //print_r($_SESSION);
require_once 'funciones/conexion.php';

$MiConexion = ConexionBD();

require_once 'funciones/Listar_Viajes.php';
require_once 'funciones/ObtenerEstilo.php';
require_once 'funciones/habilitar_chofer_carga.php';
require_once 'funciones/habilitar_viajes_carga.php';
require_once 'funciones/habilitar_transporte_carga.php';

$ListadoViajes = Listar_Viajes($MiConexion);
$CantidadViajes = count($ListadoViajes);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>2do Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!--<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
--> 
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
 
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/bellota.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Sue Palacios</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6><?php   echo $_SESSION['Usuario_Nombre'] . ' ' .$_SESSION['Usuario_Apellido'] ;   ?></h6>              
            <span><?php   echo $_SESSION['NOMBRE_NIVEL']  ;  ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Configuraciones</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Panel</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-truck"></i><span>Transporte</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        
        
        <?php if (habilitar_transporte_carga()){ ?>    
        <li>
            <a href="camion_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo transporte</span>
            </a>
          </li>
          <?php } ?>    

          <?php if (habilitar_chofer_carga()){ ?>
          <li>
            <a href="chofer_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo chofer</span>
            </a>
          </li>
          <?php } ?>
       

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-globe2"></i><span>Viajes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <?php if (habilitar_viajes_carga()){ ?>  
        <li>
            <a href="viaje_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo</span>
            </a>
          </li>
          <?php } ?>
          <li>
            <a href="viajes_listado.php" class="active">
            <i class="bi bi-layout-text-window-reverse"></i><span>Listado de viajes</span>
            </a>
          </li>
        </ul>
      </li>

    

    
    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lista de viajes registrados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Listado</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Viajes cargados</h5>


              <!-- Nivel Admin
                Ve el listado completo, todas sus columnas

                Nivel Operadores
                Del listado podrá ver todas las columnas, menos la de “Monto Chofer”

                Nivel Choferes
                Del listado podrá ver todas las columnas, menos la de “Costo viaje”. 
                “Monto Chofer” no debe ver el porcentaje (10%, 15%, etc), solo verá el monto en pesos. -->

              <!-- Default Table -->
              <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha Viaje</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Camión</th>
                            <th scope="col">Chofer</th>
                            <!-- admin -->
                            <?php if ($_SESSION['Usuario_Nivel'] == 1 ) {
                                    ?>                                   
                                    <th>Costo Viaje</th>                     
                                    <th>Monto Chofer</th>                                                
                                <?php } ?>
                                <!-- operador -->
                            <?php if ($_SESSION['Usuario_Nivel'] == 2 ) {
                                    ?> 
                                    <th>Costo Viaje</th>
                                <?php } ?>
                                <!-- chofer -->
                            <?php if ($_SESSION['Usuario_Nivel'] == 3 ) {
                                    ?> 
                                    <th>Monto Chofer</th>
                                <?php } ?>

                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i<$CantidadViajes; $i++) {
                          ?>
                           <tr class="table-<?php echo ObtenerEstilo($ListadoViajes[$i]['fechaviaje']) ?>"
                            data-bs-toggle="tooltip" 
                            data-bs-placement="left" 
                            data-bs-original-title="Viaje realizado">

                                <th scope="row"><?php echo $i+1?></th>                               
                                <td><?php echo $ListadoViajes[$i]['fechaviajeMostrar']; ?></td>
                                <td><?php echo $ListadoViajes[$i]['destino']; ?></td>
                                <td><?php echo $ListadoViajes[$i]['camion']; ?></td>
                                <td><?php echo $ListadoViajes[$i]['chofer']; ?></td>
                            
                                <?php if ($_SESSION['Usuario_Nivel'] == 1 ) { ?>
                                    <td>$ <?php echo $ListadoViajes[$i]['costoviaje']; ?></td>
                                    <td>$ <?php echo $ListadoViajes[$i]['montochoferConporcentaje']; ?></td>
                                <?php } ?>

                                <?php if ($_SESSION['Usuario_Nivel'] == 2 ) { ?>
                                    <td>$ <?php echo $ListadoViajes[$i]['costoviaje']; ?></td>                                                
                                <?php } ?>

                                <?php if ($_SESSION['Usuario_Nivel'] == 3 ) { ?>
                                    <td>$ <?php echo $ListadoViajes[$i]['montochoferSinporcentaje']; ?></td>                                                
                                <?php } ?>
                            </tr>  
                        <?php } ?>
                    </tbody>
                </table>

              
            </div>
          </div>
        </div>

 

        
      </div>
    </section>

  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
  
  <!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>