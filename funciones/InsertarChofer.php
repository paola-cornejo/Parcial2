<?php
function InsertarChofer($conexion) {
   
    // Verificar si se enviaron todos los datos esperados
    if (!isset($_POST['Apellido'], $_POST['Nombre'], $_POST['DNI'], $_POST['Usuario'], $_POST['Clave'])) {
        die('<h4>Error: No se han enviado todos los datos necesarios.</h4>');
    }

    // Capturar los datos del formulario
    $Apellido = $_POST['Apellido'];
    $Nombre = $_POST['Nombre'];
    $DNI = $_POST['DNI'];
    $Usuario = $_POST['Usuario'];    
    $Clave = $_POST['Clave'];

    // Construir la consulta SQL con los datos
    $sql = "INSERT INTO usuarios (Apellido, Nombre, DNI, Usuario, Clave, Activo, IdNivel, FechaCreacion, Imagen) 
    VALUES ('$Apellido', '$Nombre ', '$DNI', '$Usuario', '$Clave', 1, 3, NOW(), null)";

    // Ejecutar la consulta utilizando mysqli_query
    if (mysqli_query($conexion, $sql)) {
        return true; // Si la inserción fue exitosa, retornar true
    } else {
        die('<h4>Error al intentar insertar el registro transporte.</h4> ' . $sql); // Si hay un error, mostrar mensaje de error y terminar el script
    }
    return true;
}
?>
