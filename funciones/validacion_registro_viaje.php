<?php

function validacion_registro_viaje() {
    $Mensaje='';
    
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
     
    //reemplazo la coma por el punto porque el costo es tipo decimal y se usa el punto
    $_POST['Costo'] = str_replace(',', '.', $_POST['Costo']);
    if (strlen($_POST['Costo']) > 8 || !is_numeric($_POST['Costo'])) {
        $Mensaje.='Debes ingresar el costo de 8 dígitos como maximo. <br />';
    }
        
    if (!is_numeric($_POST['PorcentajeChofer'])  ) {
        $Mensaje.='Debes ingresar el Porcentaje numérico del 0 al 100. <br />';
    }
    else
    {
        if ($_POST['PorcentajeChofer'] > 100 ) {
            $Mensaje.='El Porcentaje debe ser menor o igual a 100. <br />';
        }
    }

        
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }   
    return $Mensaje;
}

?>

