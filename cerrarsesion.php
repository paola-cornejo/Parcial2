<?php 
//Este archivo se va a encargar de limpiar todos los datos cuando cerramos sesion.
session_start();
$_SESSION=array();
session_destroy();

//Una vez limpiado los datos que me mande al login.
header('Location: login.php');
exit;

?>