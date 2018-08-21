<?php

	session_start();
	header('Content-Type: application/json');

	if(isset($_SERVER["HTTP_REFERER"])){

		include "../lib.php";

		$con = conectar_bd();

		$contadorT = 0;

		$vacantes = [];

		if($_POST['keyWords']!=""){
			$whereAdd = " and (perfil like \"%".$_POST['keyWords']."%\" OR descripcion like \"%".$_POST['keyWords']."%\") ";
		}

		if($_POST['perfil']!="0"){
			$whereAdd = $whereAdd." and perfil like \"%".$_POST['perfil']."%\" ";
		}

		if($_POST['location']!="0"){
			$whereAdd = $whereAdd." and ubicacion like \"%".$_POST['location']."%\" ";
		}

		if($_POST['keyWords']=="" && $_POST['keyWperfilords']=="0" && $_POST['location']=="0"){
			$whereAdd="";
		}

		if(isset($_POST['idV'])){
			$sql ="
				SELECT
					gis.requerimientos.id,
					puesto,
				    nombre,
				    contrato,
				    direcciontrabajo,
				    sueldoneto,
				    objetivo,
				    responsabilidades,
				    conocimientos,
				    cursos,
				    duracion,
				    ingles
				    tecnologias,
				    gis.requerimientos.creado
				FROM gis.requerimientos
				INNER JOIN gis.clientes 
				ON gis.requerimientos.cliente = gis.clientes.id
				;
			";

		}else{
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

		      WHERE (status!=7 OR status!=6) ".$whereAdd."
		      ORDER BY fecha;

		    ";
	    }

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

				if(isset($_POST['idV'])){

					$id = $row['id'];
					$puesto = $row['puesto'];
					$cliente = $row['nombre'];
					$contrato = $row['contrato'];
					$direcciontrabajo = $row['direcciontrabajo'];
					$sueldoneto = $row['sueldoneto'];
					$objetivo = $row['objetivo'];
					$responsabilidades = $row['responsabilidades'];
					$conocimientos = $row['conocimientos'];
					$cursos = $row['cursos'];
					$duracion = $row['duracion'];
					$ingles = $row['ingles'];
					$tecnologias = $row['tecnologias'];
					$creado = $row['creado'];

					$vacantes[] = array(
						'id' => $id,
						'puesto' => $puesto,
						'cliente' => $cliente,
						'contrato' => $contrato,
						'direcciontrabajo' => $direcciontrabajo,
						'sueldoneto' => $sueldoneto,
						'objetivo' => $objetivo,
						'responsabilidades' => $responsabilidades,
						'conocimientos' => $conocimientos,
						'cursos' => $cursos,
						'duracion' => $duracion,
						'ingles' => $ingles,
						'tecnologias' => $tecnologias,
						'creado' => $creado
					);

				}else{

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
