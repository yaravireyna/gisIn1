<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_POST["user"], $_POST["pass"]) && (isset($_SERVER["HTTP_REFERER"])))){

		include "lib.php";

		function getUserIP(){

			$client  = @$_SERVER['HTTP_CLIENT_IP'];
	    	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    	$remote  = $_SERVER['REMOTE_ADDR'];

	    	if(filter_var($client, FILTER_VALIDATE_IP)){
	      		$ip = $client;
	    	}
	    	elseif(filter_var($forward, FILTER_VALIDATE_IP)){
	      		$ip = $forward;
	    	}
	    	else{
	      		$ip = $remote;
			}

	    	return $ip;

		}

		$nu = $_POST["user"];
		$p = $_POST["pass"];

		$con = conectar_bd();
		//mysqli_set_charset($con,"utf8");

		$sql = "SELECT * FROM usuarios WHERE activo=1 AND email='$nu' AND elpass='$p'";

		if (!$result = mysqli_query($con, $sql)){

			$info[] = array (
				'id' => 0,
				'success' => false,
				'elid' => 0,
				'error' => mysqli_error($con)
			);

			echo json_encode(array('info' => $info));

			die();
		}
		else{

			$rc = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);

			if ($rc){

				$info[] = array (
					'id' => 0,
					'success' => true,
					'elid' => $row['id'],
					'tipo' => $row['tipo'],
					'n' => $row['nombre'],
					'r' => $r,
					'img' => $row['img'],
					'm' => 'Acceso-concedido'
				);

				$_SESSION['idUser']  = $row['id'];
				$_SESSION['nombreUser']  = $row['nombre'];
				$_SESSION['tipoUser']  = $row['tipo'];
				$_SESSION['correoUser'] = $row['email'];
				$_SESSION['img'] = $row['img'];

				if($r){
					setcookie("eluser", $nu, time()+86400);
					setcookie("elpass", $p, time()+86400);
					//setcookie("nombredeusuario", $nu, time() + (86400 * 30), "/"); // 86400 = 1 day
				}

				$idUsuario = $row['id'];
				$ultimoacceso = date('Y-m-d H:i:s');
				$UIP = getUserIP();

				$sql = "UPDATE gis.usuarios SET ultimoacceso='$ultimoacceso', IP='$UIP' WHERE id='$idUsuario';";
				mysqli_query($con, $sql);

				echo json_encode(array('info' => $info));
			}
			else{

				$info[] = array (
					'id' => 0,
					'success' => false,
					'elid' => 0,
					'r' => $r,
					'm' => 'No-coinciden-los-datos'
				);

				echo json_encode(array('info' => $info));
			}

		}

		mysqli_close($con);
	}
	else{

		$info[] = array (
			'id' => 0,
			'success' => false,
			'elid' => 0,
			'm' => 'No-se-puede-entregar-información'
		);

		echo json_encode(array('info' => $info));

	}
?>
