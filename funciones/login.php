<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();

    // //agrego la función de MD5 para que se encripte y compare con lo de la tabla
    // $SQL="SELECT U.Id, U.Nombre, U.Apellido, U.IdNivel, U.Imagen, U.Activo, N.Denominacion NombreNivel
    //  FROM usuarios U, niveles_usuarios N
    //  WHERE U.Usuario ='$vUsuario' AND Clave = MD5('$vClave') 
    //  AND U.IdNivel = N.IdNivel ";

$SQL="SELECT U.Id, U.Nombre, U.Apellido, U.IdNivel, U.Imagen, U.Activo, N.Denominacion NombreNivel, U.DNI, U.Usuario, U.Clave
     FROM usuarios U, niveles_usuarios N
     WHERE U.Usuario ='$vUsuario' AND Clave = '$vClave'
     AND U.IdNivel = N.IdNivel ";


    echo "Paso1";

    $rs = mysqli_query($vConexion, $SQL);
        
    echo "Paso2";

    $data = mysqli_fetch_array($rs) ;

    echo "Paso3";

    if (!empty($data)) {

        echo "Paso4";

        $Usuario['ID'] = $data['Id'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
        $Usuario['DNI'] = $data['DNI'];
        $Usuario['USUARIO'] = $data['Usuario'];
        $Usuario['CLAVE'] = $data['Clave'];
        $Usuario['ACTIVO'] = $data['Activo'];
        $Usuario['IDNIVEL'] = $data['IdNivel'];
        $Usuario['IMAGEN'] = $data['Imagen'];
        
        // switch ($data['Sexo']) {
        //     case 'F':
        //         $Usuario['SALUDO'] = 'Bienvenida';
        //         break;
        //     case 'M':
        //         $Usuario['SALUDO'] = 'Bienvenido';
        //         break;
        //     case 'O':
        //         $Usuario['SALUDO'] = 'Hola ';
        //         break;
        // }
        

        // if (empty( $data['Imagen'])) {
        //     $data['Imagen'] = 'user.png'; 
        // }
        // $Usuario['IMG'] = $data['Imagen'];
        // $Usuario['ACTIVO'] = $data['Activo'];
        //agregados        
        // $Usuario['NOMBRE_NIVEL'] = $data['NombreNivel'];
        echo "Paso5";
    }

    echo "Paso final";
    return $Usuario;
}

?>