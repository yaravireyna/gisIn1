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

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?action=inicio">Administración</a>
    </li>
    <li class="breadcrumb-item active">Perfil</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <!-- <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-file-contract"></i>
          </div>
          <div class="mr-5">12 Nuevas Vacantes</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver Detalles</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-user-tie"></i>
          </div>
          <div class="mr-5">2 Nuevos Usuarios!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver Detalles</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-list"></i>
          </div>
          <div class="mr-5">2 Nuevos requerimientos!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver Detalles</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <div class="mr-5">13 Nuevos Perfiles!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver Detalles</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div> -->

    <iframe src="http://expressyourself.dyndns.org:8090/videos/acceso/seccion/upload/" width="100%" height="700px" frameborder="0"></iframe>
  </div>
  
  <div class="row">
    <!-- <div class="card mb-3 col-12 col-sm-12 col-md-3 col-lg-3">
      <div class="card-header">
        <i class="far fa-calendar-alt"></i> Calendario
      </div>
      <div class="card-body">
        <div>
          <div id="midatepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-format="yyyy-mm-dd"></div>
        </div>
      </div>
      <div class="card-footer small text-muted">Fecha 12/07/2018</div>
    </div>
    
    <div class="card mb-3 col-12 col-sm-12 col-md-9 col-lg-9">
      <div class="card-header">
        <i class="fa fa-table"></i> Actividad por dia
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="miTablaCalendario" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Requerimiento</th>
                <th>Reclutador</th>
                <th>Cliente</th>
                <th>Detalles</th>
                <th>Fecha de último movimiento</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Programador UX</td>
                <td>Lucia Corona</td>
                <td>Actinver</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Fecha 12/07/2018</div>
    </div> -->
  </div>
</div>