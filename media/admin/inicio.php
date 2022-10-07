<?php include('template/cabeza.php'); ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="jumbotron">
                <h1 class="display-3">Bienvenido <?php echo $nombreUsuario; ?></h1>
                <p class="lead">Vamos a administrar nuestras pelis</p>
                <hr class="my-2">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="seccion/pelis.php" role="button">Vamos</a>
                </p>
            </div>
            
        </div>
        
    </div>
</div>

<?php include('template/pie.php'); ?>