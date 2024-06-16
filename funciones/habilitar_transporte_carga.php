<?php
function habilitar_transporte_carga() {
   
    if ($_SESSION['Usuario_Nivel'] == 1 || $_SESSION['Usuario_Nivel'] == 2 )
        return true;
    else
        return false;
}
?>
