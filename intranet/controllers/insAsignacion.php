<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_POST['action'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		date_default_timezone_set('America/Mexico_City');

    	$fechayhora = date('Y-m-d H:i:s');

		$con = conectar_bd();

		$contadorT = 0;

		$idReq = $_POST['idReq'];
		$idRec = $_POST['idRec'];
		$idUser = $_SESSION['idUser'];
		$queOper = $_POST['action'];
		
		switch($queOper){
	      case 'INS' : {

	      	$comentarios = $_POST['coment'];

	      	$sqlR ="UPDATE gis.requerimientos SET asignado='$fechayhora', status=2 WHERE id = $idReq;";
	      	$resultR = mysqli_query($con, $sqlR);

	      	$sqlV ="UPDATE gis.vacantes SET asignado='$fechayhora', status=2 WHERE id = $idReq;";
	      	$resultV = mysqli_query($con, $sqlV);

	      	if($idRec==0){

	      		$sqlRec ="SELECT id FROM gis.usuarios WHERE (tipo='OR' OR tipo='OA') AND activo = 1;";
	      		$resultRec = mysqli_query($con, $sqlRec);

	      		while($rowRec = mysqli_fetch_array($resultRec)){

					$idRC = $rowRec['id'];

	      			$sql ="INSERT INTO gis.asignaciones (requerimiento, usuario, reclutador, asignado, comentarios) VALUES ($idReq,$idUser,$idRC,'$fechayhora', '$comentarios');";

	      			$result = mysqli_query($con, $sql);
	      		}

	      	}else{
	      		$sql ="INSERT INTO gis.asignaciones (requerimiento, usuario, reclutador, asignado, comentarios) VALUES ($idReq,$idUser,$idRec,'$fechayhora', '$comentarios');";

	      		$result = mysqli_query($con, $sql);
	      	}

	        break;
	      }
	  	

	  	  case 'REA' : {

	  		$idRecAnterior = $_POST['idRecAnterior'];

	      	if($idRec == 0){

	      		$sqlRec ="SELECT id FROM gis.usuarios WHERE (tipo='OR' OR tipo='OA') AND activo = 1;";
	      		$resultRec = mysqli_query($con, $sqlRec);

	      		while($rowRec = mysqli_fetch_array($resultRec)){

					$idRC = $rowRec['id'];

					if($idRC != $idRecAnterior){

		      			$sql ="INSERT INTO gis.asignaciones (requerimiento, usuario, reclutador, asignado, comentarios) VALUES ($idReq,$idUser,$idRC,'$fechayhora', '$comentarios');";

		      			$result = mysqli_query($con, $sql);
		      		}
	      		}

	      	}else if($idRec == -1){

	      		$sqlR ="UPDATE gis.requerimientos SET asignado=null, status=1 WHERE id = $idReq;";
		      	$resultR = mysqli_query($con, $sqlR);

		      	$sqlV ="UPDATE gis.vacantes SET asignado=null, status=1 WHERE id = $idReq;";
		      	$resultV = mysqli_query($con, $sqlV);

		      	$sql ="DELETE FROM gis.asignaciones WHERE requerimiento=$idReq;";
	      		$result = mysqli_query($con, $sql);


	      	}else if($idRec == -2){

	      		$sqlE = "SELECT COUNT(*) as existe FROM gis.asignaciones WHERE requerimiento=$idReq;";
	      		$resultE = mysqli_query($con, $sqlE);
	      		$rowE = mysqli_fetch_array($resultE);
	      		$existe = $rowE['existe'];

	      		if($existe==1){

		      		$sqlR ="UPDATE gis.requerimientos SET asignado=null, status=1 WHERE id = $idReq;";
			      	$resultR = mysqli_query($con, $sqlR);

			      	$sqlV ="UPDATE gis.vacantes SET asignado=null, status=1 WHERE id = $idReq;";
			      	$resultV = mysqli_query($con, $sqlV);

			      	$sql ="DELETE FROM gis.asignaciones WHERE requerimiento=$idReq;";
			    }else{
			    	$sql ="DELETE FROM gis.asignaciones WHERE requerimiento=$idReq AND reclutador=$idRecAnterior;";
			    }
	      		$result = mysqli_query($con, $sql);


	      	}else{

	      		$sql ="UPDATE gis.asignaciones SET reclutador=$idRec WHERE requerimiento=$idReq AND reclutador=$idRecAnterior;";

	      		$result = mysqli_query($con, $sql);
	      	}

	        break;
	      }

	    }


		if (!$result) {

			$info[] = array (
 			    'id' => 0,
 			    'success' => false,
 			    'q' => $sql,
 			    'error' => mysqli_error($con)
 		  	);

 			echo json_encode(array('info' => $info));

	      die();
	    }else{

	      $info[] = array (
	        'id' => 1,
	        'success' => true,
	        'q' => $sql,
	        'error' => 'NO'
	      );
	    }

	    echo json_encode(array('info' => $info));

		mysqli_free_result($resultR);	
		mysqli_free_result($resultV);
		mysqli_free_result($result);
		mysqli_close($con);
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
