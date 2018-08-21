<?php

  session_start();

  if(isset($_SESSION['idUser'], $_SESSION["tipoUser"])){

    $idUsuario = $_SESSION['idUserU'];
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
    <li class="breadcrumb-item active">Últimas Actualizaciones</li>
  </ol>
  
  <!-- Icon Cards-->
  <div class="row">

    <div id="not_citas" class="col-md-6 col-xl-3 col-sm-6 mb-3 animated bounce">
      <div class="card o-hidden h-100">
        <div class="card-body bg-cita">
          <div class="card-body-icon">
            <i class="text-citaf far fa-clock"></i>
          </div>
          <div class="mr-5 card-notification text-white"><p id="noCit"></p></div>
          <div class="mr-5 card-notification-sub text-white"><p id="noCitM"></p></div>
        </div>
        <a id="not_citas_a" class="card-footer bg-citaf text-white clearfix small z-1 text-center d-flex align-items-center justify-content-center" href="">
          <span class="det">Ver Detalles</span>
          <span class="principal">
            <i class="fas fa-arrow-alt-circle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div id="not_requerimientos" class="col-md-6 col-xl-3 col-sm-6 mb-3 animated bounce">
      <div class="card o-hidden h-100">
        <div class="card-body bg-req">
          <div class="card-body-icon">
            <i class="text-reqf fas fa-file-contract"></i>
          </div>
          <div class="mr-5 card-notification text-white"><p id="noReq"></p></div>
          <div class="mr-5 card-notification-sub text-white"><p id="noReqM"></p></div>
        </div>
        <a id="not_requerimientos_a" class="card-footer bg-reqf text-white clearfix small z-1 text-center d-flex align-items-center justify-content-center" href="">
          <span class="det">Ver Detalles</span>
          <span class="principal">
            <i class="fas fa-arrow-alt-circle-right"></i>
          </span>
        </a>
      </div>
    </div>

    <div id="not_postulaciones" class="col-md-6 col-xl-3 col-sm-6 mb-3 animated bounce">     
      <div class="card o-hidden h-100">
        <div class="card-body bg-post">
          <div class="card-body-icon">
            <i class="text-postf fas fa-chalkboard-teacher"></i>
          </div>
          <div class="mr-5 card-notification text-white"><p id="noPos"></p></div>
          <div class="mr-5 card-notification-sub text-white"><p id="noPosM"></p></div>
        </div>
        <a id="not_postulaciones_a" class="card-footer bg-postf text-white clearfix small z-1 text-center d-flex align-items-center justify-content-center" href="">
          <span class="det">Ver Detalles</span>
          <span class="principal">
            <i class="fas fa-arrow-alt-circle-right"></i>
          </span>
        </a>
      </div>      
    </div>

    <div id="not_vacantes" class="col-md-6 col-xl-3 col-sm-6 mb-3 animated bounce">
      <div class="card o-hidden h-100">
        <div class="card-body bg-ratio">
          <div class="card-body-icon">
            <i class="text-ratiof fas fa-chart-pie"></i>
          </div>
          <div class="mr-5 card-notification text-white"><p id="noVac"></p></div>
          <div class="mr-5 card-notification-sub text-white"><p id="noVacM"></p></div>
        </div>
        <a id="not_vacantes_a" class="card-footer bg-ratiof text-white clearfix small z-1 text-center d-flex align-items-center justify-content-center" href="">
          <span class="det">Ver Detalles</span>
          <span class="principal">
            <i class="fas fa-arrow-alt-circle-right"></i>
          </span>
        </a>
      </div>
    </div>    

  </div>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-area-chart"></i> Grafica de Area</div>
    <div class="card-body">
      <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Ultima actualizacion a las 11:09 am</div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <!-- Example Bar Chart Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i> Grafica de Barras</div>
        <div class="card-body">
          <canvas id="myBarChart" width="100" height="50"></canvas>
        </div>
        <div class="card-footer small text-muted">Ultima actualizacion a las 11:09 am</div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Example Pie Chart Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-pie-chart"></i> Grafica de pay</div>
        <div class="card-body">
          <canvas id="myPieChart" width="100%" height="100"></canvas>
        </div>
        <div class="card-footer small text-muted">Ultima actualizacion a las 11:09 am</div>
      </div>
    </div>
  </div>
  
  
</div>

<script>

  $('#not_citas').hide();
  $('#not_requerimientos').hide();
  $('#not_postulaciones').hide();
  $('#not_vacantes').hide();

  $(document).ready(function(){
    cargaNotificaciones();
  });

  setInterval( function () {
    cargaNotificaciones();
  }, 5000);

  function cargaNotificaciones(){

    if(tipoDeUsuario=="A" || tipoDeUsuario=="AR"){
      $('#not_citas_a').attr('href', "index.php?action=reportes");
      $('#not_requerimientos_a').attr('href', "index.php?action=asignar");
      $('#not_postulaciones_a').attr('href', "index.php?action=track_user");
      $('#not_vacantes_a').attr('href', "index.php?action=asignaciones");      
    }else{
      $('#not_citas_a').attr('href', "index.php?action=reportes");
      $('#not_requerimientos_a').attr('href', "index.php?action=asignaciones");
      $('#not_postulaciones_a').attr('href', "index.php?action=track_user");
      $('#not_vacantes_a').attr('href', "index.php?action=track_vacante"); 
    }

    var noCit = $('#noCit').html();
    if(noCit=="" || noCit==0)  noCit=0;
    else  parseFloat(noCit);

    var noReq = $('#noReq').html();
    if(noReq=="" || noReq==0)  noReq=0;
    else  parseFloat(noReq);

    var noPos = $('#noPos').html();
    if(noPos=="" || noPos==0)  noPos=0;
    else  parseFloat(noPos);

    var noVac = $('#noVac').html();
    if(noVac=="" || noVac==0)  noVac=0;
    else  parseFloat(noVac);

    $.ajax({

      type: 'POST',
      url: 'controllers/rdataNot.php',
      data: 0,

      success: function (response) {

        if (response.info[0].success) {
          
          var noCitN = response.data[0].noCitN;
          noCitN = parseFloat(noCitN);

          var noReqN = response.data[0].noReqN;
          noReqN = parseFloat(noReqN);

          var noPosN = response.data[0].noPosN;
          noPosN = parseFloat(noPosN);

          var noVacN = response.data[0].noVacN;
          noVacN = parseFloat(noVacN);

          if(noCit!=noCitN){
            if (noCitN==0) {
              $('#noCit').html(noCitN);
              $('#not_citas').hide("slow");            
            }else{
              $('#noCit').html(noCitN);
              $('#not_citas').show("slow");
              if(noCitN==1) $('#noCitM').html('Cita Programada');
              else $('#noCitM').html('Citas Programadas');
            }
          }

          if(noReq!=noReqN){
            if (noReqN==0) {
              $('#noReq').html(noReqN);
              $('#not_requerimientos').hide("slow");            
            }else{
              $('#noReq').html(noReqN);
              $('#not_requerimientos').show("slow");
              if(noReqN==1) $('#noReqM').html('Nuevo Requerimiento');
              else $('#noReqM').html('Nuevos Requerimientos');
            }
          }

          if(noPos!=noPosN){
            if (noPosN==0) {
              $('#noPos').html(noPosN);
              $('#not_postulaciones').hide("slow");            
            }else{
              $('#noPos').html(noPosN);
              $('#not_postulaciones').show("slow");
              if(noPosN==1) $('#noPosM').html('Postulacion');
              else $('#noPosM').html('Postulaciones');
            }
          }

          if(noVac!=noVacN){
            if (noVacN==0) {
              $('#noVac').html(noVacN);
              $('#not_vacantes').hide("slow");            
            }else{
              $('#noVac').html(noVacN);
              $('#not_vacantes').show("slow");
              if(noVacN==1) $('#noVacM').html('Vacante cubierta');
              else $('#noVacM').html('Vacantes cubiertas');
            }
          }

        } 
      }
    });

  }
  
</script>