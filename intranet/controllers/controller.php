<?php 

class MvcController{

	public function plantilla(){
		include "views/template.php";
	}


	// interaccion
	public function enlacesPaginasController(){

		if( isset($_GET["action"]) ){
			$enlacesController = $_GET["action"];
		}else{
			$enlacesController = "index";
		}

		$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);

		include $respuesta;
	}

}

?>