

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        .lin{
            text-decoration: none;
            transition: 400ms;
        }.lin:hover{
            color: violet;
        }
        .btnP{
            color: black;
        }.btnP:hover{
            color: purple;
        }
    </style>
    <title>Sky Film</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Sky Film</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
          <a class="nav-link btnP" href="../index.php">Volver</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">

    <div class="col-md-4">
        
    </div>

        <div class="col-md-4"><br><br><br>

            <div class="card">
                <div class="card-header">
                    <b>Entrar</b>
                </div>
                <div class="card-body">

                    <form method="POST">
                        <div class = "form-group">
                            <label>Usuario</label><br>
                            <input required autocomplete="off" type="text" name="user" class="form-control" aria-describedby="emailHelp" placeholder="Usuario">
                        </div><br>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input maxlength="10" required autocomplete="off" type="password" name="contra" class="form-control" placeholder="Contraseña">
                        </div><br>
                        <center><button type="submit" name="entrar" class="btn btn-primary">Entrar</button></center>
                        <center><p>¿Olvidaste tu contraseña? <a class="lin" href="recuperar.php">Recuperala</a></p></center>
                        <center><p>¿Aun no tienes cuenta? <a class="lin" href="registro.php">Que esperas</a></p></center>
                    </form>

                    <?php
                    
                        $conex=mysqli_connect("localhost","root","","media");

                        if(isset($_POST['entrar'])){
                            $user=$_POST['user'];
                            $contra=$_POST['contra'];

                            $consult="SELECT 'usuario','contra' FROM usuarios WHERE usuario='$user' and contra='$contra' ";
                            $resultado=mysqli_query($conex,$consult);

                            $filas=mysqli_num_rows($resultado);

                            if($filas>0){
                                ?>
                                <script>
                                    alert("Te damos la bienvenida <?php echo $user; ?>");
                                    window.location="section/index.php";
                                </script>
                                <?php
                            }else{
                                ?>
                                <script>alert("Usuario o contraseña invalidos");</script>
                                <?php
                            }
                            mysqli_free_result($resultado);
                            mysqli_close($conex);

                        }

                    ?>
                    
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</div>
    
</body>
</html>