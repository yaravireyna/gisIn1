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
    <li class="breadcrumb-item active">Requerimiento</li>
  </ol>
  <div class="container">
    <div class="alert alert-danger border-0 text-center" role="alert">
      <h3>Alta de Requerimiento</h3>
    </div>
    <div class="row">
      <div class="col">     
        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Titulo del puesto</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="tituloP"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Cantidad de recursos</label></b></div>
            <div class="col-9"><input onkeypress="return justNumbers(event);" type="text" class="form-control" id="recursos"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="ubicacion">Cliente</label></b></div>
            <div class="col-8">
              <select name="clientes" class="form-control" id="clientes">
              </select>
            </div>
            <div class="col-1">
              <a id='sAllT' href='#' onclick="javascript:addUbicacion(1);"><span title='Agraga Cliente' style='vertical-align:middle; color: black ;font-size:24px;'><i class="fas fa-plus-circle"></i></span></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
          <div class="col-3"><b><label for="ubicacion">Líder responsable</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="lider"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Área</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="area"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Titulo del puesto al que reporta</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="tituloR"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">OC. Contrato firmado</label></b></div>
            <div class="col-9">
               <select name="contrato" class="form-control" id="contrato">
                <option value="N">No</option>
                <option value="S">Si</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Prioridad</label></b></div>
            <div class="col-9">
              <select name="prioridad" class="form-control" id="prioridad">
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Nombre del proyecto</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="nombreP"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Lugar de trabajo y dirección</label></b></div>
            <div class="col-8"><input type="text" class="form-control" id="lugar" readonly="yes"></div>
            <div id="ub1" class="col-1 oculto">
              <a id='sAllT' href='#' onclick="javascript:addUbicacion(2);"><span title='Agraga dirección del cliente' style='vertical-align:middle; color: black ;font-size:24px;'><i class="fas fa-plus-circle"></i></span></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Ubicación del cliente (Edificio, Piso)</label></b></div>
            <div class="col-8"><input type="text" class="form-control" id="ubicacion" readonly="yes"></div>
            <div id="ub2" class="col-1 oculto">
              <a id='sAllT' href='#' onclick="javascript:addUbicacion(3);"><span title='Agraga Cliente' style='vertical-align:middle; color: black ;font-size:24px;'><i class="fas fa-plus-circle"></i></span></a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Duración del proyecto</label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="duracion"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Inglés</label></b></div>
            <div class="col-9">
              <select name="ingles" class="form-control" id="ingles">
                <option value="N">No requerido</option>
                <option value="A">Avanzado</option>
                <option value="B">Básico</option>
                <option value="T">Técnico</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Equipo Requerido</label></b></div>
            <div class="col-9">
              <select name="equipo" class="form-control" id="equipo">
                <option value="N">No</option>
                <option value="S">Si</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Manejo de Personal</label></b></div>
            <div class="col-9">
              <select name="manejoP" class="form-control" id="manejoP">
                <option value="N">No</option>
                <option value="S">Si</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Horario de Trabajo </label></b></div>
            <div class="col-9"><input type="text" class="form-control" id="horario"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="req">Disponibilidad para viajar</label></b></div>
            <div class="col-9">
              <select name="viaje" class="form-control" id="viaje">
                <option value="N">No</option>
                <option value="S">Si</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-3"><b><label for="sueldoneto">Sueldo neto</label></b></div>
            <div class="col-9">
              <input type="text" class="form-control" id="sueldoneto" onkeypress="return justNumbers(event);">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <b><label for="req">Objetivo de la Posición</label></b>
              <textarea name="objetivo" id="objetivo" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <b><label for="req">Responsabilidades y Funciones Principales</label></b>
              <textarea name="responsabilidades" id="responsabilidades" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <b><label for="req">Conocimientos y Experiencia </label></b>
              <textarea name="conocimientos" id="conocimientos" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <b><label for="req">Cursos o Certificaciones</label></b>
              <textarea name="cursos" id="cursos" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-12">
              <b><label for="req">Tecnologías, Plataformas y Versiones requeridas</label></b>
              <textarea name="tecnologias" id="tecnologias" class="form-control"></textarea>
            </div>
          </div>
        </div>

        <div class="form-check text-center mb-5">
          <input type="checkbox" class="form-check-input" id="autoasig">
          <b><label class="form-check-label" for="autoasig">Autoasignación</label></b>
        </div>
        <div class="form-group mb-5">
          <div class="text-center">
            <button type="submit" class="btn btn-success" onclick="creaReq()">Crear</button>
            <button type="clear" class="btn btn-info" onclick="reset()">Limpiar Formulario</button>
          </div>
        </div>      
      </div>
    </div>
  </div>

  <div id="elmensajeB" style="position:fixed; top:0; left:0; width:100%;" class="alert alert-messageInfo">
      <p id="cualmensajeB" style="color: #000000;"><strong>Listo!</strong>XXX</p>
    </div>

</div>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7QgQYchn25aDAcO2cN8hxjw44pwNNq-k">
</script>

<div id="modalUbica" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="color:#000;" class="modal-title"><p id="elHeaderConNombreLoc"></p></h4>
        <button style="background:#fff;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <p style="visibility:hidden; display:none;" id="tipo"></p>
        <div id="showCliente" class="form-group">
          <label for="clienteNombre"><b>Cliente:</b></label>
          <input type="text" class="form-control" id="clienteNombre" />
        </div>
        <div class="form-group">
          <label for="address"><b>Digite Calle #No.Oficial Colonia/Localidad</b></label>
          <input type="text" class="form-control" id="address" placeholder="" />
          <p><small>Si su busqueda no arroja los resultados deseados, intente añadiendo o removiendo parámetros</small></p>
        </div>
        <div>
          <input type="button" class="btn btn-success" id="search" value="Buscar" />
        </div>
        <br>
        <div class="form-group" id="div-geocode" style="display: none;">
          <div><label>Los resultados de su búsqueda son:</label></div><br>
          <div>Dirección: <b><label id="addcom"></label></b></div>
          <br>
          <div style="display: none;">Calle y número: <label id="strgeo"></label> <label id="numgeo"></label></div>
          <div style="display: none;">Localidad: <label id="locgeo"></label></div>
          <div style="display: none;">Código Postal: <label id="cpgeo"></label></div>
          <div style="display: none;">Municipio: <label id="mungeo"></label></div>
          <div style="display: none;">Estado: <label id="estgeo"></label></div>
          <div style="display: none;">País: <label id="ctygeo"></label></div>
        </div>

        <div class="form-group" id="mine" style="display: none;">
          <div>Latitud: <label id="latgeo"></label></div>
          <div>Longitud: <label id="longeo"></label></div>
        </div>

        <br/>

        <div class="form-group">
      <div style="height:500px; border-radius:16px 16px 16px 16px; margin-bottom:0px; margin-left: auto; margin-right: auto;" id="map"></div>
      </div>

      </div>
      <div class="modal-footer text-justify">
        <span id="mensajeInfoU" class="form-control">&nbsp;</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarLoc" onclick="javascript:guardaUbicacion();">Guardar</button>
      </div>
      <div id="elmensajeM" style="position:fixed; top:0; left:0; width:100%;" class="alert alert-messageInfo">
        <p id="cualmensajeM"><strong>Listo!</strong>XXX</p>
      </div>
    </div>
  </div>
</div>



<script>

  $("#mensajeUbica").css("display", "none");
  $("#elmensajeB").css("display", "none");
  $("#elmensajeM").css("display", "none");

  $(document).ready(function(){
    llenaCombos();
  });

  function justNumbers(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 40)/* || (keynum == 8) || (keynum == 40)*/)
    return true;
     
    return /\d/.test(String.fromCharCode(keynum));
  }  

  var map;

  function load_map() {
      var myLatlng = new google.maps.LatLng(20.68009, -101.35403);
      var myOptions = {
          zoom: 4,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);
  }

  $('#search').click('click', function() {
      // Obtenemos la dirección y la asignamos a una variable
      var address = $('#address').val();
      // Creamos el Objeto Geocoder
      var geocoder = new google.maps.Geocoder();
      // Hacemos la petición indicando la dirección e invocamos la función
      // geocodeResult enviando todo el resultado obtenido
      geocoder.geocode({ 'address': address}, geocodeResult);
  });

  function geocodeResult(results, status) {
      // Verificamos el estatus
      if (status == 'OK') {
          // Si hay resultados encontrados, centramos y repintamos el mapa
          // esto para eliminar cualquier pin antes puesto
          var mapOptions = {
              center: results[0].geometry.location,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
          // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
          map.fitBounds(results[0].geometry.viewport);
          // Dibujamos un marcador con la ubicación del primer resultado obtenido
          var markerOptions = { position: results[0].geometry.location }
          var marker = new google.maps.Marker(markerOptions);
          marker.setMap(map);
      } else {
          // En caso de no haber resultados o que haya ocurrido un error
          // lanzamos un mensaje con el error
          alert("Geocoding no tuvo éxito debido a: " + status);
      }
  }

  function addUbicacion(param){
    initMap();

    $('#addcom').html('');
    $('#tipo').html('');
    $('#address').val('');
    $('#clienteNombre').val('');
    $('#div-geocode').css('display','none');
    $("#modalUbica .modal-footer #mensajeInfoU").html('&nbsp;');

    var titulo = "";
    
    if(param==1){
      titulo = "Agrega Cliente";
      $('#showCliente').css('display','block');
    }else if(param==2){
      titulo = "Modifica ubicación del cliente";
      $('#showCliente').css('display','none');
    }else{
      titulo = "Agrega nueva ubicación laboral";
      $('#showCliente').css('display','none');
    }

    $("#modalUbica .modal-header #elHeaderConNombreLoc").html(titulo);
    $("#modalUbica .modal-body #tipo").html(param);

    $('#modalUbica').modal('show');

  }

  function initMap(){

          //var map;
    var myLatLng = {lat:19.432608, lng:-99.133209};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      scrollwheel: true,
      center: myLatLng
    });



    $('#search').on('click', function() {
      // Obtenemos la dirección y la asignamos a una variable
        $('#strgeo').html('');
        $('#numgeo').html('');
        $('#locgeo').html('');
        $('#cpgeo').html('');
        $('#mungeo').html('');
        $('#estgeo').html('');
        $('#ctygeo').html('');
        $('#addcom').html('');
        $('#latgeo').html('');
        $('#longeo').html('');

        var datos = $('#address').val();
        var address = datos;

        //alert(address);
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocodeResult);
    });

    function geocodeResult(results, status) {

      var numero = "";
          var calle = "";
          var localidad = "";
          var municipio = "";
          var estado = "";
          var pais = "";
          var zipcode = "";
        // Verificamos el estatus

        var infowindow = new google.maps.InfoWindow();

        if (status == 'OK') {

            // Si hay resultados encontrados, centramos y repintamos el mapa
            // esto para eliminar cualquier pin antes puesto
            var mapOptions = {
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map($("#map").get(0), mapOptions);
            // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
            map.fitBounds(results[0].geometry.viewport);
            // Dibujamos un marcador con la ubicación del primer resultado obtenido

            var direcMark = '<div id="content">Dirección:&nbsp;<b>'+results[0].formatted_address+'</b></div>';

            var markerOptions = {
              draggable: false,
              animation: google.maps.Animation.DROP,
              title: 'Dirección: '+results[0].formatted_address,
              icon: 'views/modules/img/maps-and-flags32.png',
              position: results[0].geometry.location
            }

            var marker = new google.maps.Marker(markerOptions);
            marker.setMap(map);

            google.maps.event.addListener(marker,'click', (function(marker,direcMark,infowindow){
          return function() {
            infowindow.setContent(direcMark);
            infowindow.open(map,marker);
          };
        })(marker,direcMark,infowindow));

            var mio="";
            for(var j=0;j < results[0].address_components.length; j++){
                  for(var k=0; k < results[0].address_components[j].types.length; k++){

                    mio = mio+"\n"+results[0].address_components[j].types[k]+"--"+results[0].address_components[j].long_name;

                      if(results[0].address_components[j].types[k] == "postal_code"){
                          zipcode = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "locality"){
                          municipio = results[0].address_components[j].long_name;
                      }else{
                      }

                      if(results[0].address_components[j].types[k] == "route"){
                          calle = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "neighborhood"){
                          localidad = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "sublocality"){
                          localidad = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "administrative_area_level_1"){
                          estado = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "country"){
                          pais = results[0].address_components[j].long_name;
                      }else{}

                      if(results[0].address_components[j].types[k] == "street_number"){
                          numero = results[0].address_components[j].long_name;
                          $('#numgeo').html("#"+numero);
                      }
                  }
              }
              //alert(mio);

            $('#strgeo').html(calle);
            $('#locgeo').html(localidad);
            $('#cpgeo').html(zipcode);
            $('#mungeo').html(municipio);
            $('#estgeo').html(estado);
            $('#ctygeo').html(pais);
            $('#latgeo').html(results[0].geometry.location.lat);
            $('#longeo').html(results[0].geometry.location.lng);
            $('#addcom').html(results[0].formatted_address);
            document.getElementById("div-geocode").style.display='block';


        } else {
            //alert("Verifique sus datos, e intentelo de nuevo!!!");
        }
    }



  }

  var copiaClientes = [];

  function llenaCombos(){

    var inicia = false;
    var tamaniodelJSON = 0;
    var copiadelJSON;

    var element = document.getElementById("clientes");
    while (element.firstChild) {
      element.removeChild(element.firstChild);
    }

    var element = document.getElementById("prioridad");
    while (element.firstChild) {
      element.removeChild(element.firstChild);
    }

    var clientesHTML ="";
    var prioridadHTML ="";

    clientesHTML = clientesHTML + "<option value='0'> Selecciona un cliente </option>";         
    // prioridadHTML = prioridadHTML + "<option value='0'> Asigna una prioridad </option>"; 

    $.ajax({

      type: 'POST',
      url: 'controllers/rdataCombosReq.php',

      success: function (response) {

        if (response.info[0].success) {

          copiaClientes = JSON.parse(JSON.stringify(response.clientes));

          for(var i=0; i<response.clientes.length; i++){
            clientesHTML = clientesHTML + "<option value="+response.clientes[i].id+">"+response.clientes[i].nombre+"</option>";         
          }

          for(var i=0; i<response.prioridad.length; i++){
            prioridadHTML = prioridadHTML + "<option value="+response.prioridad[i].id+">"+response.prioridad[i].nombre+"</option>";         
          }

        }else{
          clientesHTML="";
          prioridadHTML="";
        }         

        $("#clientes").append(clientesHTML);
        $("#prioridad").append(prioridadHTML);
      }
    });      
  }

  $('select#clientes').change(function(){
    var client = $('select#clientes').val();
    var ubicacion = "";
    for(index in copiaClientes){
      if(client==copiaClientes[index].id){
        $('#lugar').val(copiaClientes[index].ubicacion);
        $('#ubicacion').val(copiaClientes[index].ubicacionentrevistas);
      }
    }

    if(client=="" || client == "0"){
      $('#ub1').css('display','none');
      $('#ub2').css('display','none');
      $('#lugar').val('');
      $('#ubicacion').val('');
    }else{
      $('#ub1').css('display','block');
      $('#ub2').css('display','block');
    }

  });

  function guardaUbicacion(){

    var estaOK = true;
    var direccion = $('#addcom').html();
    var tipo = $('#tipo').html();
    var accion="";

    if(tipo==1){
      var cliente = $('#clienteNombre').val();
      var direccion2 = "";
      accion = "INS";

      if(cliente==""){
        estaOK = false;
        alert('Completa los campos');
        $('#clienteNombre').focus();
        e.preventDefault();
        return false;
      }
    }else if(tipo==2){
      var cliente = $('select#clientes').val();
      accion = "UPD";
    }else{
      var cliente = $('select#clientes').val();
      accion = "UPD2";
    }

    if(direccion==""){
      estaOK = false;
      alert('No existe una dirección válida');
      $('#address').focus();
      e.preventDefault();
      return false;
    }

    if(estaOK){

      $("#modalUbica .modal-footer #mensajeInfoU").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>  Procesando datos!...');
      $("#modalUbica .modal-footer #btnGuardar").prop('disabled', true);

      $.ajax({

        type: 'POST',
        url: 'controllers/guardaUbicacion.php',
        data: {
          'cliente': cliente,
          'direccion': direccion,
          'tipo' : tipo,
          'action' : accion
        },

        success: function (response) {
          if (response.info[0].success) {

            $("#modalUbica .modal-footer #mensajeInfoU").html('&nbsp;');

            if(tipo==1){
              $("#clientes").append("<option value="+response.info[0].elid+">"+cliente+"</option>");
              $('select#clientes').val(response.info[0].elid);
              $('#lugar').val(direccion);
              $('#ubicacion').val(direccion);
              $('#ub1').css('display','block');
              $('#ub2').css('display','block');
            }else if(tipo==2){
              $('#lugar').val(direccion);
            }else{
              $('#ubicacion').val(direccion);
            }          

            $("#cualmensajeM").html("<font color='white'><strong>Listo!</strong> La información se guardo correctamente.</font>"); 

            $('#elmensajeM').slideDown('1000', function() {
              $('#elmensajeM').slideUp('2000', function() {
                $('#modalUbica').modal('toggle');
                $("#modalUbica .modal-footer #btnGuardar").prop('disabled', false);
              }).delay(750);
            }).delay(750);

          }else{

            alert(response.info[0].success+' - '+response.info[0].q+' - '+response.info[0].error);
            $("#myModal .modal-footer #btnGuardar").prop('disabled', false);

          }
        }
      });
      return false;
    }


  }

  function reset(){
    // location.reload();

    $('#tituloP').val("");
    $('#recursos').val("");
    $('select#clientes').val("");
    $('#lider').val("");
    $('#area').val("");
    $('#tituloR').val("");
    $('select#contrato').val("");
    $('select#prioridad').val("");
    $('#nombreP').val("");
    $('#lugar').val("");
    $('#ubicacion').val("");
    $('#duracion').val("");
    $('select#ingles').val("");
    $('select#equipo').val("");
    $('select#manejoP').val("");
    $('#horario').val("");
    $('#viaje').val("");
    $('#objetivo').val("");
    $('#responsabilidades').val("");
    $('#conocimientos').val("");
    $('#cursos').val("");
    $('#tecnologias').val("");
    $('#sueldoneto').val("");
    $("#autoasig").prop('checked', false); 
  }

  function creaReq(){

    var estaOK = true;

    var titulo = $('#tituloP').val();
    var recursos = $('#recursos').val();
    var client = $('select#clientes').val();
    var lider = $('#lider').val();
    var area = $('#area').val();
    var tituloR = $('#tituloR').val();
    var contrato = $('select#contrato').val();
    var prioridad = $('select#prioridad').val();
    var nombreP = $('#nombreP').val();
    var lugar = $('#lugar').val();
    var ubicacion = $('#ubicacion').val();
    var duracion = $('#duracion').val();
    var ingles = $('select#ingles').val();
    var equipo = $('select#equipo').val();
    var manejoP = $('select#manejoP').val();
    var horario = $('#horario').val();
    var viaje = $('#viaje').val();
    var objetivo = $('#objetivo').val();
    var responsabilidades = $('#responsabilidades').val();
    var conocimientos = $('#conocimientos').val();
    var cursos = $('#cursos').val();
    var tecnologias = $('#tecnologias').val();
    var sueldoneto = $('#sueldoneto').val();
    var autoasig = "";

    if(titulo==""){
      estaOK = false;
      alert('Debe dar un título al requerimiento');
      $('#tituloP').focus();
      e.preventDefault();
      return false;
    }

    if(recursos==""){
      estaOK = false;
      alert('Debes proporcionar el número de recursos');
      $('#recursos').focus();
      e.preventDefault();
      return false;
    }

    if(lider==""){
      estaOK = false;
      alert('Complete el nombre del Líder a Reportar');
      $('#lider').focus();
      e.preventDefault();
      return false;
    }

    if(area==""){
      estaOK = false;
      alert('Debe asignar un área al requerimiento');
      $('#area').focus();
      e.preventDefault();
      return false;
    }

    if(tituloR==""){
      estaOK = false;
      alert('Debe dar un título de puesto');
      $('#tituloR').focus();
      e.preventDefault();
      return false;
    }

    if(nombreP==""){
      estaOK = false;
      alert('Debe dar un nombre al proyecto');
      $('#nombreP').focus();
      e.preventDefault();
      return false;
    }

    if(lugar==""){
      estaOK = false;
      alert('Debe asignar una dirección');
      $('#lugar').focus();
      e.preventDefault();
      return false;
    }

    if(ubicacion==""){
      estaOK = false;
      alert('Debe asignar una dirección');
      $('#ubicacion').focus();
      e.preventDefault();
      return false;
    }

    if(duracion==""){
      estaOK = false;
      alert('Debe dar una duración al requerimiento');
      $('#duracion').focus();
      e.preventDefault();
      return false;
    }

    if(horario==""){
      estaOK = false;
      alert('Proporcione un horario');
      $('#horario').focus();
      e.preventDefault();
      return false;
    }

    if(sueldoneto==""){
      estaOK = false;
      alert('Proporcione un sueldo neto mensual');
      $('#sueldoneto').focus();
      e.preventDefault();
      return false;
    }

    if(objetivo==""){
      estaOK = false;
      alert('Debe brindar el objetivotítulo');
      $('#objetivo').focus();
      e.preventDefault();
      return false;
    }

    if(responsabilidades==""){
      estaOK = false;
      alert('Debe asignar responsabilidades al requerimiento');
      $('#responsabilidades').focus();
      e.preventDefault();
      return false;
    }

    if(conocimientos==""){
      estaOK = false;
      alert('Debe establecer los conocimientos necesarios');
      $('#conocimientos').focus();
      e.preventDefault();
      return false;
    }

    if(cursos==""){
      estaOK = false;
      alert('Debe establecer los cursos necesarios');
      $('#cursos').focus();
      e.preventDefault();
      return false;
    }

    if(tecnologias==""){
      estaOK = false;
      alert('Debe establecer las tecnologías necesarias');
      $('#tecnologias').focus();
      e.preventDefault();
      return false;
    }

    if(client=="" || client == "0"){
      estaOK = false;
      alert('Debe seleccionar un cliente');
      $('select#clientes').focus();
      e.preventDefault();
      return false;
    }

    if(prioridad=="" || prioridad == "0"){
      estaOK = false;
      alert('Debe asignar una prioridad');
      $('select#prioridad').focus();
      e.preventDefault();
      return false;
    }

    if($('#autoasig').is(':checked')){
      autoasig = "S";
    }else{
      autoasig = "N";
    }

    if(estaOK){      

      $.ajax({

        type: 'POST',
        url: 'controllers/procesaRequerimiento.php',
        data: {
          'titulo': titulo,
          'recursos': recursos,
          'client': client,
          'lider': lider,
          'area': area,
          'tituloR': tituloR,
          'contrato': contrato,
          'prioridad': prioridad,
          'nombreP': nombreP,
          'lugar': lugar,
          'ubicacion': ubicacion,
          'duracion': duracion,
          'ingles': ingles,
          'equipo': equipo,
          'manejoP': manejoP,
          'horario': horario,
          'viaje': viaje,
          'objetivo': objetivo,
          'responsabilidades': responsabilidades,
          'conocimientos': conocimientos,
          'cursos': cursos,
          'tecnologias': tecnologias,
          'autoasig': autoasig,
          'sueldoneto': sueldoneto,
          'action': "INS"
        },

        success: function (response) {

          if (response.info[0].success) {

            $("#cualmensajeB").html("<font color='white'><strong>Listo!</strong> El requerimiento esta en proceso de revisión!!.</font>");

            $('#elmensajeB').slideDown('1000', function() {
              $('#elmensajeB').slideUp('2000', function() {
                location.reload();
              }).delay(750);
            }).delay(750);

          }
          else{

            alert(response.info[0].success+' - '+response.info[0].q+' - '+response.info[0].error);
            $("#myModal .modal-footer #btnGuardar").prop('disabled', false);

          }
        }
      });

      return false;

    }

  }
  
</script>