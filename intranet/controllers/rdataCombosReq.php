<?php

	session_start();
	header('Content-Type: application/json');

	if(isset($_SERVER["HTTP_REFERER"])){

		include "../../lib.php";

		$con = conectar_bd();

		$contadorT = 0;
		$contadorTU = 0;

		$clientes = [];
		$prioridad = [];

		$sql ="SELECT id, nombre, ubicacion, ubicacionentrevistas FROM gis.clientes WHERE status=1 order by nombre;";

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

				$clientes[] = array(
					'id' => ($row['id']),
					'nombre' => ($row['nombre']),
					'ubicacion' => ($row['ubicacion']),
					'ubicacionentrevistas' => ($row['ubicacionentrevistas'])
				);
			}

			
		}

		$sqlU = "SELECT id, nombre, valor FROM gis.prioridad WHERE status=1 order by valor;";

		if (!$resultU = mysqli_query($con, $sqlU)){

			$info[] = array (
		      'id' => 0,
		      'success' => false,
		      'q' => $sqlU,
		      'error' => mysqli_error($con)
		    );

 			echo json_encode(array('info' => $info));

			die();
		}else{

			while($rowU = mysqli_fetch_array($resultU)){

				$contadorTU = 1;

				$prioridad[] = array(
					'id' => ($rowU['id']),
					'nombre' => ($rowU['nombre']),
					'valor' => ($rowU['valor']),
				);
			}

			
		}

		mysqli_free_result($resultU);
		mysqli_close($con);

		if ($contadorTU){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'clientes' => $clientes, 'prioridad' => $prioridad));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'clientes' => $clientes, 'prioridad' => $prioridad));

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
