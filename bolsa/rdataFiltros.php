<?php

	session_start();
	header('Content-Type: application/json');

	if(isset($_SERVER["HTTP_REFERER"])){

		include "../lib.php";

		$con = conectar_bd();

		$contadorT = 0;
		$contadorTU = 0;

		$perfiles = [];
		$ubicaciones = [];

		$sql ="SELECT id as idP, perfil FROM gis.perfiles WHERE status=1 AND id IN (SELECT perfil FROM gis.vacantes WHERE (status!=6 OR status!=7))  order by perfil;";

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

				$idP = $row['idP'];
				$perfil = $row['perfil'];

				$perfiles[] = array(
					'idP' => ($row['idP']),
					'perfil' => ($row['perfil'])
				);
			}

			
		}

		$sqlU = "SELECT distinct(gis.vacantes.ubicacion) as ubicacion FROM gis.vacantes WHERE (status!=6 OR status!=7)  order by ubicacion;";

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

				$ubicacion = $rowU['ubicacion'];

				$ubicaciones[] = array(
					'ubicacion' => ($rowU['ubicacion'])
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

			echo json_encode(array('info' => $info, 'perfiles' => $perfiles, 'ubicaciones' => $ubicaciones));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false
			);

			echo json_encode(array('info' => $info, 'perfiles' => $perfiles, 'ubicaciones' => $ubicaciones));

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
