<?php

  session_start();
  header('Content-Type: application/json');

  if((isset($_SESSION['idUser'], $_SESSION["nombreUser"])) && (isset($_SERVER["HTTP_REFERER"]))){

        include "../../lib.php";

        $con = conectar_bd();
        mysqli_set_charset($con,"utf8");

        date_default_timezone_set('America/Mexico_City');

        $idUser = $_SESSION['idUser'];
        $titulo = $_POST['titulo'];
        $recursos = $_POST['recursos'];
        $client = $_POST['client'];
        $lider = $_POST['lider'];
        $area = $_POST['area'];
        $tituloR = $_POST['tituloR'];
        $contrato = $_POST['contrato'];
        $prioridad = $_POST['prioridad'];
        $nombreP = $_POST['nombreP'];
        $lugar = $_POST['lugar'];
        $ubicacion = $_POST['ubicacion'];
        $duracion = $_POST['duracion'];
        $ingles = $_POST['ingles'];
        $equipo = $_POST['equipo'];
        $manejoP = $_POST['manejoP'];
        $horario = $_POST['horario'];
        $viaje = $_POST['viaje'];
        $sueldoneto = $_POST['sueldoneto'];
        $objetivo = $_POST['objetivo'];
        $responsabilidades = $_POST['responsabilidades'];
        $conocimientos = $_POST['conocimientos'];
        $cursos = $_POST['cursos'];
        $tecnologias = $_POST['tecnologias'];
        $autoasig = $_POST['autoasig'];
        $action = $_POST["action"];

        $fechayhora = date('Y-m-d H:i:s');

        switch($action){
          case 'INS': {
            $sql = "INSERT INTO gis.requerimientos (usuario, puesto, recursos, cliente, lider, area, tituloreporta, contrato, prioridad, proyecto, direcciontrabajo, direccioncliente, duracion, ingles, equipo, manejopersonal, horario, disponibilidadviaje, objetivo, responsabilidades, conocimientos, cursos, tecnologias, sueldoneto, creado) VALUES ('$idUser', '$titulo', '$recursos', '$client', '$lider', '$area', '$tituloR', '$contrato', '$prioridad', '$nombreP', '$lugar', '$ubicacion', '$duracion', '$ingles', '$equipo', '$manejoP', '$horario', '$viaje', '$objetivo', '$responsabilidades', '$conocimientos', '$cursos', '$tecnologias', '$sueldoneto', '$fechayhora');";
            break;
          }
        }

        if (!$result = mysqli_query($con, $sql)) {

          $info[] = array (
              'id' => 0,
              'success' => false,
              'elid' => 0,
              'error' => mysqli_error($con)
          );

          echo json_encode(array('info' => $info));

          die();
        }else{

          $idNC = mysqli_insert_id($con);

          if($action=="INS"){

            $sqlVer = "SELECT id as idPuesto, perfil, cliente FROM gis.perfiles where perfil like '$titulo' and cliente='$client';";
            $resultVer = mysqli_query($con, $sqlVer);

            if(mysqli_num_rows($resultVer)==0){

              $sqlP = "INSERT INTO gis.perfiles (perfil, cliente, creado, actualizado) VALUES ('$titulo', '$client', '$fechayhora', '$fechayhora');";

              $resultP = mysqli_query($con, $sqlP);

              $idPuesto = mysqli_insert_id($con);

            }else{

              $rowVer = mysqli_fetch_array($resultVer);

              $idPuesto = $rowVer['idPuesto'];

            }

            $descripcion=$objetivo."\n\n".$responsabilidades."\n\n".$conocimientos."\n\n".$cursos."\n\n".$tecnologias;

            $sqlVac = "INSERT INTO gis.vacantes (usuario, perfil, ubicacion, recursos, salario, descripcion, imagen, creado) VALUES ('$idUser', '$idPuesto', '$lugar', '$recursos','$sueldoneto', '$descripcion', 'imagen.jpeg', '$fechayhora');";

            $resultVac = mysqli_query($con, $sqlVac);

            if($autoasig=="S"){
              $sqlAsig = "INSERT INTO gis.asignaciones (requerimiento, usuario, autoasignado, autousuario, autofecha) VALUES ('$idNC', '$idUser', '$autoasig', '$idUser', '$fechayhora');";
              
              $resultAsig = mysqli_query($con, $sqlAsig);
            }

            
          }

          $info[] = array (
            'id' => 1,
            'success' => true,
            'q' => $sql,
            'elid' => $idNC,
            'error' => 'NO'
          );
        }       

    }else{
      $info[] = array (
                'id' => 1,
                'success' => false,
                'error' => 'Error en la sesion'
              );
    } 

    echo json_encode(array('info' => $info));

?>
