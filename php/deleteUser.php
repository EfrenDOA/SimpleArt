<?php
    require 'conexion.php';

    session_start();

    if(!isset($_POST["username"])){
        header("Location: http://localhost/SimpleArt/administrar.php?error=Datos incompletos");

        return;
    }

    $sqlUser = "SELECT idUsuario FROM usuarios WHERE username='" . $_POST['username'] . "'";

    $queryUser = mysqli_query($conexion, $sqlUser);

    if (mysqli_num_rows($queryUser) == 0) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Usuario no encontrado");
        return;
    }

    $row = mysqli_fetch_assoc($queryUser);

    $idUsuario = $row['idUsuario'];

    // Eliminar los comentarios de artículos del usuario
    $sqlDeleteComentariosArt = "DELETE FROM comentariosarts WHERE idUsuario =" . $idUsuario;
    mysqli_query($conexion, $sqlDeleteComentariosArt);



    // Eliminar los posts del usuario
    $sqlDeletePosts = "DELETE FROM posts WHERE idUsuario =" . $idUsuario;
    mysqli_query($conexion, $sqlDeletePosts);

    // Eliminar los artículos del usuario
    $sqlDeleteArticulos = "DELETE FROM articulos WHERE idUsuario =" . $idUsuario;
    mysqli_query($conexion, $sqlDeleteArticulos);

    // Finalmente, eliminar el usuario
    $sqlDeleteUsuario = "DELETE FROM usuarios WHERE idUsuario =" . $idUsuario;


    try{
        mysqli_query($conexion, $sqlDeleteUsuario);

        header("Location: http://localhost/SimpleArt/administrar.php");
    }catch(Exception $e){
        header("Location: http://localhost/SimpleArt/administrar.php?error=" . $e->getMessage());
    }
?>
