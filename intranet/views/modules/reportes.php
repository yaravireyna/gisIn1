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
      <a href="index.php?action=inicio">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Seguimiento</li>
  </ol>
  
  <ul id="tabsAsignar" class="nav nav-tabs nav-justified">
      <li class="nav-item">
          <a class="nav-link active text-info" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-file-contract"></i> Avance</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-info" data-toggle="tab" href="#panel2" role="tab"><i class="far fa-file-alt"></i> Muro</a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-info" data-toggle="tab" href="#panel3" role="tab"><i class="far fa-file-alt"></i> Agenda</a>
      </li>
  </ul>

  <div class="tab-content card">
    <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
        <div class="row mt-4">
          
              
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

    <div class="tab-pane fade" id="panel2" role="tabpanel">
        <br>
        <div class="row mt-4">

          <div class="input-group col-12 mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><b>Objetivo</b></span>
            </div>
            <textarea id="objetivo" class="form-control" aria-label="With textarea" readonly="yes"></textarea>
          </div>

          

        </div>
    </div>

    <div class="tab-pane fade" id="panel3" role="tabpanel">
        <br>
        <div class="row mt-4">

          
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
                      <th>Fecha</th>
                      <th>Status</th>
                      <th>Prioridad</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Desarrollador Back-end Node</td>
                      <td>Rubi Estrada</td>
                      <td>Amazon</td>
                      <td>
                        Desarrollador Back-end NodeJs, con typescript. <br> 
                        Zona de trabajo: Insurgentes Sur, Cuidad de Mexico. <br>
                        Horario lboral: 9 a 19 hrs. <br>
                        Sueldo bruto: $32,000.00
                      </td>
                      <td>08/07/2018</td>
                      <td>En Entrevistas</td>
                      <td>Alta con urgencia</td>
                    </tr>
                    <tr>
                      <td>Desarrollador Front-end</td>
                      <td>Lucia Corona</td>
                      <td>CONAUTO</td>
                      <td>
                        Desarrollador Front-end con AngularJS. <br> 
                        Zona de trabajo: Al sur de la cuidad de Mexico. <br>
                        Horario lboral: 9 a 18 hrs. <br>
                        Sueldo bruto: $25,000.00
                      </td>
                      <td>13/07/2018</td>
                      <td>Finalizada (Contratación)</td>
                      <td>Media con urgencia</td>
                    </tr>
                    <tr>
                      <td>Desarrollador Back-end Java</td>
                      <td>Lucia Corona</td>
                      <td>Citi Banamex</td>
                      <td>
                        Desarrollador web Back-end para soporte a sistemas y desarrollo con Spring. <br> 
                        Zona de trabajo: Al sur de la cuidad de Mexico. <br>
                        Horario lboral: 9 a 18 hrs. <br>
                        Sueldo bruto: $25,000.00
                      </td>
                      <td>13/07/2018</td>
                      <td>Finalizada (Contratación)</td>
                      <td>Baja con urgencia</td>
                    </tr>
                    <tr>
                      <td>ABAP</td>
                      <td>María Miroslava Castañeda</td>
                      <td>Bancomer</td>
                      <td>Desarrollador ABAP para desarrollo de nuevos modulos. <br>
                      Zona de trabajo: Delegación Cuahutemoc. <br>
                      Horario laboral: 9 a 18 hrs. <br>
                      Sueldo bruto: $45,000.00</td>
                      <td>13/07/2018</td>
                      <td>Cancelado por el cliente</td>
                      <td>Alta con urgencia</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Fecha 12/07/2018</div>
          </div>
                

        </div>
    </div>
             
  </div>
</div>