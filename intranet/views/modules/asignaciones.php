<?php

  session_start();

  if(isset($_SESSION['idUser'], $_SESSION["tipoUser"])){

    $idUsuario = $_SESSION['idUser'];
    $tipoDeUsuario = $_SESSION['tipoUser'];
    
    echo "<script type='text/javascript'> var idUsuario = $idUsuario; </script>";
    echo "<script type='text/javascript'> var tipoDeUsuario = '$tipoDeUsuario'; </script>";

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
      <a href="index.php?action=asignar">Asignaciones</a>
    </li>
    <?php 
    if($_SESSION["tipoUser"]=="A" || $_SESSION["tipoUser"]=="AR") echo "<li class='breadcrumb-item active'> Asignaciones</li>";
    else echo "<li class='breadcrumb-item active'> Mis asignaciones</li>";
    ?>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header">
        <?php 
        if($_SESSION["tipoUser"]=="A" || $_SESSION["tipoUser"]=="AR") echo "<i class='fas fa-diagnoses'></i> Asignaciones";
        else echo "<i class='fas fa-diagnoses'></i> Mis asignaciones";
        ?>
      </div>
      <div class="card-body">
        <div id="contentAdmin" class="table-responsive">
          <table id="miTablaAsignaciones" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Perfil</th>
                <th>Cliente</th>
                <th>Vacantes</th>
                <th>Postulaciones</th>
                <th>Contrataciones</th>
                <th>%</th>
                <th>Reclutador</th>
                <th>Status</th>
                <th>Asignado</th>
                <th>Visto</th>
                <th>Cumplido</th>
                <th>Modificar</th>
              </tr>
            </thead>
          </table>
        </div>

        <div id="contentRec" class="table-responsive">
          <table id="miTablaAsignacionesO" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Perfil</th>
                <th>Cliente</th>
                <th>Salario</th>
                <th>Ubicación</th>
                <th>Prioridad</th>
                <th>Status</th>
                <th>Detalles</th>
                <th>Postular</th>
                <th>Valor</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
      <div class="card-footer small text-muted"><p id="actual"></p></div>
    </div>
  </div>
</div>

<div id="modalDetalles" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success text-center w-100">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
        <div><i class='material-icons text-white' style="font-size: 2.5rem;">class</i> <p class="in-line display-5" id="elHeaderConNombre" style="color:#fff;"> </p></div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12"><br></div>
        </div>
        <p style="visibility:hidden; display:none;" id="requi"></p>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active text-info" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-file-contract"></i> Generales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" data-toggle="tab" href="#panel2" role="tab"><i class="far fa-file-alt"></i> Detallado</a>
            </li>
        </ul>         

        <div class="tab-content card">

          <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
              <div class="row mt-4">
                
                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Perfil</b></span>
                  </div>
                  <input type="text" class="form-control" id="perfil" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Cliente</b></span>
                  </div>
                  <input type="text" class="form-control" id="cliente" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Dirección</b></span>
                  </div>
                  <input type="text" class="form-control" id="direccion" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Prioridad</b></span>
                  </div>
                  <input type="text" class="form-control" id="prioridad" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Sueldo neto</b></span>
                  </div>
                  <input type="text" class="form-control" id="sueldo" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Fecha</b></span>
                  </div>
                  <input type="text" class="form-control" id="fecha" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Duración</b></span>
                  </div>
                  <input type="text" class="form-control" id="duracion" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Ingles</b></span>
                  </div>
                  <input type="text" class="form-control" id="ingles" aria-describedby="basic-addon3" readonly="yes">
                </div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Vacantes requeridas</b></span>
                  </div>
                  <input type="text" class="form-control" id="numvacantes" aria-describedby="basic-addon3" readonly="yes">
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

                <div class="input-group col-12 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Responsabilidades</b></span>
                  </div>
                  <textarea id="responsabilidades" class="form-control" aria-label="With textarea" readonly="yes"></textarea>
                </div>

                <div class="input-group col-12 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Conocimientos</b></span>
                  </div>
                  <textarea id="conocimientos" class="form-control" aria-label="With textarea" readonly="yes"></textarea>
                </div>

                <div class="input-group col-12 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Cursos</b></span>
                  </div>
                  <textarea id="cursos" class="form-control" aria-label="With textarea" readonly="yes"></textarea>
                </div>

                <div class="input-group col-12 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Tecnologias</b></span>
                  </div>
                  <textarea id="tecnologias" class="form-control" aria-label="With textarea" readonly="yes"></textarea>
                </div>

              </div>
          </div>
                   
        </div>

      </div>
      <div class="modal-footer text-justify">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalPostular" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success text-center w-100">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
        <div><i class="fas fa-book-reader text-white" style="font-size: 2.5rem;"></i>
          <!-- <i class='material-icons text-white' style="font-size: 2.5rem;">class</i> -->
          <p class="in-line display-5" id="elHeaderConNombre" style="color:#fff;"> </p></div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12"><br></div>
        </div>
        <p style="visibility:hidden; display:none;" id="elReq"></p>

        <ul id="tabsPostulaciones" class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active text-info" data-toggle="tab" href="#panelCat" role="tab"><i class="fas fa-address-book"></i> Catálogo de Candidatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" data-toggle="tab" href="#panelNue" role="tab"><i class="fas fa-user-plus"></i> Nuevo Candidato</a>
            </li>
        </ul>         

        <div class="tab-content card">

          <div class="tab-pane fade in show active" id="panelCat" role="tabpanel">
              <div class="row mt-4">
                <div class="col-12 mb-3 text-center card-notification-sub"><b>Filtros</b></div>

                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><b>Perfil</b></span>
                  </div>
                  <select name="posV" id="posV" class="form-control" onchange="cargarRecursos();"></select>
                </div>


                <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="card-header text-center">
                    <i class="fas fa-users"></i> <label for=""><b><p id="perfilF"></p></b></label>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="miTablaPos" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Perfil</th>
                            <th>Recurso</th>
                            <th>Detalles</th>
                            <th>CV</th>
                            <th>Video</th>
                            <th>Postular</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted"><p>Catálogo de Recursos</p></div>
                </div>

              </div>
          </div>

          <div class="tab-pane fade" id="panelNue" role="tabpanel">
              <br>
              <div class="row mt-4">

                <div class="input-group col-6 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Separador</b></span>
                  </div>
                  <input id="nuevosRD" onkeypress="return justMails(event);" type="text" class="form-control">
                </div>

                <div class="input-group col-12 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><b>Correo(s) electrónico(s)</b></span>
                  </div>
                  <textarea id="nuevosR" onkeypress="return justMails(event);" class="form-control"></textarea>
                  <!-- <input id="nuevosR" onkeypress="return justMails(event);" type="text" class="form-control"> -->
                </div>

                <div class="input-group col-12 mb-3 d-flex align-items-center justify-content-center">
                  <button id="nuevosRB" class="btn btn-danger text-center" onclick="postularCandidato(0);">Postular</button>
                </div>              

              </div>
          </div>
                   
        </div>

      </div>
      <div class="modal-footer text-justify">
        <span id="mensajeInfoU">&nbsp;</span>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe id="videoCV" class="embed-responsive-item" src="" allowfullscreen></iframe>
                    <!-- <video id="videoCV" src="views/modules/src/videos/muestra.mp4"></video> -->
                </div>
            </div>
             <!-- <div class="modal-footer justify-content-center flex-column flex-md-row">
              
              <button type="button" class="btn btn-danger btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>
            </div> -->
        </div>
    </div>
</div>


<script>
  
  $('#contentAdmin').css('display', 'none');
  $('#contentRec').css('display', 'none');
  $('#nuevosRB').hide();

  $(document).ready(function(){

    $('#videoCV').attr('src', '');
    $('#contentAdmin').css('display', 'none');
    $('#contentRec').css('display', 'none');
    cargaContent();
    actualiza();

  });

  function AddZero(valor){
    if(valor<10) return "0"+valor
    else return valor;
  }

  function actualiza(){
    var now = new Date();
    var strDateTime = [[AddZero(now.getDate()), 
        AddZero(now.getMonth() + 1), 
        now.getFullYear()].join("/"), 
        [AddZero(now.getHours()), 
        AddZero(now.getMinutes())].join(":"), 
        now.getHours() >= 12 ? "PM" : "AM"].join(" ");
    $('#actual').html("Última actualización: " + strDateTime);
  }

  function cargaContent(){
    
    if(tipoDeUsuario=="AR" || tipoDeUsuario=="A"){
      
      $('#contentAdmin').css('display', 'block');
      $('#contentRec').css('display', 'none');

      $('#miTablaAsignaciones').dataTable({

        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "autoDestroy": true,

        "columnDefs": [
          { className: "miclaseHead", "targets": [0,1,2,3,4,5,6,7,8,9,10,11,12] },
          // {"width": "10%", "targets": [1,2,4] },
          {
            "targets": [0],
            "visible": false,
            "searchable": false
          },
          {
            "targets": [1],
            "visible": true,
            "searchable": true
          },
          {
            "targets": [2],
            "visible": true,
            "orderable": true
          },
          {
            "targets": [3],
            "visible": true,
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [4],
            "visible": true,
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [5],
            "orderable": true,
            "searchable": true,
            "autoWidth": true
          },
          {
            "targets": [6],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [7],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [8],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [9],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [10],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [11],
            "orderable": true,
            "searchable": true
          },
          {
            "targets": [12],
            "orderable": false,
            "searchable": false
          }           
        ],

        "ajax": {
          url: "controllers/rdataAsignaciones.php?",
          "data": {
            "idU": idUsuario,
            "tiU": tipoDeUsuario
          },
          dataSrc: 'data'
        },

        "bDeferRender": true,

        "columns": [
          {"data": "id"},
          {"data": "puesto"},
          {"data": "cliente"},
          {"data": "vacantes"},
          {"data": "postulaciones"},
          {"data": "cubiertas"},
          {"data": "porcentaje"},
          {"data": "reclutador"},
          {"data": "status"},
          {"data": "asignado"},
          {"data": "visto"},
          {"data": "cumplido"},
          {"data": "editar"}
        ],
        "language": {
          "url": "controllers/dataTablesAsignaciones.json"
        },
        "rowCallback": function(row, data, index) {
          if (data.porcentaje == 100.00) {
            $(row).addClass('success');
          }
        }
      });

      var laTableB = $('#miTablaAsignaciones').DataTable();
      var order = laTableB.order();


      setInterval( function () {
        var laTable = $('#miTablaAsignaciones').DataTable();
        laTable.ajax.reload(null, false);
        actualiza();
      }, 120000);

      laTableB.order([8, 'dsc'], [6, 'dsc']).draw();

    }else{

      $('#contentAdmin').css('display', 'none');
      $('#contentRec').css('display', 'block');

      $('#miTablaAsignacionesO').dataTable({

        "autoWidth": true,
        "responsive": true,
        "processing": true,
        "autoDestroy": true,

        "columnDefs": [
          { className: "miclaseHead", "targets": [3,5,6,7,8,9] },
          // {"width": "10%", "targets": [1,2,4] },
          {
            "targets": [0],
            "visible": false,
            "searchable": false
          },
          {
            "targets": [1],
            "visible": true,
            "searchable": true
          },
          {
            "targets": [2],
            "visible": true,
            "orderable": false
          },
          {
            "targets": [3],
            "visible": true,
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [4],
            "visible": true,
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [5],
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [6],
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [7],
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [8],
            "orderable": false,
            "searchable": false
          },
          {
            "targets": [9],
            "orderable": true,
            "searchable": false,
            "visible": false
          }
        ],

        "ajax": {
          url: "controllers/rdataAsignaciones.php?",
          "data": {
            "idU": idUsuario,
            "tiU": tipoDeUsuario
          },
          dataSrc: 'data'
        },

        "bDeferRender": true,

        "columns": [
          {"data": "id"},
          {"data": "puesto"},
          {"data": "cliente"},
          {"data": "sueldoneto"},
          {"data": "direcciontrabajo"},
          {"data": "prioridad"},
          {"data": "status"},
          {"data": "detalles"},
          {"data": "asignar"},
          {"data": "valor"}
        ],
        "language": {
          "url": "controllers/dataTablesAsignaciones.json"
        }

      });

      var laTableB = $('#miTablaAsignacionesO').DataTable();
      var order = laTableB.order();


      setInterval( function () {
        var laTable = $('#miTablaAsignacionesO').DataTable();
        laTable.ajax.reload(null, false);
        actualiza();
      }, 30000);

      laTableB.order([9,'dsc'],[6, 'asc']).draw();

    }

  }

  function do_resize(textbox) {

    var maxrows=15; 
    var txt=textbox.value;
    var cols=textbox.cols;

    var arraytxt=txt.split('\n');
    var rows=arraytxt.length; 

    for (i=0;i<arraytxt.length;i++) 
      rows+=parseInt(arraytxt[i].length/cols);

     if (rows>maxrows) textbox.rows=maxrows;
      else textbox.rows=rows;
   }

  function detalles(detalles){

    $("#modalDetalles .modal-header #requi").html(detalles[0].id);
    $("#modalDetalles .modal-body #perfil").val(detalles[0].puesto);
    $("#modalDetalles .modal-body #cliente").val(detalles[0].cliente);
    $("#modalDetalles .modal-body #direccion").val(detalles[0].direcciontrabajo);
    $("#modalDetalles .modal-body #prioridad").val(detalles[0].prioridad);
    $("#modalDetalles .modal-body #sueldo").val(detalles[0].sueldoneto);
    $("#modalDetalles .modal-body #fecha").val(detalles[0].creado);
    $("#modalDetalles .modal-body #duracion").val(detalles[0].duracion);
    $("#modalDetalles .modal-body #ingles").val(detalles[0].ingles);
    $("#modalDetalles .modal-body #numvacantes").val(detalles[0].vacantes);

    $("#modalDetalles .modal-body #objetivo").val(detalles[0].objetivo);
    do_resize(document.getElementById("objetivo"));
    $("#modalDetalles .modal-body #responsabilidades").val(detalles[0].responsabilidades);
    do_resize(document.getElementById("responsabilidades"));
    $("#modalDetalles .modal-body #conocimientos").val(detalles[0].conocimientos);
    do_resize(document.getElementById("conocimientos"));
    $("#modalDetalles .modal-body #cursos").val(detalles[0].cursos);
    do_resize(document.getElementById("cursos"));
    $("#modalDetalles .modal-body #tecnologias").val(detalles[0].tecnologias);
    do_resize(document.getElementById("tecnologias"));
    $("#modalDetalles .modal-header #elHeaderConNombre").html(detalles[0].puesto+" para "+detalles[0].cliente);

    $('#modalDetalles').modal('show');

  }

  // function asignar(asigna){

  //   $('.sweet-alert .has-error .sa-input-error').css('display','none');

  //   swal({
  //     title: "Asignando requerimiento!",
  //     text: "Escribe un comentario:",
  //     type: "input",
  //     showCancelButton: true,
  //     closeOnConfirm: false,
  //     inputPlaceholder: "Comentarios"
  //   }, function (inputValue) {
  //     if (inputValue === false) return false;
  //     if (inputValue === "") {
  //       swal.showInputError("Debes escribir un comentario!");
  //       $('.sweet-alert .has-error .sa-input-error').css('display','block');
  //       return false;
  //     }else{
        
  //       $.ajax({
  //         type: 'POST',
  //         url: 'controllers/insAsignacion.php',
  //         data: {
  //           'idReq': asigna[0].idReq,
  //           'idRec' : asigna[0].idRec,
  //           'coment': inputValue,
  //           'action' : 'INS'
  //         },

  //         success: function (response) {

  //           if (response.info[0].success) {

  //             var miTable = $('#miTablaAsignaciones').DataTable();
  //             miTable.ajax.reload(null, false);

  //             swal("Bien!", "Diste el siguiente comentario: \"" + inputValue + "\", asignación exitosa", "success");

  //             $('#elmensajeDel').slideDown('1000', function() {
  //               $('#elmensajeDel').slideUp('2000', function() {
                  
  //               }).delay(750);
  //             }).delay(750);

  //           }
  //           else{
  //             swal({
  //               title: "Error",
  //               text: "Ocurrio un error, por favor intentelo nuevamente!",
  //               type: "danger",
  //               showCancelButton: true,
  //               confirmButtonClass: "btn-danger",
  //               confirmButtonText: "Aceptar",
  //               closeOnConfirm: true
  //             });
  //           }
  //         }
  //       });
  //       return false;
  //     }
  //   });

  //   $('.sweet-alert .has-error .sa-input-error').css('display','none');
  // }

  function postular(detalles){

    $("#modalPostular .modal-header #elHeaderConNombre").html("Postulación / "+detalles[0].puesto);
    $("#modalPostular .modal-body #perfilF").html("Recursos para: "+detalles[0].puesto);
    $("#modalPostular .modal-body #elReq").html(detalles[0].id);
    $('#tabsPostulaciones a:first').tab('show');
    // panelCat
    
    cargarFR(detalles[0].id, detalles[0].puesto);

    setTimeout(function(){
      cargarRecursos();
    }, 2000);

    $('#nuevosR').val('');
    $('#nuevosRB').hide();
    $('#modalPostular').modal('show');
  }

  function cargarFR(req, puesto){

    var element = document.getElementById("posV");
    while (element.firstChild) {
      element.removeChild(element.firstChild);
    }

    var perfilesHTML ="";
    var cuantosP = 0;
    var elValor = 0;

    perfilesHTML = perfilesHTML + "<option value='0'> Todos </option>";

    $.ajax({

      type: 'POST',
      url: 'controllers/rdataFiltros.php',
      data: {'req': req},

      success: function (response) {

        if (response.info[0].success) {

          for(var i=0; i<response.perfiles.length; i++){

            if(response.perfiles[i].perfil==puesto){
              perfilesHTML = perfilesHTML + "<option selected='selected' value="+response.perfiles[i].id+">"+response.perfiles[i].perfil+"</option>";

              elValor = response.perfiles[i].id;              

            }else{
              perfilesHTML = perfilesHTML + "<option value="+response.perfiles[i].id+">"+response.perfiles[i].perfil+"</option>";
            }

          }

        }else{
          perfilesHTML="";
        }         

        $("#posV").append(perfilesHTML);
      }
    });

    $('#posV').val(elValor);
    
  }

  function cargarRecursos(){

    var table = $('#miTablaPos').DataTable();
    table.destroy();

    var idP = $('#posV').val();
    var idRequerimiento = $('#elReq').html();
    var mensaje = $("#posV option:selected").text();

    if(idP==0)  $("#modalPostular .modal-body #perfilF").html("Recursos para: Todos los perfiles");
    else $("#modalPostular .modal-body #perfilF").html("Recursos para: " + mensaje);

    $('#miTablaPos').dataTable({

      "destroy": true,
      "autoWidth": true,
      "responsive": true,
      "processing": true,

      "columnDefs": [
        { className: "miclaseHead", "targets": [0,1,2,3,4,5,6] },
        // {"width": "10%", "targets": [1,2,4] },
        {
          "targets": [0],
          "visible": false,
          "searchable": false
        },
        {
          "targets": [1],
          "visible": true,
          "searchable": true
        },
        {
          "targets": [2],
          "visible": true,
          "orderable": true
        },
        {
          "targets": [3],
          "visible": true,
          "orderable": true,
          "searchable": true
        },
        {
          "targets": [4],
          "visible": true,
          "orderable": true,
          "searchable": true
        },
        {
          "targets": [5],
          "orderable": true,
          "searchable": true,
          "autoWidth": true
        },
        {
          "targets": [6],
          "orderable": true,
          "searchable": true,
          "autoWidth": true
        }        
      ],

      "ajax": {
        url: "controllers/rdataRecursos.php?",
        "data": {
          "idP": idP,
          "idR": idRequerimiento
        },
        dataSrc: 'data'
      },

      "bDeferRender": true,

      "columns": [
        {"data": "id"},
        {"data": "perfil"},
        {"data": "recurso"},
        {"data": "detalle"},
        {"data": "cv"},
        {"data": "video"},
        {"data": "postular"}
      ],
      "language": {
        "url": "controllers/dataTablesRecursos.json"
      }
    });

    var laTableB = $('#miTablaPos').DataTable();
    var order = laTableB.order();

    laTableB.order([2, 'dsc'], [3, 'dsc']).draw();
  }

  function verVideo(detalles){
    // $("#modalPostular .modal-header #elHeaderConNombre").html("Postulación / "+detalles[0].puesto);

    $('#videoCV').attr('src', 'views/modules/src/videos/'+detalles[0].video);
    // $('#calendar').attr('src', loc);

    $('#modalVideo').modal('show');
  }

  $('#modalVideo').on('hidden.bs.modal', function (e) {
    $('#videoCV').attr('src', '');
    
    if($('#modalPostular').hasClass('show')) {
      $('body').addClass('modal-open');
    }
  });

  function justMails(e){

    var str = $('#nuevosR').val();
    var num = str.split('@').length-1;

    if($('#nuevosR').val()!="" && $('#nuevosRD').val().length==1){
      $('#nuevosRB').show();
    }else if (num==1) {
      $('#nuevosRB').show();      
    }
    else{
      $('#nuevosRB').hide();
    }

    var keynum = window.event ? window.event.keyCode : e.which;
     
    return keynum;
  }

  function postularCandidato(detalles){

    var estaOk = true;

    var str = $('#nuevosR').val();
    var num = str.split('@').length-1;

    var idReq = $('#elReq').html();
    var idRec = 0;
    var recNu = "";
    var delim = "";
    var action = "";

    if($('#panelCat').hasClass('show')){
      idRec= detalles[0].id;
      action = "REC";

    }else{      

      if($('#nuevosR').val()!="" && $('#nuevosRD').val().length==1){
        recNu = $('#nuevosR').val();
        delim = $('#nuevosRD').val();
        action = "NUE";

      }else if(num==1) {
        recNu = $('#nuevosR').val();
        action = "NU1";

      }else{
        estaOK = false;
          showError('Debe completar los registros correctamente');
          $('#modalPostular .modal-body #nuevosRD').focus();
          e.preventDefault();
          return false;
      }
    }

    if(estaOk){

      $("#modalPostular .modal-footer #mensajeInfoU").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>  Procesando datos!...');

      $.ajax({

        type: 'POST',
        url: 'controllers/guardaPostulacion.php',
        data: {
          'idReq': idReq,
          'idRec': idRec,
          'recNu': recNu, 
          'action': action,
          'delim': delim
        },

        success: function (response) {
          if (response.info[0].success) {

            $("#modalPostular .modal-footer #mensajeInfoU").html('&nbsp;');

            $('#nuevosR').val('');
            $('#nuevosRD').val('');       
            $('#nuevosRB').hide();

            var miTable = $('#miTablaPos').DataTable();
            miTable.ajax.reload(null, false);

            $('#tabsPostulaciones a:first').tab('show');

            showMessage('Postulación exitosa!');

          }else{
            $("#modalPostular .modal-footer #mensajeInfoU").html('&nbsp;');
            showError('Error al guardar los datos, intentelo nuevamente!')

          }
        }
      });
      return false;
    }
  }

  function asignar(asigna){

    // console.log("-----------------------------");
    // console.log("id requerimiento: "+asigna[0].idReq);
    // console.log("puesto: "+asigna[0].puesto);
    // console.log("id nuevo reclutador: "+asigna[0].idRec);
    // console.log("nombre nuevo reclutador: "+asigna[0].reclutador);
    // console.log("reclutador anterior: "+asigna[0].reclutadorAnterior);    
      
    $.ajax({
      type: 'POST',
      url: 'controllers/insAsignacion.php',
      data: {
        'idReq': asigna[0].idReq,
        'idRec' : asigna[0].idRec,
        'idRecAnterior': asigna[0].reclutadorAnterior,
        'action': 'REA'
      },

      success: function (response) {

        if (response.info[0].success) {

          var miTable = $('#miTablaAsignaciones').DataTable();
          miTable.ajax.reload(null, false);

          if(asigna[0].idRec == -1) showMessage('Proceso de desasignación exitoso');
          else if(asigna[0].idRec == 0) showMessage('El requerimiento '+asigna[0].puesto+' se asigno de manera exitosa a todos los reclutadores');
          else showMessage('El requerimiento '+asigna[0].puesto+' se asigno de manera exitosa a '+asigna[0].reclutador);

        }
        else showError("Ocurrio un error, por favor intentelo nuevamente!");
      }
    });
    return false;
      
  }

</script>