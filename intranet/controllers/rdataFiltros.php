<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_POST['req'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$perfiles = [];

		$sql ="SELECT 
				id, 
				perfil 
			FROM gis.perfiles WHERE status=1 order by perfil;
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

				$contadorT = 1;

				$id = $row['id'];
				$perfil = $row['perfil'];

				$perfiles[] = array(
					'id' => ($row['id']),
					'perfil' => ($row['perfil'])
				);
			}

			
		}

		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'perfiles' => $perfiles));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'perfiles' => $perfiles));

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
