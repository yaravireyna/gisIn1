<DOCTYPE html>
<html lang="en">

<?php

  session_start();

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

  
  <link href="img/icon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Lobster" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Gugi|Lato|Open+Sans|Roboto+Condensed|Slabo+27px" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Acme|Berkshire+Swash|Bree+Serif|Crete+Round|Fjalla+One|Francois+One|Gloria+Hallelujah|Indie+Flower|Libre+Baskerville|Lobster|Noto+Serif|Pacifico|Patua+One" rel="stylesheet"> 


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->

  <link rel="stylesheet" href="css/infinite-slider.css">

  <!-- timeline -->

  <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  
  <link rel="stylesheet" href="css/styleTL.css">

  <!-- animate -->

  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">
  <!-- or -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">

  <!-- <script src="js/typewriter.js"></script> -->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <link href="css/styleSlider.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="js/jquery.flexisel.js"></script>

  <script>
      jQuery(document).ready(function($) {
          $('.counter').counterUp({
              delay: 10,
              time: 1000
          });
      });
  </script>
  
</head>

<body class="content_b">

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left hide">
        <a href="#hero"><img src="img/logoGrupoISNuevoWEB.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Inicio</a></li>
          <li><a href="#facts">Conocenos</a></li>
          <li class="menu-has-children"><a href="">Servicios</a>
            <ul>
              <li><a href="talento/">Talento</a></li>
              <li><a href="profesionales/">Servicios profesionales</a></li>
              <li><a href="administrados/">Servicios administrados</a></li>
              <li><a href="asset_recovery/">Asset recovery</a></li>
            </ul>
          </li>
          <!-- <li><a href="#portfolio">Casos de éxito</a></li> -->
          <li><a href="#contact">Contactanos</a></li>
          <li><a href="bolsa/">Bolsa de Trabajo</a></li>
          <li><a><button type="button" class="btn btn-dark" onclick="javascript:irIntra();">Intranet</button></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <video id="hero-video" class="video_selector" poster="img/fondoMoment.jpg" loop muted autoplay preload>
    <!-- <source src="media/vfhb.mp4" type="video/mp4"> -->
    <!-- <source src="media/videoplayback.mp4" type="video/mp4"> -->
    <!-- <source src="media/ultra.mp4" type="video/mp4"> -->
    <!-- <source src="media/tablet2.mp4" type="video/mp4"> -->
    <!-- <source src="media/laptop2.mp4" type="video/mp4"> -->
    <!-- <source src="media/cdmxTrimTrim.mp4" type="video/mp4">  -->
    <source src="media/fondo1.mp4" type="video/mp4">
    <!-- <source src="media/Flight.mp4" type="video/mp4"> -->
    <!-- <source src="//dl.dropbox.com/s/13z1t97pcvka88k/typing-numbers.webm" type="video/webm"> -->
    <!-- <source src="//dl.dropbox.com/s/5pyuc35wnv5khe1/typing-numbers.ogv" type="video/ogg"> -->
  </video>

  <section id="hero">    
    <div class="hero-container">   
      <img src="img/gisBlanco.png" alt="" height="96px" width="96px">
      <h1><div id="tema" class="in-line"></div>:</h1>
      <h1 class="bold"><div id="subtema"></div></h1>
      <!-- <a href="#facts" class="btn-get-started">Conocenos</a> -->
      <a href="#facts" class="btn-get-started"><i class="fa fa-angle-down animated infinite bounce"></i></a>
    </div>
  </section>

  <main id="main">

    <section id="facts">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Nuestros números</h3>
          <p class="section-description">Buscamos y generamos oportunidades para cualquier persona con las habilidades y aptitudes requeridas, centrándonos en capacidades y talento.</p>
        </div>
        <div class="row counters">

          <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center">
            <!-- <p class="counter_up animated infinite pulse">Más de</p> -->
            <h2>+ <span class="counter">250</span> Clientes</h2>
            <p class="counter_up animated infinite pulse">Satisfechos</p>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center">
            <!-- <p class="counter_up animated infinite pulse">Tenemos</p> -->
            <h2><span class="counter">100</span> %</h2>
            <p class="counter_up animated infinite pulse">Satisfacción de nuestros clientes</p>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center">
            <!-- <p class="counter_up animated infinite pulse">Más de</p> -->
            <h2>+ <span class="counter">7500</span></h2>
            <p class="counter_up animated infinite pulse">Profesionales en TI reclutados</p>
          </div>

          <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center">
            <!-- <p class="counter_up animated infinite pulse">Más de</p> -->
            <h2>+ <span class="counter">28</span> años</h2>
            <p class="counter_up animated infinite pulse">Brindando soluciones</p>
          </div>

        </div>
      </div>
      <div class="section-header">
        <h3 class="section-title">Conocenos</h3>
        <div class="container">
          <div class="row">
            <div class="col col-sm-12 col-md-12 col-lg-12">
              <!-- <iframe class="debut" src="https://www.youtube.com/embed/tCuVzx6odVs?enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen id="video1"></iframe> -->

              <!-- <video class="debut" controls="controls" 
               class="video-stream" 
               x-webkit-airplay="allow" 
               data-youtube-id="tCuVzx6odVs" 
               src="https://www.youtube.com/watch?v=tCuVzx6odVs&html5=True"></video> -->


               <div id="player" class="debut"></div>

                <script>
                  // 2. This code loads the IFrame Player API code asynchronously.
                  var tag = document.createElement('script');

                  tag.src = "https://www.youtube.com/iframe_api";
                  var firstScriptTag = document.getElementsByTagName('script')[0];
                  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                  // 3. This function creates an <iframe> (and YouTube player)
                  //    after the API code downloads.
                  var player;
                  function onYouTubeIframeAPIReady() {
                    player = new YT.Player('player', {
                      height: '360',
                      width: '640',
                      videoId: 'etKh-pcC9Ao',
                      events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                      }
                    });
                  }

                  // 4. The API will call this function when the video player is ready.
                  function onPlayerReady(event) {
                    event.target.playVideo();
                  }

                  // 5. The API calls this function when the player's state changes.
                  //    The function indicates that when playing a video (state=1),
                  //    the player should play for six seconds and then stop.
                  var done = false;
                  function onPlayerStateChange(event) {
                    if (event.data == YT.PlayerState.PLAYING && !done) {
                      setTimeout(stopVideo, 0);
                      done = true;
                    }
                  }
                  function stopVideo() {
                    player.stopVideo();
                  }
                </script>
              
            </div>
          </div>
        </div>
      </div>
      <div class="section-header mt-3">
        <h3 class="section-title">Nuestra historia</h3>
      </div>
    </section>

    <section id="timeline">
      <div class="tl-item contain">
        <div class="tl-bg" style="background-image: url('img/pexels-photo-825259.jpeg');"></div>
        <div class="tl-year">
          <p class="f2 heading--sanSerif">1990</p>
        </div>
        <div class="tl-content">
          <h1>We Born</h1>
          <p>Noviembre 1990,  marca una fecha muy especial para nosotros, pues nos constituimos como una de las primeras empresas 100% Mexicana orientadas a tecnología y soporte.</p>
        </div>
      </div>

      <div class="tl-item">       
        <div class="tl-bg" style="background-image: url('img/pexels-photo-140945.jpeg')"></div>        
        <div class="tl-year">
          <p class="f2 heading--sanSerif">2000</p>
        </div>
        <div class="tl-content">
          <h1 class="f3 text--accent ttu">Tech Support</h1>
          <p>Nos consolidamos como una de las opciones más viables en el área de soporte técnico en México, trabajando para firmas internacionales y bancos nacionales.</p>
        </div>
      </div>

      <div class="tl-item">      
        <div class="tl-bg" style="background-image: url('img/pexels-photo-886465.jpeg')"></div>        
        <div class="tl-year">
          <p class="f2 heading--sanSerif">2005</p>
        </div>
        <div class="tl-content">
          <h1 class="f3 text--accent ttu">“La alternativa confiable.”</h1>
          <p>Desarrollamos diversos proyectos de innovación tecnológica para el sector de telecomunicaciones. Convirtiéndonos en una alternativa confiable sobre los grandes del mercado como IBM, Compaq HP, Dell.</p>
        </div>
      </div>

      <div class="tl-item">        
        <div class="tl-bg" style="background-image: url('img/african-descent-brainstorming-working-workplace-P65DNS6.jpg')"></div>        
        <div class="tl-year">
          <p class="f2 heading--sanSerif">2010</p>
        </div>
        <div class="tl-content">
          <h1 class="f3 text--accent ttu">Outsourced Era</h1>
          <p>Creamos nuevas líneas de negocio, recibiendo la confianza de múltiples clientes para participar en varias iniciativas de outsourcing tecnológico de servicios y talento.  Convirtiendo el talento especializado en una de nuestras cartas más fuertes.</p>
        </div>
      </div>

      <div class="tl-item">        
        <div class="tl-bg" style="background-image: url('img/pexels-photo-297755.jpeg')"></div>        
        <div class="tl-year">
          <p class="f2 heading--sanSerif">2018</p>
        </div>
        <div class="tl-content">
          <h1 class="f1 text--accent ttu">Grupo IS</h1>
          <p>Consolidamos nuevas empresas, con más de 200 profesionales activos, con presencia en USA y México, continuamos ampliando nuestro espectro de servicios y nuestra red de talento tecnológico.</p>
        </div>
      </div>

    </section>

    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Servicios</h3>
          <p class="section-description">Buscamos y generamos oportunidades para cualquier persona con las habilidades y aptitudes requeridas, centrándonos en capacidades y talento.</p>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="talento/"><i class="fa fa-desktop"></i></a></div>
              <h4 class="title"><a href="talento/">Talento</a></h4>
              <p class="description">
                (Servicio personalizado). Servicios de Staffing, Outsourcing y Headhunting   especializado en TI...
                <div><a class="btn btn-default liga" href="talento/">Consultar info</a></div>
              </p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href="profesionales/"><i class="fa fa-bar-chart"></i></a></div>
              <h4 class="title"><a href="profesionales/">Profesionales</a></h4>
              <p class="description">
                Contamos con varios servicios profesionales para brindar el mejor servicio a tu empresa...
                <div><a class="btn btn-default liga" href="profesionales/">Consultar info</a></div>
              </p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href="administrados/"><i class="fa fa-paper-plane"></i></a></div>
              <h4 class="title"><a href="administrados/">Administrados</a></h4>
              <p class="description">
                Brindamos serivios como son: HelpDesk, Circuito cerrado, etc. ...
                <div><a class="btn btn-default liga" href="administrados/">Consultar info</a></div>
              </p>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href="asset_recovery/"><i class="fa fa-photo"></i></a></div>
              <h4 class="title"><a href="asset_recovery/">Asset recovery</a></h4>
              <p class="description">
                Brindamos la gestión adecuada de fin de vida de activos tecnológicos...
                <div><a class="btn btn-default liga" href="asset_recovery/">Consultar info</a></div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">¿Por qué somos tu mejor opción?</h3>
            <p class="cta-text">Conócenos, elígenos, quédate con nosotros.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" data-toggle="modal" data-target="#exampleModal">Ir al video</a>
          </div>
        </div>
      </div>
    </section> -->

    <section id="portfolio">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Algunos de nuestros clientes</h3>
          <p class="section-description">Nuestra experiencia, nos avala.</p>
        </div>
        <!-- <section class="customer-logos slider">
          <div class="slide"><img src="img/clientes/amazon_logo_RGB.png"></div>
          <div class="slide"><img src="img/clientes/atlasLOGOBN.png"></div>
          <div class="slide"><img src="img/clientes/att-logoBN.png"></div>
          <div class="slide"><img src="img/clientes/bny.png"></div>
          <div class="slide"><img src="img/clientes/cablemas.png"></div>
          <div class="slide"><img src="img/clientes/conauto.png"></div>
          <div class="slide"><img src="img/clientes/dxct.png"></div>
          <div class="slide"><img src="img/clientes/elektra.png"></div>
          <div class="slide"><img src="img/clientes/fincomun.png"></div>
          <div class="slide"><img src="img/clientes/galderma.png"></div>
          <div class="slide"><img src="img/clientes/gnpseguros.png"></div>
          <div class="slide"><img src="img/clientes/grupo-financeiro-actinver.png"></div>

        </section> -->
        <div>
          <ul id="flexiselDemo3">
            <li class="slide"><img src="img/clientes/amazon_logo_RGB.png"></li>
            <li class="slide"><img src="img/clientes/atlasLOGOBN.png"></li>
            <li class="slide"><img src="img/clientes/att-logoBN.png"></li>
            <li class="slide"><img src="img/clientes/bny.png"></li>
            <li class="slide"><img src="img/clientes/cablemas.png"></li>
            <li class="slide"><img src="img/clientes/conauto.png"></li>
            <li class="slide"><img src="img/clientes/dxct.png"></li>
            <li class="slide"><img src="img/clientes/elektra.png"></li>
            <li class="slide"><img src="img/clientes/fincomun.png"></li>
            <li class="slide"><img src="img/clientes/galderma.png"></li>
            <li class="slide"><img src="img/clientes/gnpseguros.png"></li>
            <li class="slide"><img src="img/clientes/grupo-financeiro-actinver.png"></li>
          </ul>
        </div>
      </div>
      <div class="section-header bot">&nbsp;</div>
    </section>

    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contáctanos</h3>
          <p class="section-description">Compartenos tus inquitudes, podemos ayudarte.</p>
        </div>
      </div>
      <div class="container wow fadeInUp">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">

              <div>
                <i class="fa fa-envelope"></i>
                <p>contacto@grupois.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>5260-6208 / 5260-6241 / 6385-0060 / 6272-4700 Ext 114</p>
              </div>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Gracias por enviarnos tus comentarios!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" data-rule="minlen:4" data-msg="Proporciona tu nombre" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Tu email" data-rule="email" data-msg="Digita una dirección de correo válida" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Cuál es el tema de tu interes" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Deja un comentario" placeholder="Mensaje"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Enviar mensaje</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">¿Por qué elegirnos?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <video id="videoP" class="container_video" controls poster="img/GIS.JPG" preload>
              <source src="media/gis_debut.mp4" type="video/mp4">
              <!-- <source src="img/P_GIS.ogv" type="video/ogg">
              <source src="img/P_GIS.webm" type="video/webm"> -->
            </video>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="darkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog form-dark" role="document">
            <!--Content-->
            <div class="modal-content card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
                <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                    <!--Header-->
                    <div class="modal-header text-center pb-4">
                        <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Acceso</strong> <a class="green-text font-weight-bold"><strong> GIS</strong></a></h3>
                        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <!--Body-->
                        <div class="md-form mb-2 text-center">
                          <label data-error="wrong" data-success="right" for="Form-email5"><b style="color: black; font-style: italic; font-size: 1.4rem;">Usuario</b></label>
                          <input type="email" id="Form-email5" class="form-control validate white-text">
                        </div>

                        <div class="md-form pb-3 mb-5 text-center">
                          <label data-error="wrong" data-success="right" for="Form-pass5"><b style="color: black; font-style: italic; font-size: 1.4rem;">Contraseña</b></label>
                          <input type="password" id="Form-pass5" class="form-control validate white-text">
                            
                          <!-- <div class="form-group mt-4">
                            <input class="form-check-input" type="checkbox" id="checkbox624">
                            <label for="checkbox624" class="white-text form-check-label">Accept the<a href="#" class="green-text font-weight-bold"> Terms and Conditions</a></label>
                          </div> -->
                        </div>

                        <!--Grid row-->
                        <div class="row d-flex align-items-center mb-4">

                            <!--Grid column-->
                            <div class="text-center mb-3 col-md-12">
                                <button type="button" class="btn btn-info btn-block btn-rounded z-depth-1">Entrar</button>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">
                                <p class="font-small white-text d-flex justify-content-end">¿No tienes tu cuenta? <a href="#" class="green-text ml-1 font-weight-bold"> Registrate</a></p>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->

    <div class="text-center">
        <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#darkModalForm">Launch modal register Form</a>
    </div>


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
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="jquery.counterup.min.js"></script>

  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <script src="js/typewriter.js"></script>

  <script>

    $(document).ready(function(){

      $("#flexiselDemo3").flexisel({
          visibleItems: 5,
          itemsToScroll: 1,         
          autoPlay: {
              enable: true,
              interval: 4000,
              pauseOnHover: true
          }        
      });

      var subtema = document.getElementById('subtema');

      var typewriter_subtema = new Typewriter(subtema, {
          loop: true
      });

      typewriter_subtema.typeString('Gurus en .Net')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Desarrolladores Java')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Desarrolladores ABAP')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Business Intelligence')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Desarrolladores Full Stack')
          .pauseFor(1500)
          .deleteAll()
          .typeString('IT Project Managers')
          .pauseFor(1500)
          .deleteAll()
          .typeString('BackEnd y FrontEnd')
          .pauseFor(1000)
          .deleteAll()
          .typeString('Programadores Phyton')
          .pauseFor(1000)
          .deleteAll()
          .typeString('IOS')
          .pauseFor(1000)
          .deleteAll()
          .typeString('Analistas de Bases de Datos')
          .pauseFor(1000)
          .deleteAll()
          .typeString('PL/SQL')
          .pauseFor(1000)
          .deleteAll()
          .typeString('Soporte técnico')
          .pauseFor(1000)
          .deleteAll()
          .typeString('Desarrollo de software')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Help Desk')
          .pauseFor(1500)
          .deleteAll()
          .typeString('Soluciones robustas en Infraestructura')
          .pauseFor(1200)
          .deleteAll()
          .typeString('Consultoría de negocios')
          .pauseFor(1200)
          .deleteAll()
          .typeString('Soporte Tecnológico')
          .pauseFor(1200)
          .deleteAll()
          .typeString('Consultoría en seguridad')
          .pauseFor(1000)
          .deleteAll()
          .start();

      var tema = document.getElementById('tema');

      var typewriter_tema = new Typewriter(tema, {
          loop: true
      });

      typewriter_tema.typeString('Hacemos match con')
          .pauseFor(52000)
          .deleteAll()
          .typeString('Implementamos')
          .pauseFor(35000)          
          .start();

      

      $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 2
          }
        }]
      });


    });



    /*************************
    API YOUTUBE
    *************************/

    var player;
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        height: '360',
        width: '640',
        videoId: 'etKh-pcC9Ao',
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    }

    $("#elmensaje").css("display", "none");

    $("#myModal").on('shown.bs.modal', function() {

      $("#myModal .modal-body #user").val("");
      $("#myModal .modal-body #pass").val("");

    });

    function irIntra(){

      if(idUsuario>0){
        window.location.replace("intranet/?");
      }else{
        $('#myModal').modal('show');
        // $('#darkModalForm').modal('show');        
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
          url: 'validaAcceso.php',
          data: {
            'user': user,
            'pass' : pass
          },

          success: function (response) {

            if (response.info[0].success) {

              $("#cualmensaje").html("<font color='white'><strong>Listo!</strong> Bienvenido al portal.</font>");

              $('#elmensaje').slideDown('1000', function() {
                $('#elmensaje').slideUp('2000', function() {
                  window.location.replace("intranet/?");
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

  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
 <!--  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68201310-2"></script>
  
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-68201310-2');
  </script> -->


</body>
</html>
