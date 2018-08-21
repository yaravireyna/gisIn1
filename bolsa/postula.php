<?php

	session_start();
	header('Content-Type: application/json');

	if(isset($_POST['idU'],$_POST['idV']) && isset($_SERVER["HTTP_REFERER"])){

		include "../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$vacantes = [];

		$sql ="
			SELECT gis.vacantes.id as id,
	        gis.vacantes.perfil as perfilU,
	        gis.vacantes.ubicacion as ubicacion,
	        gis.vacantes.recursos as recursos,
	        gis.vacantes.salario as salario,
	        gis.vacantes.descripcion as descripcion,
	        gis.vacantes.creado as fecha,
	        gis.vacantes.imagen as imagen,
	        gis.vacantes.archivo as archivo,
	        gis.vacantes.status as status,
	        (SELECT perfil from gis.perfiles where id=perfilU) as perfil

	      FROM

	        gis.vacantes

	      WHERE status=1".$whereAdd."
	      ORDER BY fecha;

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
				$ubicacion = $row['ubicacion'];
				$recursos = $row['recursos'];
				$salario = $row['salario'];
				$descripcion = $row['descripcion'];
				$fecha = $row['fecha'];
				$imagen = $row['imagen'];
				$archivo = $row['archivo'];
				$status = $row['status'];

				$vacantes[] = array(
					'id' => ($row['id']),
					'perfil' => ($row['perfil']),
					'ubicacion' => ($row['ubicacion']),
					'recursos' => ($row['recursos']),
					'salario' => ($row['salario']),
					'descripcion' => ($row['descripcion']),
					'fecha' => ($row['fecha']),
					'imagen' => $imagen,
					'archivo' => $archivo,
					'status' => $status
				);				
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

			echo json_encode(array('info' => $info, 'data' => $vacantes));
		}
		else{

			$info[] = array (
				'id' => 0,
				'success' => false,
	      		'q' => $sql,
			);

			echo json_encode(array('info' => $info, 'data' => $vacantes));

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
