<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_POST['action'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../lib.php";

		date_default_timezone_set('America/Mexico_City');

    	$fechayhora = date('Y-m-d H:i:s');

		$con = conectar_bd();

		$contadorT = 0;

		$id = $_POST['id'];
      	$nombre = $_POST['nombre'];
  	  	$ap = $_POST['ap'];
  	  	$am = $_POST['am'];
  	  	$email = $_POST['email'];
  	  	$pass = $_POST['pass'];

  	  	$nombreC = $nombre." ".$ap." ".$am;

		$queOper = $_POST['action'];
		
		switch($queOper){
	      case 'INS' : {

	      	$sqlV = "SELECT COUNT(*) as existe FROM gis.usuarios WHERE email='$email';";
	  	  	$resultV = mysqli_query($con, $sqlV);
	  	  	$rowV = mysqli_fetch_array($resultV);
	  	  	$existe = $rowV['existe'];

	  	  	if($existe>0){
	  	  		$info[] = array (
	 			    'id' => 0,
	 			    'success' => false,
	 			    'error' => "EXISTE"
	 		  	);

	 			echo json_encode(array('info' => $info));

		      	die();

	  	  	}else{
	  	  		$sql = "INSERT INTO gis.usuarios (nombre, email, elpass, nom, appat, apmat, ultimoacceso, registro, tipo, statuslink) VALUES ('$nombreC', '$email', '$pass', '$nombre', '$ap', '$am', '$fechayhora', '$fechayhora', 'U', 8);";
	  	  		$result = mysqli_query($con, $sql);
	  	  	}
	  	  	
	        break;
	      }

	      case 'UPD' : {

	  	  	$sql ="UPDATE gis.usuarios SET nombre='$nombreC', elpass='$pass', nom='$nombre', appat='$ap', apmat='$am', ultimoacceso='$fechayhora', registro='$fechayhora', statuslink=8 WHERE id = $id;";
	  		$result = mysqli_query($con, $sql);

	        break;
	      }	  	

	  	  case 'DES' : {

	  	  	$status = $_POST['status'];

	  	  	if($status==1) $status = 8;
	  	  	else $status = 1;

	  		$sql ="UPDATE gis.usuarios SET status=$status WHERE id = $id;";
	  		$result = mysqli_query($con, $sql);

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

		// mysqli_free_result($resultR);	
		// mysqli_free_result($resultV);
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
