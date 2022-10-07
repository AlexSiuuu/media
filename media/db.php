<?php
$host="localhost:3307";
$db="media";    
$usuario="root";
$contraseña="";

try {
    $conex=new PDO("mysql:host=$host;dbname=$db",$usuario);
} catch (Exception $ex) {
    
    echo $ex->getMessage();
}

?>