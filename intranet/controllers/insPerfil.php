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

		$id = $_POST['id'];
		$queOper = $_POST['action'];
		
		switch($queOper){
	      case 'INS' : {

	      	$perfil = $_POST['perfil'];
	  	  	$cliente = $_POST['cliente'];

	  	  	$sqlV = "SELECT COUNT(*) as existe FROM gis.perfiles WHERE perfil='$perfil' AND cliente=$cliente;";
	  	  	$resultV = mysqli_query($con, $sqlV);
	  	  	$rowV = mysqli_fetch_array($resultV);

	  	  	if($rowV['existe']==0){
	  	  		$sql ="INSERT INTO gis.perfiles (perfil, cliente, creado, actualizado) VALUES ('$perfil', $cliente, '$fechayhora', '$fechayhora');";
	  			$result = mysqli_query($con, $sql);
	  		}else{
	  	  		$info[] = array (
	 			    'id' => 0,
	 			    'success' => false,
	 			    'q' => 'sin sql',
	 			    'error' => 'EXISTE'
	 		  	);

	 			echo json_encode(array('info' => $info));

	 			die();
	  		}

	        break;
	      }

	      case 'UPD' : {

	  	  	$nombre = $_POST['perfil'];
	  	  	$cliente = $_POST['cliente'];

	  	  	$sqlV = "SELECT COUNT(*) as existe FROM gis.perfiles WHERE perfil='$perfil' AND cliente=$cliente;";
	  	  	$resultV = mysqli_query($con, $sqlV);
	  	  	$rowV = mysqli_fetch_array($resultV);

	  	  	if($rowV['existe']==0){
	  	  		$sql ="UPDATE gis.perfiles SET perfil='$perfil', cliente=$cliente, actualizado='$fechayhora' WHERE id = $id;";
	  			$result = mysqli_query($con, $sql);
	  		}else{
	  			$sqlV2 = "SELECT COUNT(*) as existe FROM gis.perfiles WHERE id=$id AND perfil='$perfil' AND cliente=$cliente;";
		  	  	$resultV2 = mysqli_query($con, $sqlV2);
		  	  	$rowV2 = mysqli_fetch_array($resultV2);

		  	  	if($rowV2['existe']==1){
		  	  		$sql="UPDATE gis.perfiles SET actualizado='$fechayhora' WHERE id=$id;";
		  	  		$result = mysqli_query($con, $sql);
		  	  	}else{

		  	  		$info[] = array (
		 			    'id' => 0,
		 			    'success' => false,
		 			    'q' => 'sin sql',
		 			    'error' => 'EXISTE'
		 		  	);

		 			echo json_encode(array('info' => $info));

		 			die();

		  	  	}		  	  	

	  		}

	        break;
	      }	  	

	  	  case 'DES' : {

	  	  	$status = $_POST['status'];

	  	  	if($status==1) $status = 8;
	  	  	else $status = 1;

	  		$sql ="UPDATE gis.perfiles SET status=$status WHERE id = $id;";
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
