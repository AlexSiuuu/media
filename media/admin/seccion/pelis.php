<?php include('../template/cabeza.php'); ?>


<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtGenero=(isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
$txtAño=(isset($_POST['txtAño']))?$_POST['txtAño']:"";
$txtTitulo=(isset($_POST['txtTitulo']))?$_POST['txtTitulo']:"";
$txtDescrip=(isset($_POST['txtDescrip']))?$_POST['txtDescrip']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('../../db.php');

switch ($accion) {
    case 'Agregar':

        $sentenciaSQL=$conex->prepare("INSERT INTO pelis(genero,año,titulo,descripcion,imagen) VALUES ('$txtGenero','$txtAño','$txtTitulo','$txtDescrip',:imagen)");
        
        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen!="") {
          move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:pelis.php");

        break;
    
    case 'Modificar':
        $sentenciaSQL=$conex->prepare("UPDATE pelis SET genero='$txtGenero',año='$txtAño',titulo='$txtTitulo',descripcion='$txtDescrip' WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        if ($txtImagen!="") {

          $fecha= new DateTime();
          $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
          $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
          move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

          $sentenciaSQL=$conex->prepare("SELECT imagen FROM pelis WHERE id=:id");
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
          $peli = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($peli["imagen"]) && ($peli["imagen"]!="imagen.jpg") ) {
        
            if (file_exists("../../img/".$peli["imagen"])) {
              unlink("../../img/".$peli["imagen"]);
            }

            }

          $sentenciaSQL=$conex->prepare("UPDATE pelis SET imagen=:imagen WHERE id=:id");
          $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
        }
        header("Location:pelis.php");
        
        break;

    case 'Cancelar':
          header("Location:pelis.php");
        break;

    case 'Seleccionar':
          $sentenciaSQL=$conex->prepare("SELECT*FROM pelis WHERE id=:id");
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
          $peli = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

          $txtGenero=$peli['genero'];
          $txtAño=$peli['año'];
          $txtTitulo=$peli['titulo'];
          $txtDescrip=$peli['descripcion'];
          $txtImagen=$peli['imagen'];

        break;

    case 'Borrar':

      $sentenciaSQL=$conex->prepare("SELECT imagen FROM pelis WHERE id=:id");
      $sentenciaSQL->bindParam(':id',$txtID);
      $sentenciaSQL->execute();
      $peli = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

      if (isset($peli["imagen"]) && ($peli["imagen"]!="imagen.jpg") ) {
        
        if (file_exists("../../img/".$peli["imagen"])) {
          unlink("../../img/".$peli["imagen"]);
        }

      }

          $sentenciaSQL=$conex->prepare("DELETE FROM pelis WHERE id=:id");
          $sentenciaSQL->bindParam(':id',$txtID);
          $sentenciaSQL->execute();
          header("Location:pelis.php");
        
          break;

}
$sentenciaSQL=$conex->prepare("SELECT*FROM pelis");
$sentenciaSQL->execute();
$listaPelis = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-md-5">

        <div class="card">
            <div class="card-header">
                Peliculas
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">
                    <div class = "form-group">
                    <label>ID</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="emailHelp" placeholder="ID">
                    </div>

                    <div class = "form-group">
                    <label>Genero</label>
                    <input type="text" class="form-control" value="<?php echo $txtGenero; ?>" name="txtGenero" id="txtGenero" aria-describedby="emailHelp" placeholder="Genero">
                    </div>

                    <div class = "form-group">
                    <label>Año</label>
                    <input type="text" class="form-control" value="<?php echo $txtAño; ?>" name="txtAño" id="txtAño" aria-describedby="emailHelp" placeholder="Año">
                    </div>

                    <div class = "form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" value="<?php echo $txtTitulo; ?>" name="txtTitulo" id="txtTitulo" aria-describedby="emailHelp" placeholder="Titulo">
                    </div>

                    <div class = "form-group">
                    <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text"class="form-control" value="<?php echo $txtDescrip; ?>" name="txtDescrip" id="txtDescrip" aria-describedby="emailHelp" rows="3" placeholder="Descripcion">
                    </div>

                    <div class = "form-group">
                    <label>Imagen</label>
                      <br>
                    <?php if($txtImagen!=""){ ?>

                      <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="100" alt="" srcset="">


                    <?php  } ?>
                    <input type="file" class="form-control" value="<?php echo $txtImagen; ?>" name="txtImagen" id="txtImagen" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-primary">Agregar</button>
                        <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-danger">Modificar</button>
                        <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-dark">Cancelar</button>
                    </div>

                </form>
                
            </div>
            
        </div>

            
            
            
        </div>
        
    </div>
</div><br>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Año</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($listaPelis as $peli){ ?>
                    <tr class="table-light">
                    <th scope="row"><?php echo $peli['id']; ?></th>
                    <td><?php echo $peli['genero']; ?></td>
                    <td><?php echo $peli['año']; ?></td>
                    <td><?php echo $peli['titulo']; ?></td>
                    <td><?php echo $peli['descripcion']; ?></td>

                    <td>
                      <img src="../../img/<?php echo $peli['imagen'];?>" width="100" alt="" srcset="">
                    </td>

                    <td>

                    <form method="post">

                      <input type="hidden" name="txtID" id="txtID" value="<?php echo $peli['id']; ?>" />

                      <input type="submit" name="accion" value="Seleccionar" class="btn btn-info"/>

                      <input type="submit" name="accion" value="Borrar" class="btn btn-warning"/>

                    </form>

                    </td>
                    
                    </tr>
                <?php } ?>

                </tbody>
            </table>

        </div>
        
    </div>
</div>

<?php include('../template/pie.php'); ?>