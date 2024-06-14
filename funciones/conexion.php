<?php 
//parametros por defecto, cuando llame con parentesis vacios
function ConexionBD($Host = 'localhost', $User = 'root', $Password = '', $BaseDeDatos = 'parcial2_panel'){
    //intento de conexion 
    $linkConexion = mysqli_connect($Host, $User, $Password, $BaseDeDatos);
    if($linkConexion != false)
        return $linkConexion;          
    else
        die ('No se pudo estarblecer la conexión');       
}
?> 
