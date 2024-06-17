<?php 
function validacion_login_usuario($vUsuario, $vClave){

    $MensajeUsuario='';    

    $usuario = trim($vUsuario);
    
    if (empty($usuario)) {
        $MensajeUsuario.='Debes ingresar el usuario. <br />';
    }

    $clave = trim($vClave);
    
    if (empty($clave)) {
        $MensajeUsuario.='Debes ingresar la contraseña. <br />';
    }
    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Mensaje){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }

    return $MensajeUsuario;
}
?>