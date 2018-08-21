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
        <i class="fas fa-puzzle-piece"></i> Tracking por vacante
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="miTablaCalendario" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Perfil</th>
                <th>Salario</th>
                <th>Ubicacion</th>
                <th>Cliente</th>
                <th>Status</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Programador UX</td>
                <td>$22,000.00 a $25,000.00</td>
                <td>Torre Diana CDMX</td>
                <td>Elektra</td>
                <td>En citas (Reclutamiento GIS)</td>
                <td><i class="fas fa-puzzle-piece" onclick="javascript:track('Programador UX',1);"></i></td>
              </tr>
              <tr>
                <td>Programador Java</td>
                <td>$30,000.00 a $35,000.00</td>
                <td>Insurgentes sur</td>
                <td>Actinver</td>
                <td>Revision de candidatos</td>
                <td><i class="fas fa-puzzle-piece" onclick="javascript:track('Programador Java',2);"></i></td>
              </tr>
              <tr>
                <td>Account Manager</td>
                <td>$12,000.00 a $16,000.00</td>
                <td>AT&T Torre Zafiro</td>
                <td>AT&T</td>
                <td>Contrato</td>
                <td><i class="fas fa-puzzle-piece" onclick="javascript:track('Account Manager',3);"></i></td>
              </tr>
              <tr>
                <td>SCRUM Master</td>
                <td>$32,000.00 a $35,000.00</td>
                <td>Insurgentes Sur, CDMX</td>
                <td>Actinver</td>
                <td>Programación de citas con cliente</td>
                <td><i class="fas fa-puzzle-piece" onclick="javascript:track('SCRUM Master',4);"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">última actualización 19/07/2018</div>
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
                <img src="../img/clientes/elektra.png" class="img-responsive" width="100%">
              </div>              
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12"><b>Programador UX</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Vacante en proceso de entrevistas GIS</b></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-12"><h4>Candidatos:</h4></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-220453.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Armando Lopez</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Revisado por reclutamiento:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Citas programadas:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>                      
                      </div>
                    </div>
                  </div>
                  <div class="col-12"><hr></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-324658.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Amairany Alvarado</b></div>                       
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Revisado por reclutamiento:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Citas programadas:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>                      
                      </div>
                    </div>
                  </div>
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
                <img src="../img/clientes/grupo-financeiro-actinver.png" class="img-responsive" width="100%">
              </div>              
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12"><b>Programador JAVA</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Revisión de candidatos</b></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-12"><h4>Candidatos:</h4></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-91227.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Fernando Alvarez</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Revisado por reclutamiento:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Citas programadas:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>                      
                      </div>
                    </div>
                  </div>
                  <hr>
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
                <img src="../img/clientes/att-logoBN.png" class="img-responsive" width="100%">
              </div>              
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12"><b>Account Manager</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Concluida Contrato</b></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-12"><h4>Candidatos:</h4></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-712521.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Carol Estrada</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Revisa reclutamiento:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Citas RH GIS:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>
                        <div class="col-4"><b>Citas cliente:</b></div>
                        <div class="col-8"><b>28/06/2018 14:30</b></div>
                        <div class="col-4"><b>Entrada:</b></div>
                        <div class="col-8"><b>01/07/2018 14:30</b></div>                    
                      </div>
                    </div>
                  </div>
                  <div class="col-12"><hr></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-736716.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Joaquín Gonzalez</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>22/06/2018</b></div>
                        <div class="col-4"><b>Revisa reclutamiento:</b></div>
                        <div class="col-8"><b>22/06/2018</b></div>
                        <div class="col-4"><b>Citas RH GIS:</b></div>
                        <div class="col-8"><b>23/06/2018 14:30</b></div>
                        <div class="col-4"><b>Citas cliente:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>
                        <div class="col-4"><b>Entrada:</b></div>
                        <div class="col-8"><b>01/07/2018 14:30</b></div>                    
                      </div>
                    </div>
                  </div>
                  <hr>
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
                <img src="../img/clientes/grupo-financeiro-actinver.png" class="img-responsive" width="100%">
              </div>              
              <div class="col-8 text-justify">
                <div class="row">
                  <div class="col-12"><b>SCRUM MASTER</b></div>
                  <div class="col-12"><b>21/06/2018</b></div>
                  <div class="col-12"><b>Programación de citas con cliente</b></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-12"><h4>Candidatos:</h4></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-415829.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Fernanda Romero</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Revisa reclutamiento:</b></div>
                        <div class="col-8"><b>23/06/2018</b></div>
                        <div class="col-4"><b>Citas RH GIS:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>
                        <div class="col-4"><b>Citas cliente:</b></div>
                        <div class="col-8"><b>28/06/2018 14:30</b></div>
                        <div class="col-4"><b>Entrada:</b></div>
                        <div class="col-8"><b>01/07/2018 14:30</b></div>                    
                      </div>
                    </div>
                  </div>
                  <div class="col-12"><hr></div>
                  <div class="row">
                    <div class="col-4"><img src="views/modules/img/user/pexels-photo-262391.jpeg" class="img-responsive" width="100%"></div>
                    <div class="col-8">
                      <div class="row">
                        <div class="col-4"><b>Nombre:</b></div>
                        <div class="col-8"><b>Joaquín Gonzalez</b></div>                    
                        <div class="col-4"><b>Postulado:</b></div>
                        <div class="col-8"><b>22/06/2018</b></div>
                        <div class="col-4"><b>Revisa reclutamiento:</b></div>
                        <div class="col-8"><b>22/06/2018</b></div>
                        <div class="col-4"><b>Citas RH GIS:</b></div>
                        <div class="col-8"><b>23/06/2018 14:30</b></div>
                        <div class="col-4"><b>Citas cliente:</b></div>
                        <div class="col-8"><b>25/06/2018 14:30</b></div>
                        <div class="col-4"><b>Entrada:</b></div>
                        <div class="col-8"><b>01/07/2018 14:30</b></div>                    
                      </div>
                    </div>
                  </div>
                  <hr>
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

<div class="modal fade" id="modalTrack5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <div class="col-12"><b>Fernando Alvarez</b></div>
                  <div class="col-12"><b>OCC</b></div>
                  <div class="col-12"><b>Programador Java</b></div>
                  <div class="col-12"><b>01/07/2018</b></div>
                  <div class="col-12"><b>Vacante en búsqueda de candidatos</b></div>
                  <div><br></div>
                  <div><br></div>
                  <div><br></div>
                  <hr>
                </div>
                <div class="row">
                  <div class="col-6"><b>Postulado:</b></div>
                  <div class="col-6"><b>03/06/2018</b></div>
                  <div class="col-6"><b>Revisado por reclutamiento:</b></div>
                  <div class="col-6"><b>04/06/2018</b></div>
                  <!-- <div class="col-6"><b>Cita programadas:</b></div>
                  <div class="col-6"><b>25/06/2018 14:30</b></div> -->
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
  }

</script>