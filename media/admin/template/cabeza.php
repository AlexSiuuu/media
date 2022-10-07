<?php

session_start();
if(!isset($_SESSION['usuario'])){
header("Location:../index.php");
}else{
  if($_SESSION['usuario']=="ok"){
    $nombreUsuario=$_SESSION['nombreUsuario'];
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Sky Film</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/media"; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Sky Film Admin</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo $url; ?>/admin/inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/admin/seccion/pelis.php">Pelis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/admin/seccion/cerrar.php">Cerrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
        </li>
      </ul>
      </div>
  </div>
</nav><br>

