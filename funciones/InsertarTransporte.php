<?php
function InsertarTransporte($conexion) {
    // Verificar si se enviaron todos los datos esperados   

    if (empty($_POST['Disponible'])) {
        // La variable es exactamente nula
        $_POST['Disponible'] = 0; 
    }

    if (!isset($_POST['Marca'], $_POST['Modelo'], $_POST['Anio'], $_POST['Patente'], $_POST['Disponible'])) {
        die('<h4>Error: No se han enviado todos los datos necesarios.</h4>');
    }

    // Capturar los datos del formulario
    $idMarca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $anioVehiculo = $_POST['Anio'];
    $patente = $_POST['Patente'];
    $disponible = $_POST['Disponible'];

    // Construir la consulta SQL con los datos
    $sql = "INSERT INTO transportes (IdMarca, Modelo, AnioVehiculo, Patente, FechaCarga, Disponible) VALUES ('$idMarca', '$modelo', '$anioVehiculo', '$patente', NOW(), '$disponible')";

    // Ejecutar la consulta utilizando mysqli_query
    if (mysqli_query($conexion, $sql)) {
        return true; // Si la inserción fue exitosa, retornar true
    } else {
        die('<h4>Error al intentar insertar el registro transporte.</h4>'); // Si hay un error, mostrar mensaje de error y terminar el script
    }
    return true;
}
?>
