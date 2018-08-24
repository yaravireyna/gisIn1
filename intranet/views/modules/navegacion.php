<?php

  session_start();

  if(isset($_SESSION['idUser'], $_SESSION["tipoUser"])){

    $idUsuario = $_SESSION['idUserU'];
    $tipoDeUsuario = $_SESSION['tipoUser'];

  }
  else{

    echo "<script type='text/javascript'> location.href = '../../../'; </script>";
    exit;

  }

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php?action=inicio"><img id="elLogo" src="views/modules/img/gisBlanco.png" height="36"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      <?php if($tipoDeUsuario=="A"){ ?>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administración">
        <a class="nav-link" href="index.php?action=resumen">
          <i class="fas fa-tachometer-alt"></i>
          <span class="nav-link-text">Administración</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes/Actividad">
        <a class="nav-link" href="index.php?action=reportes">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Reportes/Actividad</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requerimiento">
        <a class="nav-link" href="index.php?action=requerimiento">
          <i class="fas fa-clipboard-list"></i>
          <span class="nav-link-text">Requerimiento</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfiles">
        <a class="nav-link" href="index.php?action=perfiles">
          <i class="fas fa-diagnoses"></i>
          <span class="nav-link-text">Perfiles</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Asignaciones">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fas fa-hand-point-right"></i>
          <span class="nav-link-text">Asignaciones</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <a href="index.php?action=asignaciones">
              <i class="far fa-eye"></i>
              <span class="nav-link-text">Ver Asignaciones</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsUser" data-parent="#exampleAccordion">
          <i class="fas fa-users"></i>
          <span class="nav-link-text">Usuarios</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponentsUser">
          <li>
            <a href="index.php?action=operativos">
              <i class="fas fa-user-edit"></i>
              <span class="nav-link-text">Operativos</span>
            </a>
          </li>
          <li>
            <a href="index.php?action=candidatos">
              <i class="fas fa-user-tie"></i>
              <span class="nav-link-text">Candidatos</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tracking">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fas fa-truck-moving"></i>
          <span class="nav-link-text">Tracking</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
            <a href="index.php?action=track_user">
              <i class="fas fa-user"></i>
              <span class="nav-link-text">Por Usuario</span>              
            </a>
          </li>
          <li>
            <a href="index.php?action=track_vacante">
              <i class="fas fa-puzzle-piece"></i>
              <span class="nav-link-text">Por Vacante</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Web">
        <a class="nav-link" href="http://www.grupois.com/" target="_blank">
          <i class="fa fa-fw fa-link"></i>
          <span class="nav-link-text">Web GIS</span>
        </a>
      </li>

      <?php }else if($tipoDeUsuario=="AR"){ ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administración">
        <a class="nav-link" href="index.php?action=resumen">
          <i class="fas fa-tachometer-alt"></i>
          <span class="nav-link-text">Administración</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes/Actividad">
        <a class="nav-link" href="index.php?action=reportes">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Reportes/Actividad</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Asignaciones">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fas fa-hand-point-right"></i>
          <span class="nav-link-text">Asignaciones</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <a href="index.php?action=asignar">
              <i class="fab fa-linode"></i>
              <span class="nav-link-text">Asignar</span>
            </a>
          </li>
          <li>
            <a href="index.php?action=asignaciones">
              <i class="far fa-eye"></i>
              <span class="nav-link-text">Ver Asignaciones</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsUser" data-parent="#exampleAccordion">
          <i class="fas fa-users"></i>
          <span class="nav-link-text">Usuarios</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponentsUser">
          <li>
            <a href="index.php?action=operativos">
              <i class="fas fa-user-edit"></i>
              <span class="nav-link-text">Operativos</span>
            </a>
          </li>
          <li>
            <a href="index.php?action=candidatos">
              <i class="fas fa-user-tie"></i>
              <span class="nav-link-text">Candidatos</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tracking">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fas fa-truck-moving"></i>
          <span class="nav-link-text">Tracking</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
            <a href="index.php?action=track_user">
              <i class="fas fa-user"></i>
              <span class="nav-link-text">Por Usuario</span>              
            </a>
          </li>
          <li>
            <a href="index.php?action=track_vacante">
              <i class="far fa-building"></i>
              <span class="nav-link-text">Por Vacante</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Web">
        <a class="nav-link" href="http://www.grupois.com/" target="_blank">
          <i class="fa fa-fw fa-link"></i>
          <span class="nav-link-text">Web GIS</span>
        </a>
      </li>
      <?php }else if($tipoDeUsuario=="OR"){ ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administración">
        <a class="nav-link" href="index.php?action=resumen">
          <i class="fas fa-tachometer-alt"></i>
          <span class="nav-link-text">Administración</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes/Actividad">
        <a class="nav-link" href="index.php?action=reportes">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Reportes/Actividad</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsUser" data-parent="#exampleAccordion">
          <i class="fas fa-users"></i>
          <span class="nav-link-text">Usuarios</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponentsUser">
          <li>
            <a href="index.php?action=candidatos">
              <i class="fas fa-user-tie"></i>
              <span class="nav-link-text">Candidatos</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Asignaciones">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fas fa-hand-point-right"></i>
          <span class="nav-link-text">Asignaciones</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <a href="index.php?action=asignaciones">
              <i class="far fa-eye"></i>
              <span class="nav-link-text">Ver Asignaciones</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tracking">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fas fa-truck-moving"></i>
          <span class="nav-link-text">Tracking</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
            <a href="index.php?action=track_user">
              <i class="fas fa-user"></i>
              <span class="nav-link-text">Por Usuario</span>              
            </a>
          </li>
          <li>
            <a href="index.php?action=track_vacante">
              <i class="far fa-building"></i>
              <span class="nav-link-text">Por Vacante</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Web">
        <a class="nav-link" href="http://www.grupois.com/" target="_blank">
          <i class="fa fa-fw fa-link"></i>
          <span class="nav-link-text">Web GIS</span>
        </a>
      </li>
      <?php }else if($tipoDeUsuario=="OA"){ ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administración">
        <a class="nav-link" href="index.php?action=resumen">
          <i class="fas fa-tachometer-alt"></i>
          <span class="nav-link-text">Administración</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes/Actividad">
        <a class="nav-link" href="index.php?action=reportes">
          <i class="fa fa-fw fa-area-chart"></i>
          <span class="nav-link-text">Reportes/Actividad</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requerimiento">
        <a class="nav-link" href="index.php?action=requerimiento">
          <i class="fas fa-clipboard-list"></i>
          <span class="nav-link-text">Requerimiento</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuarios">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsUser" data-parent="#exampleAccordion">
          <i class="fas fa-users"></i>
          <span class="nav-link-text">Usuarios</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponentsUser">
          <li>
            <a href="index.php?action=candidatos">
              <i class="fas fa-user-tie"></i>
              <span class="nav-link-text">Candidatos</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Asignaciones">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fas fa-hand-point-right"></i>
          <span class="nav-link-text">Asignaciones</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
          <li>
            <a href="index.php?action=asignaciones">
              <i class="far fa-eye"></i>
              <span class="nav-link-text">Ver Asignaciones</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tracking">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fas fa-truck-moving"></i>
          <span class="nav-link-text">Tracking</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
            <a href="index.php?action=track_user">
              <i class="fas fa-user"></i>
              <span class="nav-link-text">Por Usuario</span>              
            </a>
          </li>
          <li>
            <a href="index.php?action=track_vacante">
              <i class="far fa-building"></i>
              <span class="nav-link-text">Por Vacante</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Web">
        <a class="nav-link" href="http://www.grupois.com/" target="_blank">
          <i class="fa fa-fw fa-link"></i>
          <span class="nav-link-text">Web GIS</span>
        </a>
      </li>
      <?php }else if($tipoDeUsuario=="U"){ ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil">
        <a class="nav-link" href="index.php?action=profile">
          <i class="fas fa-user-circle"></i>
          <span class="nav-link-text">Perfil</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="CV">
        <a class="nav-link" href="index.php?action=cv_user">
          <i class="far fa-id-card"></i>
          <span class="nav-link-text">CV</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Postulaciones">
        <a class="nav-link" href="index.php?action=postulaciones">
          <i class="fas fa-clipboard-check"></i>
          <span class="nav-link-text">Postulaciones</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Web">
        <a class="nav-link" href="http://www.grupois.com/" target="_blank">
          <i class="fa fa-fw fa-link"></i>
          <span class="nav-link-text">Web GIS</span>
        </a>
      </li>
      <?php }else{} ?>

    </ul>



    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fas fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-center" id="toggleNavColor">
          <i class="fa fa-fw fa-adjust" style="font-size: 36px;"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="index.php?action=" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="avatar" src="views/modules/img/user/<?php if($_SESSION['img']!=""){echo $_SESSION['img'];}else{ echo "perfil.png";} ?>" height="36">    <?php echo $_SESSION['nombreUser']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          
          <a class="dropdown-item small" onclick="cerrarsesion();"><i class="fas fa-sign-out-alt"></i>Salir</a>
        </div>
      </li> 
    </ul>
  </div>
</nav>