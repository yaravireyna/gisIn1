<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['param'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		$con = conectar_bd();

		$contadorT = 0;

		$req = [];
		$rec = [];

		// Reclutadores

		$sqlR ="SELECT id, nombre FROM gis.usuarios WHERE (tipo = 'OR' or tipo = 'OA') ORDER BY nombre;";

		if ($resultR = mysqli_query($con, $sqlR)){

			while($rowR = mysqli_fetch_array($resultR)){

				$idR = $rowR['id'];
				$nombreR = $rowR['nombre'];

				$rec[] = array(
					'idR' => $idR,
					'nombreR' => $nombreR
				);
			}
		}

		mysqli_free_result($resultR);

		// Pricipal

		$sql ="
			SELECT
				req.id,
				req.puesto,
				cli.nombre as cliente,
				req.contrato,
				req.recursos,
				req.direcciontrabajo,
				req.sueldoneto,
				req.objetivo,
				req.responsabilidades,
				req.conocimientos,
				req.cursos,
				req.duracion,
				req.ingles,
				req.tecnologias,
				req.creado,
				req.prioridad as valor,
				prio.nombre as prioridad,
			    sta.nombre as status
			FROM gis.requerimientos as req
				INNER JOIN gis.clientes as cli ON req.cliente = cli.id
				INNER JOIN gis.prioridad as prio ON req.prioridad = prio.id
				INNER JOIN gis.status as sta ON req.status = sta.id
			WHERE req.status = 1 AND req.asignado is null
			;
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
				$detA = [];
				$contadorT = 1;

				$id = $row['id'];
				$puesto = $row['puesto'];
				$cliente = $row['cliente'];
				$contrato = $row['contrato'];
				$direcciontrabajo = $row['direcciontrabajo'];
				$prioridad = $row['prioridad'];
				$status = $row['status'];
				$sueldoneto = $row['sueldoneto'];
				$objetivo = $row['objetivo'];
				$responsabilidades = $row['responsabilidades'];
				$conocimientos = $row['conocimientos'];
				$cursos = $row['cursos'];
				$duracion = $row['duracion'];
				$ingles = $row['ingles'];
				$tecnologias = $row['tecnologias'];
				$creado = $row['creado'];
				$recursos = $row['recursos'];
				$valor = $row['valor'];

				if($ingles=='A')$ingles="Avanzado";
				else if($ingles=='B')$ingles="Básico";
				else if($ingles=='T')$ingles="Técnico";
				else $ingles="No requerido";

				$sueldoneto = formatSueldo($sueldoneto);

				$detA[] = array(
					'id' => $id,
					'puesto' => $puesto,
					'cliente' => $cliente,
					'contrato' => $contrato,
					'direcciontrabajo' => $direcciontrabajo,
					'prioridad' => $prioridad,
					'status' => $status,
					'sueldoneto' => $sueldoneto,
					'objetivo' => $objetivo,
					'responsabilidades' => $responsabilidades,
					'conocimientos' => $conocimientos,
					'cursos' => $cursos,
					'duracion' => $duracion,
					'ingles' => $ingles,
					'tecnologias' => $tecnologias,
					'creado' => $creado,
					'vacantes' => $recursos
				);

				$reclutadores = "";
				for($i=0; $i<=sizeof($rec); $i++){
					
					$asig = [];

					if($i==sizeof($rec)){
						$asig[] = array(
							'idReq' => $id,
							'puesto' => $puesto,
							'idRec' => 0,
							'reclutador' => "Todos los reclutadores activos"
						);

						$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'>Asignar <b>".$puesto."</b> a <b>Todos los reclutadores activos</b></a>";

					}else{

						$asig[] = array(
							'idReq' => $id,
							'puesto' => $puesto,
							'idRec' => $rec[$i]['idR'],
							'reclutador' => $rec[$i]['nombreR']
						);

						$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'>Asignar <b>".$puesto."</b> a <b>".$rec[$i]['nombreR']."</b></a>";

					}
				}

				$detalles = "<span title='Ver detalles' onclick='detalles(".json_encode($detA).");return false;'><i class='fas fa-info-circle'></i></span>";

				$asignar = "<span title='Asignar $puesto'><div class='dropdown'><i class='fas fa-share-alt' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>".$reclutadores."</div></div></span>";				

				$req[] = array(
					'id' => $id,
					'puesto' => $puesto,
					'cliente' => $cliente,
					'sueldoneto' => $sueldoneto,
					'direcciontrabajo' => $direcciontrabajo,
					'prioridad' => $prioridad,
					'status' => $status,
					'responsabilidades' => $responsabilidades,
					'conocimientos' => $conocimientos,
					'cursos' => $cursos,
					'duracion' => $duracion,
					'ingles' => $ingles,
					'detalles' => $detalles,
					'asignar' => $asignar,
					'valor' => $valor
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

			echo json_encode(array('info' => $info, 'data' => $req));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'data' => $req));

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
