<?php

	session_start();
	header('Content-Type: application/json');
	if((isset($_SESSION['idUser'], $_SESSION["nombreUser"], $_GET['param'])) && (isset($_SERVER["HTTP_REFERER"]))){

		include "../../lib.php";

		require_once "functions.php";

		$con = conectar_bd();
		$contadorT = 0;
		$usuarios = [];

		$sql ="SELECT 
			usu.id,
			usu.nombre,
			usu.nom,
			usu.appat,
			usu.apmat,
			usu.email,
			usu.elpass,
			usu.tipo,
			usu.activo,
			usu.img
		FROM gis.usuarios as usu
		where tipo != 'U'
		ORDER BY nombre;
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
				$nombreU = $row['nombre'];
				$nom = $row['nom'];
				$appat = $row['appat'];
				$apmat = $row['apmat'];
				$elpass = $row['elpass'];
				$email = $row['email'];
				$tipo = $row['tipo'];
				$img = $row['img'];
				$status = $row['activo'];

				 if ($tipo =='A') $tipo = "<span title='Administrador'><i class='fas fa-chess-king'></i></span>";
				 else if ($tipo == 'OR') $tipo = "<span title='Reclutador'><i class='fas fa-chess-rook'></i></span>";
				 else if ($tipo == 'AR') $tipo = "<span title='Administrador RH'><i class='fas fa-chess-queen'></i></span>";
				 else if ($tipo == 'OA') $tipo = "<span title='Reclutador híbrido'><i class='fas fa-chess-knight'></i></span>";

				if($status==1){
					$status = "<span title='$status'><i class='fas fa-check'></i></span>";
					$mensaje = "Deshabilitar";
				}else{
					$status = "<span title='$status'><i class='fas fa-ban'></i></span>";
					$mensaje = "Habilitar";
				}

				$detA[] = array(
					'id' => $id,
					'nombre' => $nombreU,
					'nom' => $nom,
					'appat' => $appat,
					'apmat' => $apmat,
					'elpass' => $elpass,
					'email' => $email,
					'status' => $row['activo'],
					'img' => $row['img'],
					'tipo' => $row['tipo']

				);

				$crud = "<a class='dropdown-item on' onclick='deshabilitar(".json_encode($detA).");return false;'>$mensaje <b>".$nombreU."</b></a><a class='dropdown-item on' onclick='modificar(".json_encode($detA).");return false;'>Modificar <b>".$nombreU."</b></a>";

				$editar = "<span title='Operaciones para $nombreU'><div class='dropdown'><i class='fas fa-cubes' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></i><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>".$crud."</div></div></span>";				

				$usuarios[] = array(
					'id' => $id,
					'nombre' => $nombreU,
					'nom' => $nom,
					'appat' => $appat,
					'apmat' => $apmat,
					'elpass' => $elpass,
					'email' => $email,
					'tipo' => $tipo,
					'img' => $row['img'],
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

			echo json_encode(array('info' => $info, 'data' => $usuarios));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'data' => $usuarios));

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