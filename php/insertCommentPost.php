<?php
    require 'conexion.php';

    session_start();

    if (!isset($_SESSION["usuario"])){
        //sesión activa
        header("Location: http://localhost/SimpleArt/acceder.php");
        return;
    }

    if(isset($_POST["comentario"]) && isset($_POST["idPost"])) {
        $comentario = $_POST["comentario"];
        $idPost = $_POST["idPost"];

        $sqlUser = "SELECT idUsuario FROM usuarios WHERE correo='" . $_SESSION['usuario'] . "'";
        $queryUser = mysqli_query($conexion, $sqlUser);
        $row = mysqli_fetch_assoc($queryUser);
        $idUsuario = $row['idUsuario'];

        $sql = "INSERT INTO comentariospost (idUsuario, idPost, contenido) VALUES ('" . $idUsuario . "', '" . $idPost . "', '" . $comentario . "')";

        try {
            mysqli_query($conexion, $sql);
            header("Location: http://localhost/SimpleArt/foro.php");
        } catch(Exception $e) {
            header("Location: http://localhost/SimpleArt/foro.php error=" . $e->getMessage());
        }
    } else {
        header("Location: http://localhost/SimpleArt/articulo.php?error=Datos incompletos");
    }

?>
