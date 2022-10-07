<?php include('../template/cabeza.php'); ?>


<?php include('../../db.php'); ?>

<?php

$sentenciaSQL=$conex->prepare("SELECT*FROM pelis");
$sentenciaSQL->execute();
$listaPelis = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<br>

<div class="container">
    <div class="row">

    <?php foreach($listaPelis as $peli){ ?>

        <div class="col-md-3">

            <div class="card">
                <img class="card-img-top" src="../../img/<?php echo $peli['imagen']; ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $peli['titulo']; ?></h4>
                    <a name="" id="" class="btn btn-dark" href="peli.php" role="button">Ver mas</a>
                </div>
            </div>

        </div>

    <?php } ?>

    </div>
</div>

<?php include('../template/pie.php'); ?>