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
    <li class="breadcrumb-item">
      <a href="index.php?action=operativos">Usuarios</a>
    </li>
    <li class="breadcrumb-item active">Operativos</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    
    <div class="mt-5 col-sm-6">
      <div class="card">
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <div class="dropdown card-options">
              <button class="btn-options" type="button" id="project-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Editar</a>
                  <a class="dropdown-item" href="#">Ver detalles</a>
              </div>
          </div>
          <div class="card-title">
              <a href="#">
                  <h5>Posición: Java Sr</h5> -- <h5>Lucia Corona</h5>
              </a>
          </div>
          <ul class="avatars">

              <li>
                  <a href="#" data-toggle="tooltip" title="Claire">
                      <img alt="Claire Connors" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Marcus">
                      <img alt="Marcus Simmons" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Peggy">
                      <img alt="Peggy Brown" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Harry">
                      <img alt="Harry Xai" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Sally">
                      <img alt="Sally Harper" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

          </ul>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <i class="fas fa-check-double mr-1"></i>
                  <span class="text-small">3/12</span>
              </div>
              <span class="text-small">Hace 3 horas</span>
          </div>
      </div>
      </div>
    </div>

    <div class="mt-5 col-sm-6">
      <div class="card">
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <div class="dropdown card-options">
              <button class="btn-options" type="button" id="project-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Editar</a>
                  <a class="dropdown-item" href="#">Ver detalles</a>
              </div>
          </div>
          <div class="card-title">
              <a href="#">
                  <h5>Posición: ABAP</h5> -- <h5>Rubi Estrada</h5>
              </a>
          </div>
          <ul class="avatars">

              <li>
                  <a href="#" data-toggle="tooltip" title="Claire">
                      <img alt="Claire Connors" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Marcus">
                      <img alt="Marcus Simmons" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Peggy">
                      <img alt="Peggy Brown" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Harry">
                      <img alt="Harry Xai" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Sally">
                      <img alt="Sally Harper" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

          </ul>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <i class="fas fa-check-double mr-1"></i>
                  <span class="text-small">3/12</span>
              </div>
              <span class="text-small">Hace 3 horas</span>
          </div>
      </div>
      </div>
    </div>

    <div class="mt-5 col-sm-6">
      <div class="card">
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
          <div class="dropdown card-options">
              <button class="btn-options" type="button" id="project-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Editar</a>
                  <a class="dropdown-item" href="#">Ver detalles</a>
              </div>
          </div>
          <div class="card-title">
              <a href="#">
                  <h5>Posición: Account Manager</h5> -- <h5>Rubi Estrada</h5>
              </a>
          </div>
          <ul class="avatars">

              <li>
                  <a href="#" data-toggle="tooltip" title="Claire">
                      <img alt="Claire Connors" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Marcus">
                      <img alt="Marcus Simmons" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Peggy">
                      <img alt="Peggy Brown" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="" data-original-title="Harry">
                      <img alt="Harry Xai" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

              <li>
                  <a href="#" data-toggle="tooltip" title="Sally">
                      <img alt="Sally Harper" class="avatar" src="views/modules/img/user/2e74b0d28c8ec2bd1c02272739a4fa8b.jpg">
                  </a>
              </li>

          </ul>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <i class="fas fa-check-double mr-1"></i>
                  <span class="text-small">3/12</span>
              </div>
              <span class="text-small">Hace 3 horas</span>
          </div>
      </div>
      </div>
    </div>

  </div>
</div>