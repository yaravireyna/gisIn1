<!DOCTYPE html>
<html lang="en">

<?php

  session_start();

  echo "<script type='text/javascript'> var link = '".$_GET['reg']."'; </script>";

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

  <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Bree+Serif|Crete+Round|Fjalla+One|Francois+One|Gloria+Hallelujah|Indie+Flower|Libre+Baskerville|Lobster|Noto+Serif|Pacifico|Patua+One" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment-with-locales.min.js"></script>

  <!--sweet alert-->    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha256-Z8TW+REiUm9zSQMGZH4bfZi52VJgMqETCbPFlGRB1P8=" crossorigin="anonymous" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha256-ZvMf9li0M5GGriGUEKn1g6lLwnj5u+ENqCbLM5ItjQ0=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha256-zuyRv+YsWwh1XR5tsrZ7VCfGqUmmPmqBjIvJgQWoSDo=" crossorigin="anonymous" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha256-JirYRqbf+qzfqVtEE4GETyHlAbiCpC005yBTa4rj6xg=" crossorigin="anonymous"></script>

  <script src="js/utilities.js"></script>

  <link href="css/styleReg.css" rel="stylesheet">

  <!-- fin sweet alert -->

</head>

<body class="content_b fondo">

  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left hide">
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

  <main>
    <section id="hero">    
      <div class="hero-container wow fadeIn">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <section id="services">
              <div class="col-12 mb-4"><h1>Crea una cuenta</h1></div>
              <p id="idUser" style="visibility:hidden; display:none;"></p>
              <p id="userEmail" style="visibility:hidden; display:none;"></p>
              <div class="container wow fadeIn">
                <div class="row form-group">
                  <div class="col-12 mb-2">
                    <label for=""><b>Nombre(s)</b></label>
                    <input id="nombre" type="text" class="form-control">
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Apellido Paterno</b></label>
                    <input id="ap" type="text" class="form-control">
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Apellido Materno</b></label>
                    <input id="am" type="text" class="form-control">
                  </div>

                  <div id="correo0" class="col-12"><br></div>
                  <div id="correo1" class="col-12"><hr></div>
                  <div id="correo2" class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Correo</b></label>
                    <input id="email" type="text" class="form-control">
                  </div>

                  <div id="correo3" class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Confirmar correo</b></label>
                    <input id="emailV" type="text" class="form-control">
                  </div>

                  <div class="col-12"><br></div>
                  <div class="col-12"><hr></div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Contraseña</b></label>
                    <input id="pass" type="password" class="form-control">
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-2">
                    <label for=""><b>Confirmar la contraseña</b></label>
                    <input id="passV" type="password" class="form-control">
                  </div>

                  <div class="col-12 mt-4 mb-2">
                    <button id="btnR" class="btn btn-danger" onclick="registraUser();">Registrar</button>
                  </div>                

                </div>                               
              </div>
            </section>            
          </div>
          <div class="col-12 col-sm-2 col-md-2 col-lg-2"></div>
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
    
    validaLink();    

    $("#elmensaje").css("display", "none");
    
    $("#idUser").html('');
    $("#nombre").val('');
    $("#ap").val('');
    $("#am").val('');
    $("#email").val('');
    $("#emailV").val('');
    $("#pass").val('');
    $("#passV").val('');

    $("#correo0").show();
    $("#correo1").show();
    $("#correo2").show();
    $("#correo3").show();

    $("#myModal").on('shown.bs.modal', function() {

      $("#myModal .modal-body #user").val("");
      $("#myModal .modal-body #pass").val("");

    });

    function irIntra(){

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

    function validaLink(){

      if(link=='' || link.length!=50){
        $("#correo0").show();
        $("#correo1").show();
        $("#correo2").show();
        $("#correo3").show();
      }else{

        $.ajax({
          type: 'POST',
          url: 'rvalidaLink.php',
          data: {
            'link': link
          },

          success: function (response) {

            if (response.info[0].success) {
              $("#idUser").html(response.data[0].id);
              $("#userEmail").html(response.data[0].email);

              $("#email").val(response.data[0].email);
              $("#emailV").val(response.data[0].email);

              $('#email').prop('readonly', true);
              $('#emailV').prop('readonly', true);

              $("#correo0").show();
              $("#correo1").show();
              $("#correo2").show();
              $("#correo3").show();
            }else{

              $("#idUser").html('');
              $("#nombre").val('');
              $("#ap").val('');
              $("#am").val('');
              $("#email").val('');
              $("#emailV").val('');
              $("#pass").val('');
              $("#passV").val('');

              $('#email').prop('readonly', false);
              $('#emailV').prop('readonly', false);

              $("#correo0").show();
              $("#correo1").show();
              $("#correo2").show();
              $("#correo3").show();
            }
          }
        }); 
      }     
    }

    function registraUser(){

      var ok = true;
      var id = $("#idUser").html();
      var emailO = $("#userEmail").html();

      var nombre = $("#nombre").val();
      var ap = $("#ap").val();
      var am = $("#am").val();
      var email1 = $("#email").val();
      var email2 = $("#emailV").val();
      var pass1 = $("#pass").val();
      var pass2 = $("#passV").val();

      console.log(email1+"----"+email2+"----"+emailO)

      var action = "";

      if(nombre==""){
        ok = false;
        showWarning("Proporciona tu nombre");
        $('#nombre').focus();
        e.preventDefault();
      }

      if(ap==""){
        ok = false;
        showWarning("Proporciona tu apellido paterno");
        $('#ap').focus();
        e.preventDefault();
      }

      if(am==""){
        ok = false;
        showWarning("Proporciona tu apellido materno");
        $('#am').focus();
        e.preventDefault();
      }

      if(id==""){
        action = "INS";

        if(email1!=email2){
          ok = false;
          showWarning("Los correos no coinciden");
          $('#email').focus();
          e.preventDefault();
        }else{
          // if(email1)Valida formato de correos
        }

      }else{
        action = "UPD";

        if(email1==email2 && email1==emailO && email2==emailO) ok = true;
        else{
          ok = false;
          showWarning("Los correos no coinciden");
          $('#email').focus();
          e.preventDefault();
        }

      }

      if(pass1!="" && pass2!=""){
        if(pass1!=pass2){
          ok = false;
          showWarning("Las contraseñas no coinciden");
          $('#pass').focus();
          e.preventDefault();
        }else{
          if(pass1.length<8){
            ok = false;
            showWarning("La contraseña no cumple el formato requerido");
            $('#pass').focus();
            e.preventDefault();
          }else if(pass2.length<8){
            ok = false;
            showWarning("La contraseña no cumple el formato requerido");
            $('#passV').focus();
            e.preventDefault();
          }else ok = true;
        }
      }else{
        ok = false;
        showWarning("Las contraseñas no deben estar vacias");
        $('#email').focus();
        e.preventDefault();
      }

      if(ok){
        showMessage("Datos correctos");
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