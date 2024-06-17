<?php
function validacion_registro_transporte() {
    $MensajeError='';

    if ( !ctype_digit($_POST['Marca'])) {
        $MensajeError.='Debes seleccionar una marca. <br />';
    }
    
    if (ctype_alnum($_POST['Modelo']) > 3) {
        $MensajeError.='Debes ingresar el modelo con al menos 3 caracteres. <br />';
    }

    if (!(strlen($_POST['Anio']) == 4 && ctype_digit($_POST['Anio']))) {
        $MensajeError.='Debes ingresar el año de 4 dígitos. <br />';
    }
    
    if (!((strlen($_POST['Patente']) == 6 || strlen($_POST['Patente']) == 7) && ctype_alnum($_POST['Patente']))) {
        $MensajeError.='Debes ingresar la patente de 6 o 7 caracteres y contener solo caracteres alfanumericos.';
    }

    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }   

    return $MensajeError;
}
?>