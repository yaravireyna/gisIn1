<?php

  session_start();
  header('Content-Type: application/json');

  //if(isset($_SESSION['idU'], $_SESSION["ndU"]) &&){
  if((isset($_SESSION['idUser'], $_SESSION["nomUser"], $_POST["laFecha"]) && (isset($_SERVER["HTTP_REFERER"])))){

    include "lib.php";

    $contadorT = 0;

    $con = conectar_bd();

    $citas = [];

    $laFecha = $_POST["laFecha"];

    $sql = "SELECT fechaprogramado FROM myservice.soporteprogramado where fechaprogramado like '$laFecha%';";

    if (!$result = mysqli_query($con, $sql)){

      echo("Error!" . mysqli_error($con));

      die();
    }
    else{

      while($row = mysqli_fetch_array($result)){

        $contadorT = 1;

        $laFechaC = $row['fechaprogramado'];

        $espacio = strpos($laFechaC, " ");
        $puntos = strpos($laFechaC, ":");

        $hora = substr($laFechaC, ($espacio+1), 2);
        $minutos = substr($laFechaC, ($puntos+1), 2);

        $fechaC = substr($laFechaC, 0, 10);

        $nuevaHI = $hora-1;
        $nuevaHF = $hora+1;

        if($nuevaHI<10){
          $nuevaHI="0".$nuevaHI;
        }

        if($nuevaHF<10){
          $nuevaHF="0".$nuevaHF;
        }

        $fechainicio = $fechaC." ".$nuevaHI.":".$minutos;
        $fechatermino = $fechaC." ".$nuevaHF.":".$minutos;

        $citas[] = array(

          'inicio' => $fechainicio,
          'termino' => $fechatermino

        );
      }
    }

    
    mysqli_free_result($result);
    mysqli_close($con);

    if ($contadorT){

      $info[] = array (
        'id' => 1,
        'success' => true
      );

      echo json_encode(array('info' => $info, 'data' => $citas));
    }
    else{

      $info[] = array (
        'id' => 0,
        'success' => false
      );

      echo json_encode(array('info' => $info, 'data' => $citas));

    }

    

  }else{

    $info[] = array (
        'id' => 0,
        'success' => false,
        'error' => 'Erro en la sesión'
      );

      echo json_encode(array('info' => $info));

      die();

  }

?>
