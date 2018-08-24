<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['param'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		$con = conectar_bd();
		$contadorT = 0;
		$candidatos = [];

		$sql ="SELECT
		usu.id,
		usu.nombre,
		usu.email,
		   cv.archivo,
		   cv.video,
		   pos.status as statusPostulacion,
		   cv.status as statusCV,
		   per.perfil,
		   cli.nombre as cliente
		FROM gis.cv as cv
		INNER JOIN gis.usuarios as usu ON cv.usuario = usu.id
		INNER JOIN gis.perfiles as per ON cv.perfil = per.id
		LEFT JOIN gis.postulaciones as pos ON cv.usuario = pos.usuario
		INNER JOIN gis.clientes as cli ON per.cliente = cli.id
		WHERE usu.tipo = 'U' and usu.activo = 1;
		";

		if (!$result = mysqli_query($con, $sql)){

			$info[] = array (
		      'id' => 0,
		      'success' => false,
		      'q' => $sql,
		      'error' => mysqli_error($con)
		    );

 			echo json_encode(array('info' => $info));

			die();
		}
		else{

			while($row = mysqli_fetch_array($result)){

				$contadorT = 1;
				$detA = [];
				$id = $row['id'];
				$perfil = $row['perfil'];
				$cliente = $row['cliente'];
				$nombre = $row['nombre'];
				$email = $row['email'];
				$archivo = $row['archivo'];
				$video = $row['video'];
				$cv = $row['statusCV'];
				$postulacion = $row['statusPostulacion'];	
				$editar = "<span title='$editar'><i class='fas fa-edit'></i></span>";
				


				
				$detA[] = array(
					'id' => $id,
					'perfil' => $perfil,
					'cliente' => $cliente,
					'nombre' => $nombre,
					'email' => $email,
					'archivo' => $archivo,
					'video' => $video,
					'statusCV' => $cv,
					'statusPos' => $postulacion
				);
				
				// Salida del archivo pdf
				if($archivo!="") {
					$archivo = "<a href='views/modules/src/pdf/".$archivo."' target='_blank'><span class='red' title='Ver CV de $nombre'><i class='far fa-address-book'></i></span></a>";
				} else {
					$archivo= "";
				}

				//Salida del video
				if($video!=""){
					$video = "<span class='red' title='Ver Video Curriculum de $nombre' onclick='verVideo(".json_encode($detA).");return false;'><i class='fab fa-youtube' style='color: red;'></i></span>";
				}else{
					$video="";
				}					

				// Tratamos la respuesta del status del cv
				if($cv == 1) {
					$cv ="<span title='$cv'><i class='fas fa-check'></i></span>";
					if ($postulacion == 9) $postulacion ="<span title='$postulacion'><i class='material-icons'>	stars</i></span>";
				}
				else $cv = "<span title='$cv'><i class='fas fa-ban'></i></span>";
				
				$candidatos[] = array(
					'id' => $id,
					'perfil' => $perfil,
					'nombre' => $nombre,
					'cliente' => $cliente,
					'email' => $email,
					'archivo' => $archivo,
					'video' => $video,
					'statusCV' => $cv,
					'statusPos' => $postulacion,
					'editar' => $editar
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
			echo json_encode(array('info' => $info, 'data' => $candidatos));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);
			echo json_encode(array('info' => $info, 'data' => $candidatos));
		}
	}
	else{

    $info[] = array (
      'id' => 0,
      'success' => false,
      'msg' => "Error en la sesión"
    );
    echo json_encode(array('info' => $info));
  }

?>