
<?php 
session_start();
//print_r($_SESSION);
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/listarMarcas.php';
require_once 'funciones/InsertarTransporte.php';
require_once 'funciones/validacion_registro_transporte.php';

$ListaMarcas = listarMarcas($MiConexion);
$cantidadMarcas= count($ListaMarcas);


$Mensaje='';
$Estilo='warning';
if (!empty($_POST['BotonRegistrar'])) {
  //estoy en condiciones de poder validar los datos
  $Mensaje=validacion_registro_transporte();  

  if (empty($Mensaje)) {   
      if (InsertarTransporte($MiConexion) != false) {
        $Mensaje = 'Se ha registrado correctamente.';
        $_POST = array(); 
        $Estilo = 'success'; 
       }         
      }
}

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
          <li>
            <a href="camion_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo transporte</span>
            </a>
          </li>
          <li>
            <a href="chofer_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo chofer</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-globe2"></i><span>Viajes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="viaje_carga.php" class="active">
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo</span>
            </a>
          </li>
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
      <h1>Registrar un nuevo transporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Transportes</li>
          <li class="breadcrumb-item active">Carga Camión</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Ingresa los datos</h5>
                  <?php if (!empty($Mensaje)) { ?>
                    <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                      <?php echo $Mensaje; ?>
                    </div>
                  <?php } ?>

                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    Los campos indicados con (*) son requeridos
                  </div> 

                  <form class="row g-3" method="post">
                    <div class="col-12">
                        <label for="selector" class="form-label">Marca (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector" name="Marca">
                          <option selected="">Selecciona una opción</option>  

                          <?php                       

                          $selected='';
                          for($i=0; $i<$cantidadMarcas; $i++ ) {
                              if(!empty ($_POST['Marca']) && $_POST['Marca'] == $ListaMarcas[$i]['ID']){
                                  $selected = 'selected';
                              }else{
                                $selected = '';
                              } ?>
                              <option value="<?php echo $ListaMarcas[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                <?php echo $ListaMarcas[$i]['NOMBRE']; ?>
                              </option>
                          <?php }  ?>                         
                        </select>

                    </div>
                    <div class="col-12">
                        <label for="modelo" class="form-label">Modelo (*)</label>                 
                        <input type="text" class="form-control" id="modelo" name="Modelo" value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['Modelo']) ? $_POST['Modelo'] : ''; ?>"> 
                    </div>

                    <div class="col-12">                              
                        <label for="año" class="form-label">Año</label>                        
                        <input type="text" class="form-control" id="año" name="Anio" maxlength="4" value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['Anio']) ? $_POST['Anio'] : ''; ?>">
                    </div>
                    
                    <div class="col-12">
                        <label for="patente" class="form-label">Patente (*)</label>
                        <input type="text" class="form-control" id="patente" name="Patente" maxlength="7" value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['Patente']) ? $_POST['Patente'] : ''; ?>">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Disponibilidad</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="Disponible" value="1"
                            <?php echo (isset($_POST['Disponible']) && $_POST['Disponible'] == '1') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="gridCheck1"> Habilitado</label>
                        </div>
                    </div>

                    

                    <div class="text-center">                        
                        <button type="submit" class="btn btn-primary" value="Registrar" 
                        name="BotonRegistrar" >Registrar</button>

                        <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                        <a href="index.php" class="text-primary fw-bold">Volver al index</a>
                    </div>
                  </form><!-- Vertical Form -->

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