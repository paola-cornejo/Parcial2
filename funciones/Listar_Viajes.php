<?php
function Listar_Viajes($vConexion) {

    $Listado=array();

      //1) genero la consulta que deseo
        // $SQL = "SELECT IdMarca as Id, Denominacion as Nombre FROM marcas ORDER BY Denominacion";
        $SQL = "SELECT t.*, m.Denominacion as Marca 
        FROM transportes t
        INNER join marcas m on m.IdMarca = t.IdMarca
        ORDER BY t.modelo ASC";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs es el cto de resultados
        $rs = mysqli_query($vConexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['ID'] = $data['IdTransporte'];
            $Listado[$i]['Modelo'] = $data['Marca'] .' - '. $data['Modelo'] . ' - '.$data['Patente'];
            $i++;
        }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}
?>