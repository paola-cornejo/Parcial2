<?php
function habilitar_chofer_carga() {
   
    if ($_SESSION['Usuario_Nivel'] == 1)
        return true;
    else
        return false;
}
?>
