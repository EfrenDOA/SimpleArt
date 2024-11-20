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
        header("Location: http://localhost/SimpleArt/administrar.php?error=Articulo no encontrado");
        return;
    }

    $row = mysqli_fetch_assoc($queryUser);

    $idUsuario = $row['idUsuario'];


    $sqlArticulo = "SELECT idArticulo FROM articulos WHERE titulo='" . $_POST['titulo'] . "'";

    $queryArticulo = mysqli_query($conexion, $sqlArticulo);

    if (mysqli_num_rows($queryArticulo) == 0) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Articulo no encontrado");
        return;
    }

    $row = mysqli_fetch_assoc($queryArticulo);

    $idArticulo = $row['idArticulo'];


    

    // Eliminar los comentarios de artículos del usuario
    $sqlDeleteComentariosArt = "DELETE FROM comentariosarts WHERE idArticulo =" . $idArticulo;
    mysqli_query($conexion, $sqlDeleteComentariosArt);


    // Eliminar los artículos del usuario
    $sqlDeleteArticulos = "DELETE FROM articulos WHERE idUsuario ='" . $idUsuario . "' AND idArticulo='". $idArticulo ."'";
    mysqli_query($conexion, $sqlDeleteArticulos);



    try{
        mysqli_query($conexion, $sqlDeleteArticulos);

        header("Location: http://localhost/SimpleArt/administrar.php");
    }catch(Exception $e){
        header("Location: http://localhost/SimpleArt/administrar.php?error=" . $e->getMessage());
    }
?>
