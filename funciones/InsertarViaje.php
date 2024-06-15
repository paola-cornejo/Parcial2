<?php
function InsertarViaje($conexion) {   
            
    echo " | Chofer ".$_POST['Chofer']; 
    echo " | Transporte ".$_POST['Transporte']; 
    echo " | FechaPautada ".$_POST['FechaPautada']; 
    echo " | Destino '".$_POST['Destino']."'"; 
    echo " | Costo ".$_POST['Costo']; 
    echo " | PorcentajeChofer ".$_POST['PorcentajeChofer']; 
    echo " | Usuario_Id ".$_SESSION['Usuario_Id'];

    $SQL_Insert="INSERT INTO viajes (
    IdUsuarioChofer, 
    IdTransporte, 
    FechaPautada, 
    IdDestino, 
    FechaCreacion,
     IdUsuarioOperador, 
     Costo, 
     PorcentajeChofer)
    VALUES (
    ".$_POST['Chofer']." , 
    ".$_POST['Transporte'].",
    '".$_POST['FechaPautada']."' , 
    ".$_POST['Destino']." , NOW(), 
    ".$_SESSION['Usuario_Id'].",".
    $_POST['Costo'].",".
    $_POST['PorcentajeChofer'].")";


    echo " | SQL_Insert ". $SQL_Insert;
    
    if (!mysqli_query($conexion, $SQL_Insert)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }
    return true;
    }
    ?>