<?php 

require_once 'funciones/habilitar_chofer_carga.php';
require_once 'funciones/habilitar_viajes_carga.php';
require_once 'funciones/habilitar_transporte_carga.php';

?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Panel</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-truck"></i><span>Transporte</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
    <?php if (habilitar_transporte_carga()){ ?>  
    <li>
        <a href="camion_carga.php" class="active">
        
          <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo transporte</span>
        
        </a>
      </li>
      <?php } ?>    

      <?php if (habilitar_chofer_carga()){ ?>
      <li>
        <a href="chofer_carga.php" class="active">
        <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo chofer</span>
        </a>
      </li>
      <?php } ?>
   

    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">            
      <i class="bi bi-globe2"></i><span>Viajes</span><i class="bi bi-chevron-down ms-auto"></i>            
    </a>
    <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
      
    <?php if (habilitar_viajes_carga()){ ?>
    <li>
        <a href="viaje_carga.php" class="active">
        
            <i class="bi bi-file-earmark-plus"></i><span>Cargar nuevo</span>
        <?php } ?>
        </a>
      </li>
      <li>
        <a href="viajes_listado.php" class="active">
        <i class="bi bi-layout-text-window-reverse"></i><span>Listado de viajes</span>
        </a>
      </li>
    </ul>
  </li>




</ul>

</aside><!-- End Sidebar-->