<?php
    require 'conexion.php';

    if (!isset($_POST["username"]) || !isset($_POST["rol"])) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Datos incompletos");
        exit;
    }

    $username = $_POST['username'];
    $rol = $_POST['rol'];

    // Sentencia preparada para seleccionar el usuario
    $stmtUser = $conexion->prepare("SELECT idUsuario FROM usuarios WHERE username = ?");
    $stmtUser->bind_param('s', $username);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows == 0) {
        header("Location: http://localhost/SimpleArt/administrar.php?error=Usuario no encontrado");
        exit;
    }

    $row = $resultUser->fetch_assoc();
    $idUsuario = $row['idUsuario'];

    // Sentencia preparada para actualizar el rol del usuario
    $stmtUpdate = $conexion->prepare("UPDATE usuarios SET rol = ? WHERE idUsuario = ?");
    $stmtUpdate->bind_param('si', $rol, $idUsuario);

    if ($stmtUpdate->execute()) {
        header("Location: http://localhost/SimpleArt/administrar.php");
    } else {
        header("Location: http://localhost/SimpleArt/administrar.php?error=" . $stmtUpdate->error);
    }

    $stmtUser->close();
    $stmtUpdate->close();
    $conexion->close();
?>
