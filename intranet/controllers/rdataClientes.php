<?php

	session_start();
	header('Content-Type: application/json');

	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$clientes = [];

		$sql ="SELECT 
				id, 
				nombre 
			FROM gis.clientes WHERE status=1 order by nombre;
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
				$nombre = $row['nombre'];

				$clientes[] = array(
					'id' => ($row['id']),
					'nombre' => ($row['nombre'])
				);
			}

			
		}

		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'clientes' => $clientes));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'clientes' => $clientes));

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
