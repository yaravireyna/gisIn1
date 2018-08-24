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
    <li class="breadcrumb-item active">Candidatos</li>
  </ol>

  <div class="row">
    <div class="card mb-3 col-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card-header d-flex align-items-center">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-6 float-left d-flex align-items-center"><i class="material-icons">perm_contact_calendar</i> Catálogo de Candidatos</div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="contentAdmin" class="table-responsive">
          <table id="tablaCandidatos" class="display table table-striped table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
								<th>Id</th>
								<th>Cliente</th>
								<th>Perfil</th>
								<th>Nombre</th>
                <th>Correo</th>
								<th>CV</th>
                <th>Video</th>
                <th>Activo</th>
								<th>Postulado</th>
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

<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-0 p-0">
                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe id="videoCV" class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
		actualiza();

		$('#tablaCandidatos').dataTable({
		"autoWidth": true,
		"responsive": true,
		"processing": true,

		"columnDefs": [
			{ className: "miclaseHead", "targets": [5,6,7,8,9] },
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
			"orderable": true
			},
			{
			"targets": [4],
			"visible": true,
			"orderable": true
			
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
			"orderable": false,
			"searchable": false
			}
		],

		"ajax": {
			url: "controllers/rdataCandidatos.php?",
			"data": {
			"param": 0
			},
			dataSrc: 'data'
		},

		"bDeferRender": true,

		"columns": [
			{"data": "id"},
			{"data": "cliente"},
			{"data": "perfil"},
			{"data": "nombre"},
			{"data": "email"},
			{"data": "archivo"},
			{"data": "video"},
			{"data": "statusCV"},
			{"data": "statusPos"},
			{"data": "editar"}
		],
		"language": {
			"url": "controllers/dataTablesUsuarios.json"
		}
	});

	var laTableB = $('#tablaUsuarios').DataTable();
    var order = laTableB.order();

    setInterval( function () {
      var laTable = $('#tablaUsuarios').DataTable();
      laTable.ajax.reload(null, false);
      actualiza();
    }, 60000);

    laTableB.order([1,'asc'], [2,'asc'], [3,'asc']).draw();
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

	function verVideo(detalles){
    $('#videoCV').attr('src', 'views/modules/src/videos/'+detalles[0].video);
    $('#modalVideo').modal('show');
  }
	$('#modalVideo').on('hidden.bs.modal', function (e) {
    $('#videoCV').attr('src', '');
	});

</script>