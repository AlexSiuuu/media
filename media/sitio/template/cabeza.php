
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Sky Film</title>
</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/media"; ?>

<nav class="navM navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Sky Film</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/index.php">Pelis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/perfil.php">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url; ?>/sitio/section/cerrar.php">Cerrar</a>
        </li>
      </ul>
      </div>
    </div>
</nav>
