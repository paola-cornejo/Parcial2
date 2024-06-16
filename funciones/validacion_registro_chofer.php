<?php
function validacion_registro_chofer() {
    $Mensaje='';
    
    if (strlen($_POST['Apellido']) < 3) {
        $Mensaje.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['Nombre']) < 3) {
        $Mensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }    
    if ( strlen($_POST['DNI']) < 7 || strlen($_POST['DNI']) >10) {
        $Mensaje.='Debes ingresar un DNI válido. <br />';
    }

    

    if (strlen($_POST['Usuario']) > 0 || strlen($_POST['Clave']) > 0)
    {
        if (strlen($_POST['Usuario']) > 30) {
            $Mensaje.='Debes usuario un usuario con menos de 30 caracteres. <br />';
        }
        if (strlen($_POST['Clave']) <5 ) {
            $Mensaje.='Debes ingresar la clave de al menos 5 caracteres. <br />';    
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
