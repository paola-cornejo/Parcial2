<?php
function validacion_registro_transporte() {
    $Mensaje='';
    
    //if (  ($_POST['Marca']) == "Selecciona una opción" ) {

    if ( !ctype_digit($_POST['Marca'])) {
        $Mensaje.='Debes seleccionar una marca. <br />';
    }
    
    if (strlen($_POST['Modelo']) < 3) {
        $Mensaje.='Debes ingresar el modelo con al menos 3 caracteres. <br />';
    }

    if (!(strlen($_POST['Anio']) == 4 && ctype_digit($_POST['Anio']))) {
        $Mensaje.='Debes ingresar un correo con al menos 5 caracteres. <br />';
    }
    
    if (!((strlen($_POST['Patente']) == 6 || strlen($_POST['Patente']) == 7) && ctype_alnum($_POST['Patente']))) {
        $Mensaje.='La patente debe tener una longitud de 6 o 7 caracteres y contener solo caracteres alfanumericos.';
    }

    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    
    //echo " mensaje: " .$Mensaje;

    return $Mensaje;

}

?>