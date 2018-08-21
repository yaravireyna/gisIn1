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
    <li class="breadcrumb-item active">Perfiles</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header d-flex align-items-center">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-6 float-left"><i class="fas fa-users"></i> Catalogo de Perfiles</div>
            <div class="col-6 float-right"><span class="d-flex align-items-center" style="cursor: pointer;" title="Agregar perfil" onclick="agregaPerfil();"><i class="material-icons">note_add</i> Nuevo perfil</span> </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="tablaPerfiles" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Perfil</th>
                <th>Cliente</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Status</th>
                <th>Editar</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
       <div class="card-footer small text-muted"><p id="actual"></p></div>
    </div>
  </div>
</div>

<div id="modalPerfiles" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success text-center w-100">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
        <div><i class="material-icons text-white" style="font-size: 2.5rem;">assignment_ind</i> <p class="in-line display-5" id="elHeaderConNombre" style="color:#fff;"> </p></div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12"><br></div>
        </div>
        <p style="visibility:hidden; display:none;" id="idPerfil"></p>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Perfil</b></span>
          </div>
          <input type="text" class="form-control" id="perfil" aria-describedby="basic-addon3">
        </div>

        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Cliente</b></span>
          </div>
          <select name="cliente" id="cliente" class="form-control"></select>
        </div>

      </div>
      <div class="modal-footer text-justify">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnUpd" class="btn btn-success" onclick="updatePerfil();">Actualizar</button>
        <button type="button" id="btnIns" class="btn btn-success" onclick="insertaPerfil();">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    actualiza();

    cargaClientes();
    $('#cliente').val("0");

    $('#tablaPerfiles').dataTable({
      "autoWidth": true,
      "responsive": true,
      "processing": true,

      "columnDefs": [
        { className: "miclaseHead", "targets": [3,5,6] },
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
          "searchable": false
        },
        {
          "targets": [4],
          "visible": true,
          "orderable": true,
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
        }
      ],

      "ajax": {
        url: "controllers/rdataPerfiles.php?",
        "data": {
          "param": 0
        },
        dataSrc: 'data'
      },

      "bDeferRender": true,

      "columns": [
        {"data": "id"},
        {"data": "perfil"},
        {"data": "cliente"},
        {"data": "creado"},
        {"data": "actualizado"},
        {"data": "status"},
        {"data": "editar"}
      ],
      "language": {
        "url": "controllers/dataTablesPerfiles.json"
      }

    });

    var laTableB = $('#tablaPerfiles').DataTable();
    var order = laTableB.order();


    setInterval( function () {
      var laTable = $('#tablaPerfiles').DataTable();
      laTable.ajax.reload(null, false);
      actualiza();
    }, 60000);

    laTableB.order([2,'dsc'],[3, 'asc']).draw();

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

  function cargaClientes(){

    var element = document.getElementById("cliente");
    while (element.firstChild) {
      element.removeChild(element.firstChild);
    }

    var clientesHTML ="";

    $.ajax({

      type: 'POST',
      url: 'controllers/rdataClientes.php',

      success: function (response) {

        if (response.info[0].success) {

          for(var i=0; i<response.clientes.length; i++){
            clientesHTML = clientesHTML + "<option value="+response.clientes[i].id+">"+response.clientes[i].nombre+"</option>";         
          }

        }       

        $("#cliente").append(clientesHTML);
      }
    });
    return false;
  }

  $('#modalPerfiles').on('hidden.bs.modal', function (e) {
    $('#cliente').val("0");
  });

  function agregaPerfil(){
    $('#elHeaderConNombre').html('Agregar perfil');
    $('#idPerfil').html('');
    $('#perfil').val('');
    $('#cliente').val('0');
    $('#btnUpd').hide();
    $('#btnIns').show();  

    $('#modalPerfiles').modal('show');
  }

  function modificar(detalles){

    $('#elHeaderConNombre').html('Editar ' + detalles[0].perfil);
    $('#idPerfil').html(detalles[0].id);
    $('#perfil').val(detalles[0].perfil);
    $('#cliente').val(detalles[0].idCliente);
    $('#btnUpd').show();
    $('#btnIns').hide();     

    $('#modalPerfiles').modal('show');

  }

  function insertaPerfil(){
    var ok = true;

    var idPerf = $('#idPerfil').html();
    var perfil = $('#perfil').val();
    var cliente = $('#cliente').val();

    if(perfil==""){
      ok=false;
      showInfo("Complete el título para el perfil");
      $('#perfil').focus();
      e.defaultPrevent();
    }

    if(cliente=="" || cliente==0 || cliente=='0' || cliente==null){
      ok=false;
      showInfo("Por favor, agregue un cliente al perfil");
      $('#cliente').focus();
      e.defaultPrevent();
    }

    if(ok){
      $.ajax({
        type: 'POST',
        url: 'controllers/insPerfil.php',
        data: {
          'id': 0,
          'perfil': perfil,
          'cliente': cliente,
          'action' : 'INS'
        },

        success: function (response) {

          if (response.info[0].success) {

            var miTable = $('#tablaPerfiles').DataTable();
            miTable.ajax.reload(null, false);

            $('#cliente').val('0');

            showMessage("El perfil "+perfil+" se agrego exitosamente!");
            $('#modalPerfiles').modal('hide');

          }else if(response.info[0].error=='EXISTE'){
            showInfo("Ya existe el perfil "+perfil+" asignado a este cliente!");
          }else showError("Ocurrio un error. Intentalo nuevamente");
        }
      });
      return false;
    }
  }

  function updatePerfil(){

    var ok = true;

    var idPerf = $('#idPerfil').html();
    var perfil = $('#perfil').val();
    var cliente = $('#cliente').val();

    if(perfil==""){
      ok=false;
      showInfo("Complete el título para el perfil");
      $('#perfil').focus();
      e.defaultPrevent();
    }

    if(ok){
      $.ajax({
        type: 'POST',
        url: 'controllers/insPerfil.php',
        data: {
          'id': idPerf,
          'perfil': perfil,
          'cliente': cliente,
          'action' : 'UPD'
        },

        success: function (response) {

          if (response.info[0].success) {

            var miTable = $('#tablaPerfiles').DataTable();
            miTable.ajax.reload(null, false);

            showMessage("El perfil "+perfil+" se actualizó exitosamente!");
            $('#modalPerfiles').modal('hide');

          }else if(response.info[0].error=='EXISTE'){
            showInfo("Ya existe el perfil "+perfil+" asignado a este cliente!");
          }else showError("Ocurrio un error. Intentalo nuevamente");
        }
      });
      return false;
    }
  }

  function deshabilitar(detalles){

    var hab ="";
    var hab2 ="";

    if(detalles[0].status==1){
      hab = "deshabilitar";
      hab2 = "deshabilitado"
    }else{
      hab = "habilitar";
      hab2 = "habilitado";
    }

    swal({
      title: "Realmente deseas " + hab + " el perfil \""+detalles[0].perfil+"\"?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        
        $.ajax({
          type: 'POST',
          url: 'controllers/insPerfil.php',
          data: {
            'id': detalles[0].id,
            'status': detalles[0].status,
            'action' : 'DES'
          },

          success: function (response) {

            if (response.info[0].success) {

              var miTable = $('#tablaPerfiles').DataTable();
              miTable.ajax.reload(null, false);

              var message = "El perfil \"" + detalles[0].perfil + "\", ha sido " + hab2;
              showMessage(message);

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

      } else {
        showInfo("Operación cancelada");
      }
    });

  }

</script>