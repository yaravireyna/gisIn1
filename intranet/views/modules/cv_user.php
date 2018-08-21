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
    <li class="breadcrumb-item active">Últimas Actualizaciones</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <iframe src="http://expressyourself.dyndns.org:8090/videos/acceso/seccion/creacv/" frameborder="0" width="100%" height="600px"></iframe>
  </div>
  
  <!-- <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-3 col-lg-3">
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
    </div>
  </div> -->
</div>