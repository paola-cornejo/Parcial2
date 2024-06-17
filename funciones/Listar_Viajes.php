<?php
function Listar_Viajes($vConexion) {

    $Listado=array();      
        
        $SQL = "SELECT v.fechapautada AS fechaviaje,
                DATE_FORMAT(v.fechapautada , '%d/%m/%Y') AS fechaviajeMostrar,
                d.denominacion as destino
                , concat(m.denominacion , ' - ' , t.modelo , ' - ', t.patente) as camion,
                concat(u.apellido, ', ', u.nombre) as chofer,
                v.costo as costoviaje,                
                round((v.costo * v.porcentajechofer) / 100,2) as montochofer,
                v.porcentajechofer                 
                FROM viajes v
                INNER JOIN destinos d on d.iddestino = v.iddestino
                INNER JOIN transportes t on t.idtransporte = v.idtransporte
                INNER JOIN usuarios u on u.id = v.idusuariochofer
                INNER JOIN marcas m on m.idmarca = t.idmarca
                ORDER BY v.fechapautada ASC, d.denominacion ASC
                ;";                

        
        $rs = mysqli_query($vConexion, $SQL);
        
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {


            $fecha = $data['fechaviaje'];

            $fechaEnEspanol = $fecha;

            $montochoferConporcentaje = $data['montochofer'] . " (". $data['porcentajechofer'] . "%)";
            $Listado[$i]['numero'] = strval($i+1);            
            $Listado[$i]['fechaviaje'] = $data['fechaviaje'];
            $Listado[$i]['fechaviajeMostrar'] = $data['fechaviajeMostrar'];
            $Listado[$i]['destino'] = $data['destino'];
            $Listado[$i]['camion'] = $data['camion'];
            $Listado[$i]['chofer'] = $data['chofer'];
            $Listado[$i]['costoviaje'] = $data['costoviaje'];
            $Listado[$i]['montochoferConporcentaje'] = $montochoferConporcentaje;            
            $Listado[$i]['montochoferSinporcentaje'] = $data['montochofer'];
            $Listado[$i]['porcentajechofer'] = $data['porcentajechofer'];     
            $i++;       
        }
    
    return $Listado;

}
?>
