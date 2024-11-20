<?php
    require 'conexion.php';

    if(!isset($_POST["user"]) || !isset($_POST["pass"]) ){
        header("Location: http://localhost/SimpleArt/acceder.php?error=Error al iniciar sesión");

        return;
    }

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $sql = "SELECT COUNT(*) as login, rol, nombre, apellidos, username, fechaUnion FROM usuarios WHERE correo='" . $user . "' AND passwd='" . $pass ."'";

    $query = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($query);

    session_start();

    if($row['login'] > 0){
        //login exitoso
        $_SESSION['usuario'] = $user;
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellidos'] = $row['apellidos'];
        $_SESSION['fechaUnion'] = $row['fechaUnion'];
        header("Location: http://localhost/SimpleArt/perfil.php");
    } else {
        //login incorrecto
        header("Location: http://localhost/SimpleArt/acceder.php?error=Error al iniciar sesión");
    }
?>