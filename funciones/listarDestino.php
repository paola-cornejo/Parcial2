<?php
function listarDestino($vConexion) {

    $Listado=array();

      //1) genero la consulta que deseo        
        $SQL = "SELECT *
        FROM destinos         
        ORDER BY Denominacion ASC;";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs es el cto de resultados
        $rs = mysqli_query($vConexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['IdDestino'];
            $Listado[$i]['Destino'] = $data['Denominacion'];
            $i++;
        }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}
?>