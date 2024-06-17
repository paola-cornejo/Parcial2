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