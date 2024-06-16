<?php
function habilitar_viajes_carga() {
   
    if ($_SESSION['Usuario_Nivel'] == 1)
        return true;
    else
        return false;
}
?>
