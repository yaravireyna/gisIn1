<?php

  session_start();

  if(isset($_SESSION['idUser'], $_SESSION["tipoUser"])){

    $idUsuario = $_SESSION['idUserU'];
    $tipoDeUsuario = $_SESSION['tipoUser'];

  }
  else{

    echo "<script type='text/javascript'> location.href = '../../../'; </script>";
    exit;

  }

?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?action=inicio">Administración</a>
    </li>
    <li class="breadcrumb-item">
      <a href="index.php?action=operativos">Usuarios</a>
    </li>
    <li class="breadcrumb-item active">Candidatos</li>
  </ol>

  <iframe src="http://expressyourself.dyndns.org:8090/videos/acceso/seccion/" frameborder="0" width="100%" height="700px"></iframe>
  

</div>