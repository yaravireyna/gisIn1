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
    
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header">
        <i class="fas fa-user"></i> Tracking por usuario
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="miTablaCalendario" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Recurso</th>
                <th>Perfil</th>
                <th>Salario</th>
                <th>Ubicacion</th>
                <th>Horario</th>
                <th>Status</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Armando Lopez</td>
                <td>Programador UX</td>
                <td>$22,000.00 a $25,000.00</td>
                <td>Torre Diana CDMX</td>
                <td>9 a 18 hrs</td>
                <td>En citas (Reclutamiento GIS)</td>
                <td><i class="fas fa-truck-moving" onclick="javascript:track('Armando Lopez',1);"></i></td>
              </tr>
              <tr>
                <td>Fernando Alvarez</td>
                <td>Programador Java</td>
                <td>$30,000.00 a $35,000.00</td>
                <td>Insurgentes sur</td>
                <td>9 a 18 hrs</td>
                <td>Revision de candidatos</td>
                <td><i class="fas fa-truck-moving" onclick="javascript:track('Fernando Alvarez',2);"></i></td>
              </tr>
              <tr>
                <td>Carol Estrada</td>
                <td>Account Manager</td>
                <td>$12,000.00 a $16,000.00</td>
                <td>AT&T Torre Zafiro</td>
                <td>9 a 19 hrs</td>
                <td>Contrato</td>
                <td><i class="fas fa-truck-moving" onclick="javascript:track('Carol Estrada',3);"></i></td>
              </tr>
              <tr>
                <td>Fernanda Romero</td>
                <td>SCRUM Master</td>
                <td>$32,000.00 a $35,000.00</td>
                <td>Insurgentes Sur, CDMX</td>
                <td>9 a 19 hrs</td>
                <td>Programación de citas con cliente</td>
                <td><i class="fas fa-truck-moving" onclick="javascript:track('Fernanda Romero',4);"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Fecha 12/07/2018</div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTrack1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Seguimiento de: <u><p id="nomUser" class="d-inline"></p></u></h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="views/modules/img/user/pexels-photo-220453.jpeg" class="img-responsive" width="100%">
              </div>
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="../img/clientes/elektra.png" class="img-responsive" width="50%">
                  </div>                 
                  <div class="col-12"><b>Armando Lopez</b></div>
                  <div class="col-12"><b>Postulacón por Web</b></div>
                  <div class="col-12"><b>Cliente: Elektra</b></div>
                  <div class="col-12"><b>Vacante: Programador UX</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Vacante en proceso de entrevistas</b></div>
                  <div class="col-12"><br></div>
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>23/06/2018</b></div>
                  <div class="col-6"><b>Revisado por reclutamiento:</b></div>
                  <div class="col-6"><b>23/06/2018</b></div>
                  <div class="col-6"><b>Cita programadas:</b></div>
                  <div class="col-6"><b>25/06/2018 14:30</b></div>                   
                </div>

                <div class="row">
                  <div class="col-12 text-center">
                    <img src="../img/clientes/att-logoBN.png" class="img-responsive" width="50%">
                  </div>               
                  <div class="col-12"><b>Armando Lopez</b></div>
                  <div class="col-12"><b>Postulacón por Web</b></div>
                  <div class="col-12"><b>Cliente: AT&T</b></div>
                  <div class="col-12"><b>Vacante: Programador UX</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Vacante en proceso de entrevistas</b></div>
                  <div class="col-12"><br></div>
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>23/06/2018</b></div>
                  <div class="col-6"><b>Revisado por reclutamiento:</b></div>
                  <div class="col-6"><b>23/06/2018</b></div>
                  <div class="col-6"><b>Cita programadas:</b></div>
                  <div class="col-6"><b>25/06/2018 14:30</b></div>                   
                </div>
              </div>  
                        
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTrack2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Seguimiento de: <u><p id="nomUser" class="d-inline"></p></u></h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="views/modules/img/user/pexels-photo-91227.jpeg" class="img-responsive" width="100%">
              </div>
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="../img/clientes/elektra.png" class="img-responsive" width="50%">
                  </div>
                  <div class="col-12"><b>Fernando Alvarez</b></div>
                  <div class="col-12"><b>OCC</b></div>
                  <div class="col-12"><b>Cliente: AT&T</b></div>
                  <div class="col-12"><b>Programador Java</b></div>
                  <div class="col-12"><b>01/07/2018</b></div>
                  <div class="col-12"><b>Vacante en búsqueda de candidatos</b></div>
                  <div class="col-12"><br></div>
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>03/06/2018</b></div>
                  <div class="col-6"><b>Revisado por RH:</b></div>
                  <div class="col-6"><b>04/06/2018</b></div>                 
                </div>                
              </div>                          
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTrack3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Seguimiento de: <u><p id="nomUser" class="d-inline"></p></u></h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="views/modules/img/user/pexels-photo-712521.jpeg" class="img-responsive" width="100%">
              </div>
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="../img/clientes/conauto.png" class="img-responsive" width="50%">
                  </div>
                  <div class="col-12"><b>Carol Estrada</b></div>
                  <div class="col-12"><b>Linkedin</b></div>
                  <div class="col-12"><b>Account Manager</b></div>
                  <div class="col-12"><b>07/05/2018</b></div>
                  <div class="col-12"><b>Cumplida</b></div>
                  <div class="col-12"><br></div>
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>07/05/2018</b></div>
                  <div class="col-6"><b>Revisado por reclutamiento:</b></div>
                  <div class="col-6"><b>08/05/2018</b></div>
                  <div class="col-6"><b>Cita programadas RH:</b></div>
                  <div class="col-6"><b>09/05/2018 14:30</b></div>
                  <div class="col-6"><b>Cita programadas cliente:</b></div>
                  <div class="col-6"><b>11/05/2018 11:15</b></div>
                  <div class="col-6"><b>Firma de contrato:</b></div>
                  <div class="col-6"><b>15/05/2018</b></div>
                  <div class="col-6"><b>Entrada:</b></div>
                  <div class="col-6"><b>16/05/2018</b></div>                
                </div>                
              </div>                          
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTrack4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Seguimiento de: <u><p id="nomUser" class="d-inline"></p></u></h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="views/modules/img/user/pexels-photo-415829.jpeg" class="img-responsive" width="100%">
              </div>
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="../img/clientes/grupo-financeiro-actinver.png" class="img-responsive" width="50%">
                  </div>
                  <div class="col-12"><b>Fernanda Romero</b></div>
                  <div class="col-12"><b>Postulacón por Web</b></div>
                  <div class="col-12"><b>SCRUM Master</b></div>
                  <div class="col-12"><b>02/06/2018</b></div>
                  <div class="col-12"><b>Vacante en búsqueda de candidatos</b></div>
                  <div class="col-12"><br></div>
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>02/06/2018</b></div>
                  <div class="col-6"><b>Revisado por reclutamiento:</b></div>
                  <div class="col-6"><b>03/06/2018</b></div>
                  <div class="col-6"><b>Cita programadas RH:</b></div>
                  <div class="col-6"><b>05/06/2018 13:30</b></div>
                  <div class="col-6"><b>Cita programadas con cliente:</b></div>
                  <div class="col-6"><b></b></div>              
                </div>                
              </div>                          
            </div>
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function track(nombre,modal){

    $('#modalTrack'+modal+' .modal-header #nomUser').html(nombre);

    $('#modalTrack'+modal).modal('show');

    // if(modal==1){
    //   $('#hola').html("<div class='col-12'><img src='views/modules/img/user/pexels-photo-415829.jpeg' class='img-responsive' width='100%'></div>");
    // }
  }

</script>