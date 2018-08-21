<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['idU'], $_GET['tiU'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		date_default_timezone_set('America/Mexico_City');

    	$fechayhora = date('Y-m-d H:i:s');

		require_once "functions.php";

		$con = conectar_bd();

		$contadorT = 0;

		$idU = $_GET['idU'];
		$tiU = $_GET['tiU'];

		$asignaciones = [];

		if($tiU=="AR" || $tiU=="A"){

			$rec = [];

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

			$sql ="SELECT
						asig.requerimiento as id,
						asig.reclutador as recAsignado,
						req.puesto as puesto,
					    cli.nombre as cliente,
					    req.recursos as vacantes,
					    usu.nombre as reclutador,
					    sta.nombre as status,
					    req.asignado,
					    asig.visto,
					    asig.cumplido,
					    (SELECT count(*) FROM gis.postulaciones where gis.postulaciones.vacante=req.id) as postulaciones,
    					(SELECT count(*) FROM gis.postulaciones where gis.postulaciones.vacante=req.id AND gis.postulaciones.status=7) as cubiertas  
					FROM gis.asignaciones as asig
						INNER JOIN gis.requerimientos as req ON req.id = asig.requerimiento
					    INNER JOIN gis.clientes as cli ON req.cliente = cli.id
					    INNER JOIN gis.usuarios as usu ON asig.reclutador = usu.id
					    INNER JOIN gis.status as sta ON req.status = sta.id
					;";

			if ($result = mysqli_query($con, $sql)){

				while($row = mysqli_fetch_array($result)){

					$contadorT = 1;

					$id = $row['id'];
					$puesto = $row['puesto'];
					$cliente = $row['cliente'];
					$vacantes = $row['vacantes'];
					$reclutador = $row['reclutador'];
					$recAsignado = $row['recAsignado'];
					$status = $row['status'];
					$postulaciones = $row['postulaciones'];
					$cubiertas = $row['cubiertas'];
					$asignado = $row['asignado'];
					$visto = $row['visto'];
					$cumplido = $row['cumplido'];

					$porcentaje = ($cubiertas*100)/$vacantes;

					if($porcentaje>0)	$porcentaje = number_format($porcentaje, 2);
					else $porcentaje = 0;

					$reclutadores = "";
					for($i=0; $i<=sizeof($rec); $i++){
						
						$asig = [];

						if($i==sizeof($rec)){

							for($j=0; $j<2; $j++){

								$asig = [];

								if($j==0){

									$asig[] = array(
										'idReq' => $id,
										'puesto' => $puesto,
										'idRec' => 0,
										'reclutador' => "Asignar a faltantes",
										'reclutadorAnterior' => $recAsignado
									);

									$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'>Asignar <b>".$puesto."</b> a los <b>reclutadores faltantes</b></a>";
								}else{

									$asig[] = array(
										'idReq' => $id,
										'puesto' => $puesto,
										'idRec' => -1,
										'reclutador' => "Quitar Asignacion",
										'reclutadorAnterior' => $recAsignado
									);

									$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'><b>Eliminar todas</b> las asignacies de <b>".$puesto."</b></a>";
								}
							}

						}else{

							$asig = [];

							if($rec[$i]['idR']!=$recAsignado){

								$asig[] = array(
									'idReq' => $id,
									'puesto' => $puesto,
									'idRec' => $rec[$i]['idR'],
									'reclutador' => $rec[$i]['nombreR'],
									'reclutadorAnterior' => $recAsignado
								);

								$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'>Asignar <b>".$puesto."</b> a <b>".$rec[$i]['nombreR']."</b></a>";

							}else{

								$asig[] = array(
									'idReq' => $id,
									'puesto' => $puesto,
									'idRec' => -2,
									'reclutador' => "Quitar Asignacion",
									'reclutadorAnterior' => $recAsignado
								);

								$reclutadores = $reclutadores."<a class='dropdown-item on' onclick='asignar(".json_encode($asig).");return false;'><b>Eliminar</b> asignación de <b>".$puesto."</b> a <b>".$rec[$i]['nombreR']."</b></a>";
							}

						}
					}

					$asignar = "<span title='Asignar $puesto'><div class='dropdown'><i class='fas fa-share-alt' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>".$reclutadores."</div></div></span>";	



					$asignaciones[] = array(
						'id' => $id,
						'puesto' => $puesto,
						'cliente' => $cliente,
						'vacantes' => $vacantes,
						'reclutador' => $reclutador,
						'status' => $status,
						'postulaciones' => $postulaciones,
						'cubiertas' => $cubiertas,
						'porcentaje' => $porcentaje,
						'asignado' => $asignado,
						'visto' => $visto,
						'cumplido' => $cumplido,
						'editar' => $asignar
					);
				}
			}

		}else{

			$reclutador=$_SESSION['idUser'];

			$sqlReq ="UPDATE gis.requerimientos set status = 3 WHERE id IN (SELECT requerimiento FROM gis.asignaciones WHERE reclutador=$reclutador);";
			$resultReq = mysqli_query($con, $sqlReq);

			$sqlVac ="UPDATE gis.vacantes set status = 3 WHERE id IN (SELECT requerimiento FROM gis.asignaciones WHERE reclutador=$reclutador);";
			$resultVac = mysqli_query($con, $sqlVac);

			$sqlAsig ="UPDATE gis.asignaciones set visto = '$fechayhora' WHERE reclutador=$reclutador;";
			$resultAsig = mysqli_query($con, $sqlAsig);			

			$sql ="SELECT
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
			WHERE (req.status != 7 or req.status != 6) AND req.asignado is not null AND req.id IN 
			(SELECT requerimiento FROM gis.asignaciones where reclutador=$reclutador)
			;
			";

			if ($result = mysqli_query($con, $sql)){

				while($row = mysqli_fetch_array($result)){

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

					$detA = [];

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

					$detalles = "<span title='Ver detalles' onclick='detalles(".json_encode($detA).");return false;'><i class='fas fa-info-circle'></i></span>";

					$asignar = "<span title='Postular candidatos para $puesto' onclick='postular(".json_encode($detA).");return false;'><i class='far fa-address-book'></i></span>";

					

					$asignaciones[] = array(
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

		}
		
		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'data' => $asignaciones));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'data' => $asignaciones));

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
