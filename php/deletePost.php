<?php
    require 'conexion.php';

    session_start();

    if(!isset($_POST["username"]) || !isset($_POST["titulo"])){
        header("Location: http://localhost/SimpleArt/administrar.php?error=Datos incompletos");

        return;
    }

    $sqlUser = "SELECT idUsuario FROM usuarios WHERE username='" . $_POST['username'] . "'";

    $queryUser = mysqli_query($conexion, $sqlUser);

    if (mysqli_num_rows($queryUser) == 0) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Post no encontrado");
        return;
    }

    $row = mysqli_fetch_assoc($queryUser);

    $idUsuario = $row['idUsuario'];


    $sqlPost = "SELECT idPost FROM posts WHERE titulo='" . $_POST['titulo'] . "'";

    $queryPost = mysqli_query($conexion, $sqlPost);


    

    if (mysqli_num_rows($queryPost) == 0) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Post no encontrado");
        return;
    }

    $rowPost = mysqli_fetch_assoc($queryPost);

    $idPost = $rowPost['idPost'];

    // Eliminar los artículos del usuario
    $sqlDeletePost = "DELETE FROM posts WHERE idUsuario ='" . $idUsuario . "' AND idPost='". $idPost ."'";
    mysqli_query($conexion, $sqlDeletePost);


    try{
        mysqli_query($conexion, $sqlDeletePost);

        header("Location: http://localhost/SimpleArt/administrar.php");
    }catch(Exception $e){
        header("Location: http://localhost/SimpleArt/administrar.php?error=" . $e->getMessage());
    }
?>
