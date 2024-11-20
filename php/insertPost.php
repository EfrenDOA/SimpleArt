<?php
    require 'conexion.php';

    session_start();

    if(!isset($_POST["postTitle"]) || !isset($_POST["postContent"])){
        header("Location: http://localhost/SimpleArt/foro.php?error=Datos incompletos");

        return;
    }
    
    
    $sqlUser = "SELECT idUsuario FROM usuarios WHERE correo='" . $_SESSION['usuario'] . "'";

    $queryUser = mysqli_query($conexion, $sqlUser);

    //$idUsuario = $_SESSION["usuario"]["idUsuario"];

    $row = mysqli_fetch_assoc($queryUser);
    $idUsuario = $row['idUsuario'];


    $titulo = $_POST["postTitle"];
    $contenido = $_POST["postContent"];

    //$idUsuario = $_POST["idUsuario"];
    

    $sql = "INSERT INTO posts (idPost, idUsuario, fechaPublicacion, contenido, titulo) VALUES (NULL, '" . $idUsuario . "', current_timestamp(), '" . $contenido . "', '" . $titulo .  "')";

    try{
        mysqli_query($conexion, $sql);

        header("Location: http://localhost/SimpleArt/foro.php");
    }catch(Exception $e){
        header("Location: http://localhost/SimpleArt/foro.php?error=" . $e->getMessage());
    }
    
?>