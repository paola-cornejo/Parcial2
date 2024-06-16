<?php

function validacion_registro_viaje() {
    $Mensaje='';
        
    //if (  ($_POST['Marca']) == "Selecciona una opción" ) {

    
    if (!ctype_digit($_SESSION['Usuario_Id'])) {
        $Mensaje.='No se encontro la sesion del usuario. <br />';
    }
    

    if (!ctype_digit($_POST['Chofer'])) {
        $Mensaje.='Debes seleccionar el Chofer. <br />';
    }
    
    if (!ctype_digit($_POST['Transporte'])) {
        $Mensaje.='Debes seleccionar un Transporte. <br />';
    }
    
    if (!strtotime($_POST['FechaPautada'])) {
        $Mensaje.='Debes seleccionar una Fecha. <br />';
    }
    
    if (!ctype_digit($_POST['Destino'])) {
        $Mensaje.='Debes seleccionar un Destino. <br />';
    }    
     
    if ( !is_numeric($_POST['Costo'])) {
        $Mensaje.='Debes ingresar el Costo. <br />';
    }
        
    if (!is_numeric($_POST['PorcentajeChofer'])) {
        $Mensaje.='Debes ingresar el Porcentaje. <br />';
    }

        
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }   
    return $Mensaje;
}

?>

