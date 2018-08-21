<?php
if((isset($_SESSION['idUser'], $_SESSION["nombreUser"])) && (isset($_SERVER["HTTP_REFERER"]))){

	function formatSueldo($sueldo){
		return "$".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $sueldo)),2);
	}

	function generaLink(){
		$link = generaCadenaRandom();
		return $link;
	}

	function generaClaveEncrypt($cadena){
		$clave = md5($cadena);
		return $clave;
	}

	function generaCadenaRandom($length = 50) {
	    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $tamanio = strlen($caracteres);
	    $cadenaAleatoria = '';
	    for ($i = 0; $i < $length; $i++) {
	        $cadenaAleatoria .= $caracteres[rand(0, $tamanio - 1)];
	    }
	    return $cadenaAleatoria;
	}
}

?>
