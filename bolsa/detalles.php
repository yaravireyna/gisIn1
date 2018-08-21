<!DOCTYPE html>
<html lang="en">

<?php

  session_start();

  echo "<script type='text/javascript'> var idV = ".$_GET['vac']."; </script>";

  if(!isset($_COOKIE["eluser"])) {
  } else {
      $cookie_S = $_COOKIE["eluser"];
      $elpass_S = $_COOKIE["elpass"];
  }

  if(isset($_SESSION['idUser'], $_SESSION["tipoUser"])){

    $idUsuario = $_SESSION['idUser'];
    $tipoDeUsuario = $_SESSION['tipoUser'];
    
    echo "<script type='text/javascript'> var idUsuario = ".$idUsuario."; var tipoUsuario = '".$tipoDeUsuario."'; </script>";
  }else{
    echo "<script type='text/javascript'> var idUsuario = 0; var tipoUsuario = 'F'; </script>";
  }
?>

<head>
  <meta charset="utf-8">
  <title>Grupo IS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  
  <link href="img/IS.png" rel="icon">
  <link href="img/apple-touch-IS.png" rel="apple-touch-icon">
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Lobster" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Gugi|Lato|Open+Sans|Roboto+Condensed|Slabo+27px" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <link rel="stylesheet" href="css/infinite-slider.css">

  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">
  <!-- or -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  
  <link rel="stylesheet" href="css/styleTL.css">

  <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Bree+Serif|Crete+Round|Fjalla+One|Francois+One|Gloria+Hallelujah|Indie+Flower|Libre+Baskerville|Lobster|Noto+Serif|Pacifico|Patua+One" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment-with-locales.min.js"></script>

</head>

<body class="content_b">

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left hide">
        <!-- <a href="#hero"><img src="img/IS.png" alt="" title="" height="24px" width="24px" /></img></a> -->
        <a href="#hero"><img src="img/logoGrupoISNuevoWEB.png" alt="" title="" width="auto" height="36px" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class=""><a href="../index.php">Inicio</a></li>
          <li><a href="../index.php#facts">Conocenos</a></li>
          <li class="menu-has-children"><a href="">Servicios</a>
            <ul>
              <li><a href="../talento/">Talento</a></li>
              <li><a href="../profesionales/">Servicios profesionales</a></li>
              <li><a href="#">Servicios administrados</a></li>
              <li><a href="../asset_recovery/">Asset recovery</a></li>
            </ul>
          </li>
          <li><a href="../index.php#contact">Contactanos</a></li>
          <li class="menu-active"><a href="">Bolsa de Trabajo</a></li>
          <li><a><button type="button" class="btn btn-dark" onclick="javascript:irIntra();">Intranet</button></a></li>
        </ul>
      </nav>
    </div>
  </header>
    
  <section id="hero">    
    <div class="hero-container">      
      <h1>Bolsa de trabajo</h1>
      <a href="#facts" class="btn-get-started"><i class="fa fa-angle-down animated infinite bounce"></i></a>
    </div>
  </section>

  <main id="main">

    <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header  fadeInUp">
          <!-- <h3 class="section-title">Talento</h3> -->
          <!-- <p class="section-description wow fadeInUp">En Grupo IS tenemos la mejor oportunidad para ti. Únete a esta gran familia y forma parte de nuestro excelente equipo d e trabajo.</p> -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <section id="services">
              
              <div class="container wow fadeIn alert alert-vacancy" role="alert">
                <div class="row">
                  <div class="col-12">
                    <a class="text-primary mano" onclick="history.back()"><i class="far fa-arrow-alt-circle-left"></i>  Lista de vacantes</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <br>
                    <p id="idVacante" style="display: none; visibility: hidden;"></p>
                  </div>
                </div>
                <div id="verVacante" class="row">
                </div>
                <div class="row">
                  <div class="col text-center">
                    <img src="img/fondo.gif" alt="" >
                    <h3>Ya te has postulado!</h3>
                  </div>
                </div>
                <div class="row mt-5">
                  <?php if($tipoDeUsuario=="U" or !isset($tipoDeUsuario)){
                    echo "<div class='text-center col'><button class='btn btn-danger' onclick='javascript:postular();'>Postularme</button></div>";
                  } ?>
                </div>                               
              </div>
            </section>            
          </div>
        </div>
      </div>
    </section>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Acceso al <b>Intranet de Grupo IS</b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>            
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <b><label for="user">Usuario:</label></b>
                  <input type="text" class="form-control" id="user" class="form-control" placeholder="Correo electrónico" required autofocus>
                </div>

                <div class="form-group">
                  <b><label for="pass">Contraseña:</label></b>
                  <input type="password" class="form-control" id="pass" class="form-control" placeholder="Contraseña" required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <span id="mensajeInfo" class="form-control-static pull-left">&nbsp;</span>
            <button type="button" class="btn btn-primary" onclick="javascript:procesaIntra();">Entrar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <div id="elmensaje" class="alert alert-infoGIS">
              <p id="cualmensaje" class="mensajeGIS"><strong>Listo!</strong>XXX</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>

  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        2018 &copy; Copyright <strong>Grupo IS</strong>. Todos los derechos reservados.
      </div>
      <div class="credits">
        
        Desarrollado por <a href="http://www.grupois.com.mx/">Grupo IS</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <!-- <script src="lib/jquery/jquery-migrate.min.js"></script> -->
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  
  
  <script src="lib/superfish/hoverIntent.js"></script>

  
  <script src="contactform/contactform.js"></script>

  
  <script src="js/main.js"></script>

  <script>

    $(document).ready(function(){
      cargaVacante();
    });

    $("#elmensaje").css("display", "none");

    $("#myModal").on('shown.bs.modal', function() {

      $("#myModal .modal-body #user").val("");
      $("#myModal .modal-body #pass").val("");

    });

    function irIntra(){
      console.log("user: "+idUsuario + "\n\rtipo: " + tipoUsuario);

      if(idUsuario>0){
        window.location.replace("../intranet/?");
      }else{
        $('#myModal').modal('show');
      }
    }

    function procesaIntra(){

      var correcto = true;

      var user = $('#user').val();
      var pass = $('#pass').val();

      //alert("user: " + user + "\n\rpass: " + pass);

      if(user==""){
        correcto = false;
        $('#myModal .modal-body #user').focus();
        alert("Por favor, digita tu usuario");
      }

      if(pass==""){
        correcto = false;
        $('#myModal .modal-body #pass').focus();
        alert("Por favor, digita tu clave de acceso");
      }

      if(correcto){

        $("#myModal .modal-footer #mensajeInfo").html('Procesando usuario...');

        $.ajax({

          type: 'POST',
          url: '../validaAcceso.php',
          data: {
            'user': user,
            'pass' : pass
          },

          success: function (response) {

            if (response.info[0].success) {

              $("#cualmensaje").html("<font color='white'><strong>Listo!</strong> Bienvenido al portal.</font>");

              $('#elmensaje').slideDown('1000', function() {
                $('#elmensaje').slideUp('2000', function() {
                  window.location.replace("../intranet/?");
                }).delay(750);
              }).delay(750);

            }
            else{

              alert("Los datos no coinciden. Inténtalo nuevamente!")

            }
          }
        });
      }
    }

    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    function cargaVacante(){

      var element = document.getElementById("verVacante");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }
      var vacantesHTML = "";

      $.ajax({
        type: 'POST',
        url: 'rdataVacantes.php',
        data: {
          'idV': idV
        },

        success: function (response) {

          if (response.info[0].success) {

            for(i in response.data){

              var elSalario = formatter.format(response.data[i].sueldoneto);

              moment.locale('es');

              $('#idVacante').html(response.data[i].id);

              var dateTime = moment(response.data[i].creado);
              // var full = dateTime.format('dddd D, MMMM YYYY');
              // var mes = dateTime.format(' MMMM');
              // var dia = dateTime.format('dddd');
              // var diaN = dateTime.format('D');
              // var full2 = dateTime.format('LL');
              var fullTime = dateTime.format('LLLL');
              // console.log(full+"\n"+ mes+"\n"+ dia+"\n"+ diaN+"\n"+ full2+"\n"+ fullTime );
              var fecha = fullTime.replace(fullTime.substr(-4), "");

              vacantesHTML = vacantesHTML + "<div class='col-12'><p class='text-info display-5'>"+response.data[i].puesto+" - "+response.data[i].cliente+"</p></div><div class='col-12'><i class='fas fa-map-marker-alt'></i>  "+response.data[i].direcciontrabajo+"</div><div class='col-12'><i class='fas fa-money-bill-wave'></i>  Salario: "+elSalario+"</div><div class='col-12'><i class='far fa-clock'></i>  "+fecha+"</div><div class='col-12'><br></div><div class='col-12'><p class='display-6'>Descripción de la Vacante</p></div><div class='col-12 vacante'>"+response.data[i].puesto+"</div><div class='col-12'><p>"+response.data[i].objetivo+"</p></div><div class='col-12 vacante-sub'>Duración:</div><div class='col-12'><p>"+response.data[i].duracion+"</p></div><div class='col-12 vacante-sub'>Requisitos:</div><div class='col-12'><p>"+response.data[i].conocimientos+"</p></div><div class='col-12 vacante-sub'>Funciones:</div><div class='col-12'><p>"+response.data[i].responsabilidades+"</p></div><div class='col-12 vacante-sub'>Salario Mensual:</div><div class='col-12'><p>"+elSalario+"</p></div>";  
            }
          }         

          $("#verVacante").append(vacantesHTML);
        }
      });      
    }

    function postular(){

      if(idUsuario>0 && tipoUsuario=="U"){

        var idVacante =$('#idVacante').html();

        console.log("EXISTE usuario ---- " + idVacante);

        $.ajax({
          type: 'POST',
          url: 'postula.php',
          data: {
            'idU': idUsuario,
            'idV': idVacante
          },

          success: function (response) {

            if (response.info[0].success) {
            }

            $("#verVacante").append(vacantesHTML);
          }
        });


      }else{
        console.log("no existe usuario");
      }

    } 

  </script>

  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68201310-2"></script>
  
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-68201310-2');
  </script> -->