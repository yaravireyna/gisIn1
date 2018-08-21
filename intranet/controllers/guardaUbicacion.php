<?php

  session_start();
  header('Content-Type: application/json');

  if((isset($_SESSION['idUser'], $_SESSION["nombreUser"])) && (isset($_SERVER["HTTP_REFERER"]))){

        include "../../lib.php";

        $con = conectar_bd();
        mysqli_set_charset($con,"utf8");

        date_default_timezone_set('America/Mexico_City');

        $cliente = $_POST["cliente"];
        $direccion = $_POST["direccion"];
        $tipo = $_POST["tipo"];
        $action = $_POST["action"];

        $fechayhora = date('Y-m-d h:i:s');

        switch($action){
          case 'INS': {
            $sql = "INSERT INTO gis.clientes (nombre, ubicacion, creado, actualizado) VALUES ('$cliente', '$direccion','$fechayhora', '$fechayhora');";
            break;
          }

          case 'UPD': {
            $sql = "UPDATE gis.clientes SET ubicacion = '$direccion', actualizado = '$fechayhora' where id=$cliente;";
            break;
          }

          case 'UPD2': {
            $sql = "UPDATE gis.clientes SET ubicacionentrevistas = '$direccion', actualizado = '$fechayhora' where id=$cliente;";
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
