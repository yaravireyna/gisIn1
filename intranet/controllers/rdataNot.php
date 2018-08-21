<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$notificaciones = [];

		$idUser = $_SESSION['idUser'];
		$tipoUser = $_SESSION['tipoUser'];

		if($tipoUser=="A" || $tipoUser=="AR"){

			$sqlNC ="SELECT COUNT(*) as noCitN FROM gis.postulaciones where (status=4) and (cita1 is not null OR cita2 is not null OR cita3 is not null);";
			$resultNC = mysqli_query($con, $sqlNC);
			$rowNC = mysqli_fetch_array($resultNC);
			if(isset($rowNC['noCitN'])){
				$noCitN=$rowNC['noCitN'];
			}else{
				$noCitN=0;
			}
			
			$sqlNR ="SELECT COUNT(*) as noReqN FROM gis.requerimientos WHERE status=1 AND asignado is null;";
			$resultNR = mysqli_query($con, $sqlNR);
			$rowNR = mysqli_fetch_array($resultNR);
			if(isset($rowNR['noReqN'])){
				$noReqN=$rowNR['noReqN'];
			}else{
				$noReqN=0;
			}
			
			$sqlNP ="SELECT COUNT(*) as noPosN FROM gis.postulaciones where (status=1) and (cita1 is null AND cita2 is null AND cita3 is null);";
			$resultNP = mysqli_query($con, $sqlNP);
			$rowNP = mysqli_fetch_array($resultNP);
			if(isset($rowNP['noPosN'])){
				$noPosN=$rowNP['noPosN'];
			}else{
				$noPosN=0;
			}

			$sqlNV ="SELECT COUNT(*) as noVacN FROM gis.requerimientos WHERE status=7 AND asignado is not null;";
			$resultNV = mysqli_query($con, $sqlNV);
			$rowNV = mysqli_fetch_array($resultNV);
			if(isset($rowNV['noVacN'])){
				$noVacN=$rowNV['noVacN'];
			}else{
				$noVacN=0;
			}

		}else if($tipoUser=="OA" || $tipoUser=="OR"){

			$sqlNC ="SELECT COUNT(*) as noCitN FROM gis.postulaciones where status=4 and (cita1 is not null OR cita2 is not null OR cita3 is not null) AND vacante in (SELECT requerimiento FROM gis.asignaciones where reclutador=".$idUser.");";
			$resultNC = mysqli_query($con, $sqlNC);
			$rowNC = mysqli_fetch_array($resultNC);
			if(isset($rowNC['noCitN'])){
				$noCitN=$rowNC['noCitN'];
			}else{
				$noCitN=0;
			}
			
			$sqlNR ="SELECT COUNT(*) as noReqN FROM gis.requerimientos WHERE (status=2 OR status=3) AND id in (SELECT requerimiento FROM gis.asignaciones where visto is null AND reclutador=".$idUser.");";
			$resultNR = mysqli_query($con, $sqlNR);
			$rowNR = mysqli_fetch_array($resultNR);
			if(isset($rowNR['noReqN'])){
				$noReqN=$rowNR['noReqN'];
			}else{
				$noReqN=0;
			}
			
			$sqlNP ="SELECT COUNT(*) as noPosN FROM gis.postulaciones where status=1 and (cita1 is null AND cita2 is null AND cita3 is null) AND vacante in (SELECT requerimiento FROM gis.asignaciones where reclutador=".$idUser.");";
			$resultNP = mysqli_query($con, $sqlNP);
			$rowNP = mysqli_fetch_array($resultNP);
			if(isset($rowNP['noPosN'])){
				$noPosN=$rowNP['noPosN'];
			}else{
				$noPosN=0;
			}

			$sqlNV ="SELECT COUNT(*) as noVacN FROM gis.requerimientos WHERE status=7 AND asignado is not null AND id in (SELECT requerimiento FROM gis.asignaciones where reclutador=".$idUser.");";
			$resultNV = mysqli_query($con, $sqlNV);
			$rowNV = mysqli_fetch_array($resultNV);
			if(isset($rowNV['noVacN'])){
				$noVacN=$rowNV['noVacN'];
			}else{
				$noVacN=0;
			}

		}else{

			$sqlNC ="SELECT COUNT(*) as noCitN FROM gis.postulaciones where status=4 and (cita1 is not null OR cita2 is not null OR cita3 is not null) AND vacante in (SELECT requerimiento FROM gis.asignaciones where reclutador=".$idUser.");";
			$resultNC = mysqli_query($con, $sqlNC);
			$rowNC = mysqli_fetch_array($resultNC);
			if(isset($rowNC['noCitN'])){
				$noCitN=$rowNC['noCitN'];
			}else{
				$noCitN=0;
			}
			
			$sqlNR ="SELECT COUNT(*) as noReqN FROM gis.requerimientos WHERE (status=2 OR status=3) AND id in (SELECT requerimiento FROM gis.asignaciones where visto is null AND reclutador=".$idUser.");";
			$resultNR = mysqli_query($con, $sqlNR);
			$rowNR = mysqli_fetch_array($resultNR);
			if(isset($rowNR['noReqN'])){
				$noReqN=$rowNR['noReqN'];
			}else{
				$noReqN=0;
			}
			
			$sqlNP ="SELECT COUNT(*) as noPosN FROM gis.postulaciones where usuario=$idUser AND status=1 and (cita1 is null AND cita2 is null AND cita3 is null) AND vacante in (SELECT requerimiento FROM gis.asignaciones where status!=6 OR status!=7);";
			$resultNP = mysqli_query($con, $sqlNP);
			$rowNP = mysqli_fetch_array($resultNP);
			if(isset($rowNP['noPosN'])){
				$noPosN=$rowNP['noPosN'];
			}else{
				$noPosN=0;
			}

			$sqlNV ="SELECT COUNT(*) as noVacN FROM gis.requerimientos WHERE status=7 AND asignado is not null AND id in (SELECT requerimiento FROM gis.asignaciones where reclutador=".$idUser.");";
			$resultNV = mysqli_query($con, $sqlNV);
			$rowNV = mysqli_fetch_array($resultNV);
			if(isset($rowNV['noVacN'])){
				$noVacN=$rowNV['noVacN'];
			}else{
				$noVacN=0;
			}

		}

		$contadorT = 1;

		$notificaciones[] = array(
			'noCitN' => $noCitN,
			'noReqN' => $noReqN,
			'noPosN' => $noPosN,
			'noVacN' => $noVacN
		);

		mysqli_free_result($resultNR);
		mysqli_close($con);

		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true,
	      		'q' => $sqlNV
			);

			echo json_encode(array('info' => $info, 'data' => $notificaciones));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false,
	      		'q' => $sqlNV
			);

			echo json_encode(array('info' => $info, 'data' => $notificaciones));

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
