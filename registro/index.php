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
          <li><a href="../bolsa">Bolsa de Trabajo</a></li>
          <li class="menu-active"><a><button type="button" class="btn btn-dark" onclick="javascript:irIntra();">Intranet</button></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="mb-3">
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
                    <input id="pass1" type="password" class="form-control">
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog form-dark" role="document">
        <div class="modal-content card card-image">
          <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
            <div class="modal-header text-center pb-4">
              <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Acceso</strong> <a class="green-text font-weight-bold"><strong> GIS</strong></a></h3>
              <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="md-form mb-2 text-center">
                <label data-error="wrong" data-success="right" for="Form-email5"><b style="color: white; font-style: italic; font-size: 1.4rem;">Usuario</b></label>
                <input type="email" id="user" class="form-control validate white-text" placeholder="Correo electrónico" required="yes" autofocus="yes">
              </div>

              <div class="md-form pb-3 mt-3 mb-5 text-center">
                <label data-error="wrong" data-success="right" for="Form-pass5"><b style="color: white; font-style: italic; font-size: 1.4rem;">Contraseña</b></label>
                <input type="password" id="pass" class="form-control validate white-text" placeholder="Contraseña" required="yes">
              </div>

              <div class="row d-flex align-items-center mb-4">
                <span id="mensajeInfo" style="color: white;" class="form-control-static pull-left">&nbsp;</span>
                <div class="text-center mb-3 col-md-12">
                    <button type="button" class="btn btn-info btn-block btn-rounded z-depth-1" onclick="javascript:procesaIntra();">Entrar</button>
                </div>
                <div id="elmensaje" class="alert alert-infoGIS">
                  <p id="cualmensaje" class="mensajeGIS"><strong>Listo!</strong>XXX</p>
                </div>                    
              </div>

              <div class="row">
                <div class="col-md-12">
                    <p class="font-small white-text d-flex justify-content-end">¿No tienes tu cuenta? <a href="" class="green-text ml-1 font-weight-bold"> Registrate</a></p>
                </div>
              </div>

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
    $("#pass1").val('');
    $("#passV").val('');

    $("#correo0").show();
    $("#correo1").show();
    $("#correo2").show();
    $("#correo3").show();

    $("#myModal").on('hidden.bs.modal', function() {

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

    var pwd = document.getElementById("pass");
    pwd.addEventListener("keydown", function (e) {
      if (e.keyCode === 13) {
        procesaIntra();
        return false;
      }
    });

    var usr = document.getElementById("user");
    usr.addEventListener("keydown", function (e) {
      if (e.keyCode === 13) {
        procesaIntra();
        return false;
      }
    });

    function procesaIntra(){

      var correcto = true;

      var user = $('#user').val();
      var pass = $('#pass').val();

      if(user==""){
        correcto = false;
        $('#myModal .modal-body #user').focus();
        // alert("Por favor, digita tu usuario");

        $("#cualmensaje").html("<font color='white'><strong>Advertencia!</strong> Completa los campos.</font>");

        $('#elmensaje').slideDown('1000', function() {
          $('#elmensaje').slideUp('2000', function() {

          }).delay(750);
        }).delay(750);
      }

      if(pass==""){
        correcto = false;
        $('#myModal .modal-body #pass').focus();
        // alert("Por favor, digita tu clave de acceso");

        $("#cualmensaje").html("<font color='white'><strong>Advertencia!</strong> Completa los campos.</font>");

        $('#elmensaje').slideDown('1000', function() {
          $('#elmensaje').slideUp('2000', function() {
            
          }).delay(750);
        }).delay(750);
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
              $("#cualmensaje").html("<font color='white'><strong>Error!</strong> Los datos no coinciden. Inténtalo nuevamente!.</font>");

              $('#elmensaje').slideDown('1000', function() {
                $('#elmensaje').slideUp('2000', function() {
                }).delay(750);
              }).delay(750);
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
              $("#pass1").val('');
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

    function validaEmail(email) {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(String(email).toLowerCase());
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
      var pass1 = $("#pass1").val();
      var pass2 = $("#passV").val();

      var valida1 = validaEmail(email1);
      var valida2 = validaEmail(email2);

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
        	if(valida1 && valida2) ok = true;
        	else{
        		ok = false;
        		showWarning("Formato de correo inválido");
		        $('#email').focus();
		        e.preventDefault();
        	}
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

        $.ajax({
          type: 'POST',
          url: 'insUsuario.php',
          data: {
            'id': id,
            'nombre': nombre,
            'ap': ap,
            'am': am,
            'email': email1,
            'pass': pass1,
            'action': action
          },

          success: function (response) {

            if (response.info[0].success) {
            	$('#user').val(email1);
              	$('#pass').val(pass1);

              	$('#myModal').modal('show');
            }else{
            	if(response.info[0].error=="EXISTE")  showError("El usuario ya existe!");
            	else  showError("Ocurrio un error. Intentalo nuevamente!");
            }
          }
        });
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