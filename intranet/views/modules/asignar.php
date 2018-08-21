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
      <a href="index.php?action=asignar">Asignaciones</a>
    </li>
    <li class="breadcrumb-item active">Asignar</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header">
        <i class="fas fa-diagnoses"></i> Asignar
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="miTablaAsignaciones" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
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
                <th>Asignar</th>
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

        <ul id="tabsAsignar" class="nav nav-tabs nav-justified">
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

<script>
  $(document).ready(function(){

    actualiza();

    $('#miTablaAsignaciones').dataTable({
      "autoWidth": true,
      "responsive": true,
      "processing": true,

      "columnDefs": [
        { className: "miclaseHead", "targets": [3,5,6,7,8] },
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
        url: "controllers/rdataReq.php?",
        "data": {
          "param": 0
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
        "url": "controllers/dataTablesRequerimientos.json"
      }

    });

    var laTableB = $('#miTablaAsignaciones').DataTable();
    var order = laTableB.order();


    setInterval( function () {
      var laTable = $('#miTablaAsignaciones').DataTable();
      laTable.ajax.reload(null, false);
      actualiza();
    }, 60000);

    laTableB.order([9,'dsc'],[6, 'asc']).draw();

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

    $('#tabsAsignar a:first').tab('show');

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
    // $("#modalDetalles .modal-header #elHeaderConNombre").html("<b>"+detalles[0].puesto+"</b> para <b>"+detalles[0].cliente+"</b>");

    $('#modalDetalles').modal('show');

  }

  function asignar(asigna){

    $('.sweet-alert .has-error .sa-input-error').css('display','none');

    swal({
      title: "Asignando requerimiento!",
      text: "Escribe un comentario:",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      inputPlaceholder: "Comentarios"
    }, function (inputValue) {
      if (inputValue === false) return false;
      if (inputValue === "") {
        swal.showInputError("Debes escribir un comentario!");
        $('.sweet-alert .has-error .sa-input-error').css('display','block');
        return false;
      }else{
        console.log('entra al ajax');
        $.ajax({
          type: 'POST',
          url: 'controllers/insAsignacion.php',
          data: {
            'idReq': asigna[0].idReq,
            'idRec' : asigna[0].idRec,
            'coment': inputValue,
            'action' : 'INS'
          },

          success: function (response) {

            if (response.info[0].success) {

              var miTable = $('#miTablaAsignaciones').DataTable();
              miTable.ajax.reload(null, false);
              var message = "Diste el siguiente comentario: \"" + inputValue + "\", asignación exitosa";
              swal("Bien!", message, "success");

              $('#elmensajeDel').slideDown('1000', function() {
                $('#elmensajeDel').slideUp('2000', function() {
                  
                }).delay(750);
              }).delay(750);

            }
            else{
              swal({
                title: "Error",
                text: "Ocurrio un error, por favor intentelo nuevamente!",
                type: "danger",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Aceptar",
                closeOnConfirm: true
              });

              // swal("Error!", "Intentalo nuevamente", "Danger");

            }

          }
        });
        return false;
      }
    });

    $('.sweet-alert .has-error .sa-input-error').css('display','none');
  }


</script>