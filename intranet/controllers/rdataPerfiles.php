<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['param'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		$con = conectar_bd();

		$contadorT = 0;

		$perfiles = [];

		$sql ="SELECT 
				per.id,
				per.perfil,
			    cli.nombre,
			    per.creado,
			    per.actualizado,
			    sta.nombre as nombreS,
			    per.status as statusv,
			    per.cliente as idCliente
			FROM gis.perfiles as per
			INNER JOIN gis.clientes as cli ON per.cliente = cli.id
			INNER JOIN gis.status as sta ON per.status = sta.id
			;
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
				$detA = [];

				$id = $row['id'];
				$perfil = $row['perfil'];
				$cliente = $row['nombre'];
				$creado = $row['creado'];
				$actualizado = $row['actualizado'];
				$status = $row['nombreS'];
				

				if($status=='Activo'){
					$status = "<span title='$status'><i class='fas fa-check'></i></span>";
					$mensaje = "Deshabilitar";
				}else{
					$status = "<span title='$status'><i class='fas fa-ban'></i></span>";
					$mensaje = "Habilitar";
				}

				$detA[] = array(
					'id' => $id,
					'perfil' => $perfil,
					'status' => $row['statusv'],
					'idCliente' => $row['idCliente']

				);

				$crud = "<a class='dropdown-item on' onclick='deshabilitar(".json_encode($detA).");return false;'>$mensaje <b>".$perfil."</b></a><a class='dropdown-item on' onclick='modificar(".json_encode($detA).");return false;'>Modificar <b>".$perfil."</b></a>";

				$editar = "<span title='Operaciones para $perfil'><div class='dropdown'><i class='fas fa-cubes' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>".$crud."</div></div></span>";				

				$perfiles[] = array(
					'id' => $id,
					'perfil' => $perfil,
					'cliente' => $cliente,
					'creado' => $creado,
					'actualizado' => $actualizado,
					'status' => $status,
					'editar' => $editar
				);
			}
		}

		mysqli_free_result($result);
		mysqli_close($con);

		if ($contadorT){

			$info[] = array (
				'id' => 1,
				'success' => true
			);

			echo json_encode(array('info' => $info, 'data' => $perfiles));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'data' => $perfiles));

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
