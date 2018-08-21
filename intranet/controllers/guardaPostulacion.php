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
		$recNu = $_POST['recNu'];
		$action = $_POST['action'];
		$delim = $_POST['delim'];
		$idUser = $_SESSION['idUser'];
		
		switch($action){
	      case 'REC' : {

	      	$sql ="INSERT INTO gis.postulaciones 
	      		(usuario, vacante, reclutador, postulado, medio, status) 
	      		VALUES 
	      		($idRec, $idReq, $idUser, '$fechayhora', 'RH', 1);";
	      	$result = mysqli_query($con, $sql);
	        break;
	      }

	      case 'NUE' : {

	      	$partGeneral = explode($delim, $recNu);
	      	$max = sizeof($partGeneral);

	      	$sqlLog ="INSERT INTO gis.logcorreos 
	      		(usuario, reclutador, correos, fecha, delimitador) 
	      		VALUES 
	      		(0, $idUser, '$recNu', '$fechayhora', '$delim');";
	      	$resultLog = mysqli_query($con, $sqlLog);
			
			for($i = 0; $i < $max;$i++)
			{
		      	$link = generaLink();
		      	$clave = generaCadenaRandom(10);
		      	$part = explode("@", $partGeneral[$i]);
		      	$usuario = $part[0];

		      	$sqlExist = "SELECT COUNT(*) as existe, id FROM gis.usuarios where email='$partGeneral[$i]';";
		      	$resultExiste = mysqli_query($con, $sqlExist);
		      	$row = mysqli_fetch_array($resultExiste);
				$existe = $row['existe'];
				$idUserExiste = $row['id'];

				if($existe==0){

			      	$sqlU ="INSERT INTO gis.usuarios
			      	 			(nombre, email, elpass, ultimoacceso, tipo, link)
			      				VALUES
			      	 			('$usuario', '$partGeneral[$i]', '$clave', '$fechayhora', 'U', '$link');";
			      	
			      	$resultU = mysqli_query($con, $sqlU);
			      	$idNU = mysqli_insert_id($con);

			      	$sqlCV ="INSERT INTO gis.cv 
			      		(usuario, perfil) 
			      		VALUES 
			      		($idNU, (SELECT perfil FROM gis.vacantes where id=$idReq));";
			      	$resultCV = mysqli_query($con, $sqlCV);

			      	$sql ="INSERT INTO gis.postulaciones 
			      		(usuario, vacante, reclutador, postulado, medio, status) 
			      		VALUES 
			      		($idNU, $idReq, $idUser, '$fechayhora', 'RH', 1);";
			      	$result = mysqli_query($con, $sql);
			      	
			    }else{

			      	$sql ="INSERT INTO gis.postulaciones 
			      		(usuario, vacante, reclutador, postulado, medio, status) 
			      		VALUES 
			      		($idUserExiste, $idReq, $idUser, '$fechayhora', 'RH', 1);";
			      	$result = mysqli_query($con, $sql);
			    }
	      	}   		

	       	break;

	      }

	      case 'NU1' : {

	      	$link = generaLink();
	      	$clave = generaCadenaRandom(10);
	      	$part = explode("@", $recNu);
	      	$usuario = $part[0];

	      	$sqlExist = "SELECT COUNT(*) as existe, id FROM gis.usuarios where email='$recNu';";
	      	$resultExiste = mysqli_query($con, $sqlExist);
	      	$row = mysqli_fetch_array($resultExiste);
			$existe = $row['existe'];
			$idUserExiste = $row['id'];

			if($existe==0){

		      	$sqlU ="INSERT INTO gis.usuarios
		      	 			(nombre, email, elpass, ultimoacceso, tipo, link)
		      				VALUES
		      	 			('$usuario', '$recNu', '$clave', '$fechayhora', 'U', '$link');";
		      	
		      	$resultU = mysqli_query($con, $sqlU);
		      	$idNU = mysqli_insert_id($con);

		      	$sqlLog ="INSERT INTO gis.logcorreos 
		      		(usuario, reclutador, correos, fecha) 
		      		VALUES 
		      		($idNU, $idUser, '$recNu', '$fechayhora');";
		      	$resultLog = mysqli_query($con, $sqlLog);

		      	$sqlCV ="INSERT INTO gis.cv 
		      		(usuario, perfil) 
		      		VALUES 
		      		($idNU, (SELECT perfil FROM gis.vacantes where id=$idReq));";
		      	$resultCV = mysqli_query($con, $sqlCV);

		      	$sql ="INSERT INTO gis.postulaciones 
		      		(usuario, vacante, reclutador, postulado, medio, status) 
		      		VALUES 
		      		($idNU, $idReq, $idUser, '$fechayhora', 'RH', 1);";
		      	$result = mysqli_query($con, $sql);

	      	}else{

		      	$sql ="INSERT INTO gis.postulaciones 
		      		(usuario, vacante, reclutador, postulado, medio, status) 
		      		VALUES 
		      		($idUserExiste, $idReq, $idUser, '$fechayhora', 'RH', 1);";
		      	$result = mysqli_query($con, $sql);
		    }
  		

	       	break;
	      }
	  	}


		if (!$result) {

			$info[] = array (
 			    'id' => 0,
 			    'success' => false,
 			    // 'qR' => $sqlR,
 			    // 'qV' => $sqlV,
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

		mysqli_free_result($resultU);	
		mysqli_free_result($resultLog);
		mysqli_free_result($resultCV);
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
