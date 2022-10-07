<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
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
                    <b>Registro</b>
                </div>
                <div class="card-body">

                    <form method="POST">
                        <div class = "form-group">
                            <label>Ingrese su nombre</label><br>
                            <input autocomplete="off" required type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Nombre">
                        </div><br>
                        <div class = "form-group">
                            <label>Ingrese un nombre de suario</label><br>
                            <input autocomplete="off" required type="text" name="user" class="form-control" aria-describedby="emailHelp" placeholder="Usuario">
                        </div><br>
                        <div class = "form-group">
                            <label>Ingrese su correo electronico</label><br>
                            <input autocomplete="off" required type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Correo">
                        </div><br>
                        <div class="form-group">
                            <label>Cree una contraseña</label>
                            <input maxlength="10" autocomplete="off" required type="password" name="contra" class="form-control" placeholder="Contraseña">
                        </div><br>
                        <div class="form-group">
                            <label>Escribela nuevamente</label>
                            <input maxlength="10" autocomplete="off" required type="password" name="contra1" class="form-control" placeholder="Contraseña">
                        </div><br>
                        <center><button type="submit" name="entrar" class="btn btn-primary">Ingresar</button></center>
                    </form>

                    <?php

                    $conex=mysqli_connect("localhost","root","","media");
                    
                        if(isset($_POST['entrar'])){
                            $name=$_POST['name'];
                            $user=$_POST['user'];
                            $email=$_POST['email'];
                            $contra=$_POST['contra'];
                            $contra1=$_POST['contra1'];

                            $ver_nombre=mysqli_query($conex,"SELECT * FROM usuarios WHERE usuario='$user'");
                            $ver_correo=mysqli_query($conex,"SELECT * FROM usuarios WHERE correo='$email'");

                            if(mysqli_num_rows($ver_nombre)>0){
                                ?>
                                <script>alert("Este nombre ya esta en uso");</script>
                                <?php
                                exit();
                            }if(mysqli_num_rows($ver_correo)>0){
                                ?>
                                <script>alert("Este correo ya esta en uso");</script>
                                <?php
                                exit();
                            }if($contra!=$contra1) {
                                ?>
                                <script>alert("Las contraseñas no coinciden");</script>
                                <?php
                                exit();
                            }

                            $insert="INSERT INTO usuarios(nombre,usuario,correo,contra,contra1) VALUES ('$name','$user','$email','$contra','$contra1')";
                            $consult=mysqli_query($conex,$insert);

                            if($consult){
                                ?>
                                <script>
                                    alert("Registro exitoso!! ");
                                    window.location='entrar.php';
                                </script>
                                <?php
                            }else{
                                ?>
                                <script>alert("Ops, Ha ocurrido un error...");</script>
                                <?php 
                            }


                        }

                    ?>
                    
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</div><br><br>
    
</body>
</html>