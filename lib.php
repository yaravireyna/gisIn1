<?php

function conectar_bd(){

	//if (!($conexion = mysqli_connect("localhost", "root","mysqlsam33?","nuevo_uds")))
	if (!($conexion = mysqli_connect("localhost", "root","sir.rotvico","gis")))
    	die("No se puede conectar");

	return $conexion;
}

?>
