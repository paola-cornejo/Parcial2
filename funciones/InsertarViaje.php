<?php
function InsertarViaje($conexion) {    
        
    $SQL_Insert="INSERT INTO Usuarios (IdViajes, IdUsuarioChofer, IdTransporte, FechaPautada, IdDestino, FechaCreacion, IdUsuarioOperador)
    VALUES ('".$_POST['IdViajes']."' , '".$_POST['IdUsuarioChofer']."' , '".$_POST['IdTransporte']."', '".$_POST['FechaPautada']."' , ".$_POST['IdDestino']." , NOW(), '".$_POST['IdUsuarioOperador']."')";
    
    if (!mysqli_query($conexion, $SQL_Insert)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
    }
    ?>