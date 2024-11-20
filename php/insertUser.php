<?php
    require 'conexion.php';


    if(!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["username"]) || !isset($_POST["correo"]) || !isset($_POST["passwd"]) || !isset($_POST["passwdConfirm"]) ){
        header("Location: http://localhost/SimpleArt/registro.php?error=Datos incompletos");

        return;
    }


    $name = $_POST["nombre"];
    $lastName = $_POST["apellidos"];
    $username = $_POST["username"];
    $email = $_POST["correo"];
    $passwd = $_POST["passwd"];
    $passwdConfirm = $_POST["passwdConfirm"];

    if ($passwd !== $passwdConfirm) {
        header("Location: http://localhost/SimpleArt/registro.php?error=Las contraseñas no coinciden");
        return;
    }

    $sql = "INSERT INTO usuarios (idUsuario, nombre, apellidos, username, correo, passwd, fechaUnion) VALUES (NULL, '" . $name . "', '" . $lastName . "', '" . $username . "', '" . $email . "', '" . $passwd . "' , current_timestamp())";

    try{
        mysqli_query($conexion, $sql);

        header("Location: http://localhost/SimpleArt/acceder.php");
    }catch(Exception $e){
        header("Location: http://localhost/SimpleArt/registro.php?error=" . $e->getMessage());
    }
    
?>