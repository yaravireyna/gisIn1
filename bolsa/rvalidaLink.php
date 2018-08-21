<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_POST['link'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$link = $_POST['link'];

		$usuario = [];

		$sql ="SELECT 
				COUNT(*) as existe, 
				id, email
			FROM gis.usuarios 
			WHERE link='$link' AND statusLink=1 AND tipo='U' AND activo=1;
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

		}else{

			while($row = mysqli_fetch_array($result)){

				$contadorT = 1;

				$existe = $row['existe'];

				if($existe==1){
					$usuario[] = array(
						'id' => $row['id'],
						'email' => $row['email']
					);
				}else{
					$info[] = array (
						'id' => 0,
						'success' => false,
			      		'error' => 'NO-ENCONTRADO'.$existe,
					);
					echo json_encode(array('info' => $info));
					die();
				}				
			}
		}

		mysqli_free_result($result);
		mysqli_close($con);

		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true,
	      		'q' => $sql,
			);

			echo json_encode(array('info' => $info, 'data' => $usuario));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false,
	      		'q' => $sql,
			);

			echo json_encode(array('info' => $info, 'data' => $usuario));

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
