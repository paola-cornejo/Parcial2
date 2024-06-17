<?php
session_start();
// //print_r($_SESSION);
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
//require_once 'funciones/InsertarViaje.php';
require_once 'funciones/validacion_registro_viaje.php';
require_once 'funciones/listarChofer.php';
require_once 'funciones/listarTransporte.php';
require_once 'funciones/listarDestino.php';
require_once 'funciones/InsertarViaje.php';


$ListarChofer = ListarChofer($MiConexion);
$cantidadChofer = count($ListarChofer);

$ListarTransporte = listarTransporte($MiConexion);
$cantidadTransporte = count($ListarTransporte);


$ListarDestino = listarDestino($MiConexion);
$cantidadDestino = count($ListarDestino);

$Mensaje='';
$Estilo='warning';
$EstiloIcono='bi-exclamation-triangle';

if (!empty($_POST['BotonRegistrar'])) {  
  //estoy en condiciones de poder validar los datos
  $Mensaje=validacion_registro_viaje();   
  if (empty($Mensaje)) {  
      if (InsertarViaje($MiConexion) != false) {   
        $Mensaje = 'Se ha registrado correctamente.';
        $_POST = array(); 
        $Estilo = 'success'; 
        $EstiloIcono='bi-check-circle';
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
<?php 
  require_once 'headerParcial2.inc.php';
  ?>
  <!-- ======= Header ======= -->


 <!-- ======= Aside ======= -->
  <?php 
  require_once 'asideParcial2.inc.php';
  ?>
  <!-- ======= Aside ======= -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar un nuevo viaje</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Viajes</li>
          <li class="breadcrumb-item active">Carga</li>
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
                    <i class="bi <?php echo $EstiloIcono ?> me-1"></i>                            
                     <?php if ( $Estilo != 'success') echo 'Atención verifique los siguientes campos: </br>' ?>
                      <?php echo $Mensaje; ?>                      
                    </div>
                  <?php } ?>

                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    Los campos indicados con (*) son requeridos
                </div>

    
<!--
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Mensajes de Alerta por validaciones
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Los datos se guardaron correctamente! 
                </div>
-->
                <form class="row g-3" method="post">
                    <div class="col-12">
                        <label for="selector" class="form-label">Chofer (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector" name="Chofer">
                          <option selected="">Selecciona una opción</option>  
                          <?php                 
                          $selected='';
                          for($i=0; $i<$cantidadChofer; $i++ ) {
                              if(!empty ($_POST['Chofer']) && $_POST['Chofer'] == $ListarChofer[$i]['ID']){
                                  $selected = 'selected';
                              }else{
                                $selected = '';
                              } ?>
                              <option value="<?php echo $ListarChofer[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                <?php echo $ListarChofer[$i]['CHOFER']; ?>
                              </option>
                          <?php }  ?>                         
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <label for="selector" class="form-label">Transporte (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector" name="Transporte">
                          <option selected="">Selecciona una opción</option>  
                          <?php                      
                          $selected='';
                          for($i=0; $i<$cantidadTransporte; $i++ ) {
                              if(!empty ($_POST['Transporte']) && $_POST['Transporte'] == $ListarTransporte[$i]['ID']){
                                  $selected = 'selected';
                                }else{
                                $selected = '';
                                } ?>
                                <option value="<?php echo $ListarTransporte[$i]['ID']; ?>" <?php echo $selected; ?>  >
                                  <?php echo $ListarTransporte[$i]['Modelo']; ?>
                                </option>
                          <?php }  ?>                         
                        </select>
                    </div>
                    
                    <div class="col-12">
                        <label for="fecha" class="form-label">Fecha programada (*)</label>
                        <input type="date" class="form-control" id="fecha" name = "FechaPautada" 
                        value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['FechaPautada']) ? $_POST['FechaPautada'] : ''; ?>">
                    </div>

                    <div class="col-12">
                        <label for="selector" class="form-label">Destino (*)</label>
                        <select class="form-select" aria-label="Selector" id="selector" name="Destino">
                          <option selected="">Selecciona una opción</option>  
                          <?php                 
                          $selected='';
                          for($i=0; $i<$cantidadDestino; $i++ ) {
                              if(!empty ($_POST['Destino']) && $_POST['Destino'] == $ListarDestino[$i]['ID']){
                                  $selected = 'selected';
                              }else{
                                $selected = '';
                              } ?>
                              <option value="<?php echo $ListarDestino[$i]['ID']; ?>" <?php echo $selected;?>>
                                <?php echo $ListarDestino[$i]['Destino']; ?>
                              </option>
                          <?php }  ?>                         
                        </select>
                    </div>


                    <div class="col-12">
                        <label for="costo" class="form-label">Costo (*)</label>
                        <input maxlength="8" type="text" class="form-control" id="costo" name="Costo" value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['Costo']) ? $_POST['Costo'] : ''; ?>"> 
                    </div>
                    <div class="col-12">
                        <label for="porc" class="form-label">Porcentaje chofer (*)</label>
                        <input maxlength="3" type="text" class="form-control" id="porc" name = "PorcentajeChofer" value="<?php 
                          //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                          echo !empty($_POST['PorcentajeChofer']) ? $_POST['PorcentajeChofer'] : '';?>"> 
                    </div>                    

                    <div class="text-center">
                    <button type="submit" class="btn btn-primary" value="Registrar" name="BotonRegistrar" >Registrar</button>
                    <button type="reset" class="btn btn-secondary"><?php echo 'Limpiar Campos'; ?></button>
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
   <?php 
  require_once 'footerParcial2.inc.php';
  ?>
  <!-- ======= Footer ======= -->

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