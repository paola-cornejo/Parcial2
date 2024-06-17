<?php
function ListarChofer($Conexion) {

    $Listado=array();

      //1) genero la consulta que deseo        
        $SQL = "SELECT * FROM usuarios WHERE IdNivel = 3 ORDER BY nombre ASC;";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs es el cto de resultados
        $rs = mysqli_query($Conexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {            
            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['CHOFER'] = $data['Apellido'] .', '.  $data['Nombre'] .' (DNI '.$data['DNI'] . ')';
            $i++;
        } 
        //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;
}
?>