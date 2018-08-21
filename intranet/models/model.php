<?php 

class EnlacesPaginas{


	public function enlacesPaginasModel($enlacesModel){

		if( $enlacesModel == "inicio" ||
			$enlacesModel == "reportes" ||
			$enlacesModel == "requerimiento" ||
			$enlacesModel == "perfiles" ||
			$enlacesModel == "operativos" ||
			$enlacesModel == "candidatos" ||
			$enlacesModel == "candidatos_cv" ||
			$enlacesModel == "track_user" ||
			$enlacesModel == "track_vacante" ||
			$enlacesModel == "asignaciones" ||
			$enlacesModel == "asignar" ||
			$enlacesModel == "profile" ||
			$enlacesModel == "cv_user" ||
			$enlacesModel == "postulaciones" ){

			$module = "views/modules/".$enlacesModel.".php";

		}else if($enlacesModel == "index"){
			$module = "views/modules/inicio.php";
		}else{
			$module = "views/modules/inicio.php";
		}

		return $module;

	}
}

?>