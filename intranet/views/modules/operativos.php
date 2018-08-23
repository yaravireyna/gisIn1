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
      <a href="index.php?action=inicio">Administración 1</a>
    </li>
    <li class="breadcrumb-item">
      <a href="index.php?action=operativos">Usuarios</a>
    </li>
    <li class="breadcrumb-item active">Operativos</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header d-flex align-items-center">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-6 float-left d-flex align-items-center"><i class="material-icons">perm_contact_calendar</i> Catalogo de Usuarios</div>
            <div class="col-6 float-right"><span class="d-flex align-items-center" style="cursor: pointer;" title="Agregar perfil" onclick="agregaUsu();"><i class="material-icons">person_add</i> Nuevo usuario</span> </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="tablaUsuarios" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
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

<div id="modalUsuarios" class="modal fade" role="dialog">
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
        <p style="visibility:hidden; display:none;" id="idUsuario"></p>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Nombre</b></span>
          </div>
          <input type="text" class="form-control" id="nombreU" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Apellido paterno</b></span>
          </div>
          <input type="text" class="form-control" id="apePat" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Apellido materno</b></span>
          </div>
          <input type="text" class="form-control" id="apeMat" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Correo</b></span>
          </div>
          <input type="text" class="form-control" id="emailU" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Tipo</b></span>
          </div>
          <select name="tipo" id="tipo" class="form-control">
            <option value="A">Administrador</option>
            <option value="AR">Administrador de RH</option>
            <option value="OR">Reclutador</option>
            <option value="OA">Reclutador híbrido</option>
          </select>
       </div>
       <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Password</b></span>
          </div>
          <input type="password" class="form-control" id="pww1" aria-describedby="basic-addon3">
       </div>
       <div class="input-group mb-3 col-12">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><b>Confirma password</b></span>
          </div>
          <input type="password" class="form-control" id="pww2" aria-describedby="basic-addon3">
       </div>
       </div>
      <div class="modal-footer text-justify">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnUpdU"class="btn btn-success" onclick="updateUsuario();">Actualizar</button>
        <button type="button" id="btnInsU" class="btn btn-success" onclick="insertaUsuario();">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    actualiza();

    $('#tablaUsuarios').dataTable({
      "autoWidth": true,
      "responsive": true,
      "processing": true,

      "columnDefs": [
        { className: "miclaseHead", "targets": [3,4,5] },
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
          "orderable": false,
          "searchable": false
        },
        {
          "targets": [5],
          "orderable": false,
          "searchable": false
        }
      ],

      "ajax": {
        url: "controllers/rdataUsuarios.php?",
        "data": {
          "param": 0
        },
        dataSrc: 'data'
      },

      "bDeferRender": true,

      "columns": [
        {"data": "id"},
        {"data": "nombre"},
        {"data": "email"},
        {"data": "tipo"},
        {"data": "status"},
        {"data": "editar"}
      ],
      "language": {
        "url": "controllers/dataTablesUsuarios.json"
      }

    });

    setInterval( function () {
      var laTable = $('#tablaUsuarios').DataTable();
      laTable.ajax.reload(null, false);
      actualiza();
    }, 60000);
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

  $('#modalUsuarios').on('hidden.bs.modal', function (e) {
    $('#cliente').val("0");
  });

  function agregaUsu(){
    $('#elHeaderConNombre').html('Agregar usuario');
    $('#idUsuario').html('');
    $('#nombreU').val('');
    $('#apePat').val('');
    $('#apeMat').val('');
    $('#tipo').val('0');
    $('#emailU').val('');
    $('#pww1').val('');
    $('#pww1').val('');
    $('#btnUpdU').hide();
    $('#btnInsU').show(); 
    
    $('#modalUsuarios').modal('show');
  }
  

  function modificar(detalles){
    $('#elHeaderConNombre').html('Editar ' + detalles[0].nombre);
    $('#idUsuario').html(detalles[0].id);
    $('#nombreU').val(detalles[0].nom);
    $('#apePat').val(detalles[0].appat);
    $('#apeMat').val(detalles[0].apmat);
    $('#tipo').val(detalles[0].tipo);
    $('#emailU').val(detalles[0].email);
    $('#pww1').val(detalles[0].elpass);
    $('#pww2').val(detalles[0].elpass);
    $('#btnUpdU').show();
    $('#btnInsU').hide(); 

    $('#modalUsuarios').modal('show');

  }

  function insertaPerfil(){
    var ok = true;
    var nombre = $('#nombreU').val();
    var apeP = $('#apePat').val();
    var apeM = $('#apeMat').val();
    var tpo = $('select#tipo').val();
    var email = $('#emailU').val();
    var pass1 = $('#pww1').val();
    var pass2 = $('#pww2').val();
    
    // Se establece el campo nombre completo
    var nombreC = nombre + " " +apeP+ "" +apeM;

    if(nombre==""){
      ok=false;
      showInfo("Complete el nombre del usuario");
      $('#nombreU').focus();
      e.defaultPrevent();
    }
    if(email==""){
      ok=false;
      showInfo("Complete el correo electrónico");
      $('#emailU').focus();
      e.defaultPrevent();
    }
    if(pass1==""){
      ok=false;
      showInfo("Complete el campo de password");
      $('#pww1').focus();
      e.defaultPrevent();
    }
    if(pass2==""){
      ok=false;
      showInfo("Complete el campo de password");
      $('#pww2').focus();
      e.defaultPrevent();
    }
    if(pass1 != pass2) {
      ok= false;
      showInfo("Las contraseñas ingresadas deben coincidir");
      $('#pww1').focus();
      $('#pww2').focus();
      e.defaultPrevent();
    }

    if(ok){
      $.ajax({
        type: 'POST',
        url: 'controllers/insUsuario.php',
        data: {
          'id': 0,
          'email': email,
          'action' : 'INS'
        },

        success: function (response) {

          if (response.info[0].success) {

            var miTable = $('#tablaUsuarios').DataTable();
            miTable.ajax.reload(null, false);

            $('#cliente').val('0');

            showMessage("El usuario "+nombreC+" se agrego exitosamente!");
            $('#modalUsuarios').modal('hide');

          }else if(response.info[0].error=='EXISTE'){
            showInfo("Ya existe el usuario "+nombreC);
          }else showError("Ocurrio un error. Intentalo nuevamente");
        }
      });
      return false;
    }
  }

  function updateUsuario(){
    var ok = true;
    var id = $('#idUsuario').html();
    var nombre = $('#nombreU').val();
    var apeP = $('#apePat').val();
    var apeM = $('#apeMat').val();
    var tpo = $('select#tipo').val();
    var email = $('#emailU').val();
    var pass1 = $('#pww1').val();
    var pass2 = $('#pww2').val();    

    // Se establece el campo nombre completo
    var nombreC = nombre + " " +apeP+ "" +apeM;

    if(nombre==""){
      ok=false;
      showInfo("Complete el nombre del usuario");
      $('#nombreU').focus();
      e.defaultPrevent();
    }
    if(email==""){
      ok=false;
      showInfo("Complete el correo electrónico");
      $('#emailU').focus();
      e.defaultPrevent();
    }
    if(pass1==""){
      ok=false;
      showInfo("Complete el campo de password");
      $('#pww1').focus();
      e.defaultPrevent();
    }
    if(pass2==""){
      ok=false;
      showInfo("Complete el campo de password");
      $('#pww2').focus();
      e.defaultPrevent();
    }
    if(pass1 != pass2) {
      ok= false;
      showInfo("Las contraseñas ingresadas deben coincidir");
      $('#pww1').focus();
      $('#pww2').focus();
      e.defaultPrevent();
    }

    if(ok){
      $.ajax({
        type: 'POST',
        url: 'controllers/insUsuario.php',
        data: {
          'id': id,
          'nombre': nombre,
          'nombreC': nombreC,
          'ap': apeP,
          'am': apeM,
          'tpo': tpo,
          'em': email,
          'nvop': pass1,
          'action' : 'UPD'
        },

        success: function (response) {

          if (response.info[0].success) {

            var miTable = $('#tablaUsuarios').DataTable();
            miTable.ajax.reload(null, false);

            showMessage("El usuario"+ nombre +" se actualizó exitosamente!");
            $('#modalUsuarios').modal('hide');

          }else if(response.info[0].error=='EXISTE'){
            showInfo("Ya existe el usuario "+ nombre);
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
      title: "Realmente deseas " + hab + " el usuario \""+detalles[0].nombre+"\"?",
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
          url: 'controllers/insUsuario.php',
          data: {
            'id': detalles[0].id,
            'status': detalles[0].status,
            'action' : 'DES'
          },

          success: function (response) {

            if (response.info[0].success) {

              var miTable = $('#tablaUsuarios').DataTable();
              miTable.ajax.reload(null, false);

              var message = "El usuario \"" + detalles[0].nombre + "\", ha sido " + hab2;
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