<?php 
session_start();
//print_r($_SESSION);
require_once 'funciones/conexion.php';
require_once 'funciones/DatosLogin.php';
require_once 'funciones/validacion_login_usuario.php';

$MiConexion = ConexionBD();


$Mensaje='';

 if (!empty($_POST['BotonLogin'])) 
 {    
  

    $MensajeUsuario = validacion_login_usuario($_POST['usuario'], $_POST['password']);

    if (empty($MensajeUsuario))
    {
      //fue todo bien
      $UsuarioLogueado = DatosLogin($_POST['usuario'], $_POST['password'], $MiConexion);
      //la consulta con la BD para que encuentre un usuario registrado con el usuario y clave brindados
      if ( !empty($UsuarioLogueado)) 
      {
  
         //generar los valores del usuario (esto va a venir de mi BD)
          // $_SESSION['Usuario_Nombre']     =   $UsuarioLogueado['NOMBRE'];
          // $_SESSION['Usuario_Apellido']   =   $UsuarioLogueado['APELLIDO'];
          $_SESSION['Usuario_Nivel']      =   $UsuarioLogueado['IDNIVEL'];
          // $_SESSION['Usuario_Img']        =   $UsuarioLogueado['IMAGEN'];    
          // $_SESSION['Usuario_Id']         =   $UsuarioLogueado['ID'];
  
          if ($UsuarioLogueado['ACTIVO']==0) {
              $Mensaje ='Ud. no se encuentra activo en el sistema.';
          }else {
              header('Location: index.php');
             
              exit;
          }
  
      }
      else
      {
          //no encuentra el usuario en la BD
          $Mensaje = 'No se encontró el usuario y/o contraseña, ingresa nuevamente.';
      }
    }
    else
    {
      //falta el usuario y/o contraseña
      $Mensaje = $MensajeUsuario;
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
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Panel de Administración</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ingresa tu cuenta</h5>
                    <p class="text-center small">Ingresa tu datos de usuario y clave</p>
                  </div>

                 <!-- <form class="row g-3 needs-validation" novalidate method="post"> -->
                 <form class="row g-3 " method="post">
                 <?php if(!empty($Mensaje)){ ?>
                        <div class="alert alert-warning alert-dismissable">
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php } ?>
                           
                  <div class="col-12">                      
                    <!-- seccion usuario  -->           
                        <label>Usuario</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input class="form-control" id="yourUsername" type="text" name="usuario" value="<?php 
                                //tiene algun valor el Usuario ? lo muestra//sino, no muestra nada
                                echo !empty($_POST['usuario']) ? $_POST['usuario'] : ''; ?>">                                 
                                <div class="invalid-feedback">Ingresa tu usuario.</div>
                            </div>                                            
                    </div>        
                   
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Clave</label>
                      <input class="form-control" id="yourPassword" type="password" name="password" />
                      <div class="invalid-feedback">Ingresa tu clave</div>
                    </div>

                
                    <div class="col-12">                                 
                      <button class="btn btn-primary w-100" type="submit" name="BotonLogin" value="Login">Login</button>
                    </div>
                 </form>
                                    
                </div>
              </div>      
                          
              <div class="credits">
                 Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
       Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>   
 
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>