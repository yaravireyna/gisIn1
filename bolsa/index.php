<?php

  session_start();

  // phpinfo();

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
<!DOCTYPE html>
<html lang="en">



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

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  

  <!-- SELECT -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

  <!-- FIN SELECT -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
  
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
          <p class="section-description wow fadeInUp">En Grupo IS tenemos la mejor oportunidad para ti. Únete a esta gran familia y forma parte de nuestro excelente equipo d e trabajo.</p>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <section id="services">              
              <div class="container wow fadeIn">
                <div class="row">
                  <div id="mySidenav" class="sidenav">
                    <div class="container">
                      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                      <div class="row">
                        <div class="col">
                          <h1>Filtros</h1>
                          <div class="row searchR">
                            <div class="form-group col-12">
                              <b><label for="user">Palabras clave:</label></b>
                              <input type="text" class="form-control" id="clave" class="form-control" placeholder="Busca por palabra(s) clave" required>
                            </div>
                            <div class="form-group col-12">
                              <b><label for="user">Perfil:</label></b>
                              <select name="perfil" id="perfil" class="form-control">
                              </select>
                            </div>
                            <div class="form-group col-12">
                              <b><label for="user">Ubicación:</label></b>
                              <select name="ubicacion" id="ubicacion" class="form-control">
                                
                              </select>
                            </div>
                            <div class="form-group col-12 d-flex justify-content-center align-items-center">
                              <span title="Buscar Vacantes"><button class="btn btn-info busca" onclick="javascript:buscaVacantes();"><i class="fas fa-search"></i></button></span>
                              &nbsp;&nbsp;
                              <span title="Borrar filtros"><button class="btn btn-info busca" onclick="javascript:borrarVacantes();"><i title="Limpiar filtros" class="fas fa-eraser"></i></button></span>
                            </div>
                          </div>                          
                        </div>
                      </div>
                    </div>                    
                  </div>

                  <!-- <span class="filtros" onclick="openNav()">&#9776; Filtros</span> -->
                  <span id="btnFilter" class="filtros hide" onclick="openNav()">Filtros</span>
                  <div class="container text-center"><h1 class="vacantes">Vacantes</h1></div>

                  <div class="container-fluid contents text-center">                    
                    <div id="muestraV" class="row"></div>
                  </div>                    

                </div>

                <nav class="navigp">
                    <ul class="pagination">
                        <li class="pag_prev"></li>
                        <li class="pag_next"></li>
                    </ul>
                </nav>                                   
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

    $( document ).ready(function() {

      llenaVacantes();

      llenaFiltros();

    });

    // setInterval( function () {
    //   console.log("cargando..");
    //   llenaVacantes();
    //   llenaFiltros();   
    // }, 3000);  

    $("#elmensaje").css("display", "none");

    $("#myModal").on('shown.bs.modal', function() {

      $("#myModal .modal-body #user").val("");
      $("#myModal .modal-body #pass").val("");

    });

    var formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2,
    });

    function llenaVacantes(){

      var element = document.getElementById("muestraV");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }

      var palabras = $('#clave').val();
      var perfiles = $('select#perfil').val();
      var location = $('#ubicacion').val();

      var vacantesHTML ="";
      var cuantos=0;

      $.ajax({

        type: 'POST',
        url: 'rdataVacantes.php',
        data: {
          'keyWords': palabras,
          'perfil' : perfiles,
          'location' : location
        },

        success: function (response) {

          if (response.info[0].success) {

            var num= response.data.length;
            cuantos = num;

            for(var i=0; i<num; i++){

              var elSalario = formatter.format(response.data[i].salario);

              vacantesHTML = vacantesHTML + "<div class='content col-12 col-sm-12 col-md-6 col-lg-4'><div class='thumbnail'><img class='avatar_big' src='img/vacantes/"+response.data[i].imagen+"'><div class='caption text-center'><h3 class='mayusculas'>" +response.data[i].perfil+"</h3><p><label>Vacantes disponibles:</label> "+response.data[i].recursos+"</p><p><label>Ubicación:</label> "+response.data[i].ubicacion+"</p><p><label>Descripción:</label> "+response.data[i].descripcion+"</p><p class='text-center'><a href='detalles.php?vac="+response.data[i].id+"#facts' class='btn btn-primary' role='button'>Ver vacante</a></p></div></div></div>";            
            }
          }
          else{

            vacantesHTML = "<div class='col d-flex align-items-center justify-content-center alert alert-danger'><h2>¡No exiten coincidencias!. Por favor, intenta modificar los filtros.</h2></div>";

          }         

          $("#muestraV").append(vacantesHTML);
          paginaHoja(cuantos); 
        }
      });      
    }


    function llenaFiltros(){

      var element = document.getElementById("perfil");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }

      var element = document.getElementById("ubicacion");
      while (element.firstChild) {
        element.removeChild(element.firstChild);
      }

      var perfilesHTML ="";
      var cuantosP=0;

      var ubicacionesHTML ="";
      var cuantasU=0;

      perfilesHTML = perfilesHTML + "<option value='0'> Selecciona un perfil </option>";         
      ubicacionesHTML = ubicacionesHTML + "<option value='0'> Selecciona una zona </option>"; 

      $.ajax({

        type: 'POST',
        url: 'rdataFiltros.php',

        success: function (response) {

          if (response.info[0].success) {

            for(var i=0; i<response.perfiles.length; i++){
              perfilesHTML = perfilesHTML + "<option value="+response.perfiles[i].idP+">"+response.perfiles[i].perfil+"</option>";         
            }

            for(var i=0; i<response.ubicaciones.length; i++){
              ubicacionesHTML = ubicacionesHTML + "<option value="+response.ubicaciones[i].ubicacion+">"+response.ubicaciones[i].ubicacion+"</option>";         
            }

          }else{
            perfilesHTML="";
            ubicacionesHTML="";
          }         

          $("#perfil").append(perfilesHTML);
          $("#ubicacion").append(ubicacionesHTML);
        }
      });      
    }

    function paginaHoja(cuantos){
      $(".numeros").remove();
      $(".next_prev").remove();

      pageSize = 6;
      pagesCount = cuantos;
      var currentPage = 1;

      prev = "<a class='next_prev' href='#facts' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>";
      next = "<a class='next_prev' href='#facts' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a>";

      $(".pag_prev").append(prev);
      $(".pag_next").append(next);
      
      var nav = '';
      var totalPages = Math.ceil(pagesCount / pageSize);
      for (var s=0; s<totalPages; s++){
          nav += '<li class="numeros"><a href="#facts">'+(s+1)+'</a></li>';
      }
      $(".pag_prev").after(nav);
      $(".numeros").first().addClass("active");

      showPage = function() {
          $(".content").hide().each(function(n) {
              if (n >= pageSize * (currentPage - 1) && n < pageSize * currentPage)
                $(this).show();
          });
      }
      showPage();

      $(".pagination li.numeros").click(function() {
          $(".pagination li").removeClass("active");
          $(this).addClass("active");
          currentPage = parseInt($(this).text());
          showPage();
      });

      $(".pagination li.pag_prev").click(function() {
          if($(this).next().is('.active')) return;
          $('.numeros.active').removeClass('active').prev().addClass('active');
          currentPage = currentPage > 1 ? (currentPage-1) : 1;
          showPage();
      });

      $(".pagination li.pag_next").click(function() {
          if($(this).prev().is('.active')) return;
          $('.numeros.active').removeClass('active').next().addClass('active');
          currentPage = currentPage < totalPages ? (currentPage+1) : totalPages;
          showPage();
      });

      

    }

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

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px"; 
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";        
    }

    function buscaVacantes(){

      $(".numeros").remove();

      llenaVacantes();

      closeNav();
    }

    function borrarVacantes(){
      $('#clave').val("");
      $('#perfil').val("0");
      $('#ubicacion').val("0");
    }

  </script>

  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68201310-2"></script>
  
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-68201310-2');
  </script> -->