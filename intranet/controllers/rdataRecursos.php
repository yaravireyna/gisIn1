<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['idP'], $_GET['idR'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		$con = conectar_bd();

		$contadorT = 0;

		$idP = $_GET['idP'];
		$idR = $_GET['idR'];

		$recursos = [];

		if($idP==0){
			$sql ="SELECT 
				usu.id,
			    usu.nombre,
			    per.perfil,
			    cv.generales,
			    cv.habilidades,
			    cv.cursos,
			    cv.ctecnicos,
			    cv.experiencia,
			    cv.archivo,
			    cv.video
			FROM gis.cv as cv
			INNER JOIN gis.usuarios as usu ON cv.usuario = usu.id
			INNER JOIN gis.perfiles as per ON cv.perfil = per.id
			WHERE usu.activo=1 AND tipo = 'U'
			;";
		}else{
			$sql ="SELECT 
				usu.id,
			    usu.nombre,
			    per.perfil,
			    cv.generales,
			    cv.habilidades,
			    cv.cursos,
			    cv.ctecnicos,
			    cv.experiencia,
			    cv.archivo,
			    cv.video
			FROM gis.cv as cv
			INNER JOIN gis.usuarios as usu ON cv.usuario = usu.id
			INNER JOIN gis.perfiles as per ON cv.perfil = per.id
			WHERE usu.activo=1 AND tipo = 'U' AND per.id=$idP
			;";
		}

		if ($result = mysqli_query($con, $sql)){

			while($row = mysqli_fetch_array($result)){

				$contadorT = 1;

				$id = $row['id'];
				$nombre = $row['nombre'];
				$perfil = $row['perfil'];
				$generales = $row['generales'];
				$habilidades = $row['habilidades'];
				$cursos = $row['cursos'];
				$ctecnicos = $row['ctecnicos'];
				$experiencia = $row['experiencia'];
				$archivo = $row['archivo'];
				$video = $row['video'];

				$sqlP ="SELECT COUNT(*) as postulado FROM gis.postulaciones WHERE vacante=$idR AND usuario=$id;";
				$resultP = mysqli_query($con, $sqlP);
				$rowP = mysqli_fetch_array($resultP);
				$postulado = $rowP['postulado'];

				$detA = [];

				$detA[] = array(
					'id' => $id,
					'idR' => $idR,
					'nombre' => $nombre,
					'cv' => $archivo,
					'video' => $video,
					'postulado' => $postulado,
					'q' => $sqlP
				);

				// $detalles = "<span title='Postular candidatos para $puesto' onclick='verVideo(".json_encode($detA).");return false;'><i class='far fa-address-book'></i></span>";

				// $cv = "<span title='Ver CV de $nombre' onclick='verCV(".json_encode($detA).");return false;'><i class='far fa-address-book'></i></span>";

				if($archivo!=""){
					$cv = "<a href='views/modules/src/pdf/".$archivo."' target='_blank'><span class='red' title='Ver CV de $nombre'><i class='far fa-address-book'></i></span></a>";

					if($postulado==0){
						$postular = "<span title='Postular a $nombre' onclick='postularCandidato(".json_encode($detA).");return false;'><button type='button' class='btn btn-danger btn-rounded btn-md ml-4'>Postular</button></span>";
					}else{
						$postular = "<span class='red' title='$nombre ya se ha postulado esta vacante!'><i class='fas fa-thumbs-up'></i></span>";
					}
				}else{
					$cv="";
					$postular="";
				}

				if($video!=""){
					$video = "<span class='red' title='Ver Video Curriculum de $nombre' onclick='verVideo(".json_encode($detA).");return false;'><i class='fab fa-youtube' style='color: red;'></i></span>";
				}else{
					$video="";
				}

				if($postulado==1){
					$postular = "<span class='red' title='$nombre ya esta postulado para esta vacante'><i class='fas fa-thumbs-up'></i></span>";
				}				

				$recursos[] = array(
					'id' => $id,
					'perfil' => $perfil,
					'recurso' => $nombre,
					'detalle' => $generales,
					'cv' => $cv,
					'video' => $video,
					'postular' => $postular
				);
			}
		}			
		
		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'data' => $recursos));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'data' => $recursos));

		}

		mysqli_free_result($result);

	}else{

	    $info[] = array (
	      'id' => 0,
	      'success' => false,
	      'msg' => "Error en la sesión"
	    );

	    echo json_encode(array('info' => $info));
	}

?>
