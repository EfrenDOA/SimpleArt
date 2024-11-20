<?php

    require './php/conexion.php';

    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        $usuario = $_SESSION['usuario'];
        $rol = $_SESSION['rol'];

        if($rol != "admin"){
            header("Location: http://localhost/SimpleArt/acceder.php");
        }
    }

    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Registro</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/styleRegister.css">

    <!-- link font awoseme (iconos utilizados) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icono en la pestaña -->
    <link rel="icon" href="img/logo.png">

</head>
<body>
    <div class="base">
        <div class="content">
            <!-- Logo de la página -->
            <div class="logo">
                <div class="logoimg">
                    <img src="img/logo.png" alt="">
                </div>
                <span>Simple<span style="color: #ffca9e; -webkit-text-stroke: 0.5px black;">Art</span></span>
            </div>

            <div class="register">
                <div class="divForm">
                    <form action="./php/insertUser.php" method="POST">
                        <input type="text" placeholder="Nombre(s)" name="nombre" required>
                        <input type="text" placeholder="Apellidos" name="apellidos" required>
                        <input type="text" placeholder="Nombre de usuario" name="username" required>
                        <input type="email" placeholder="Correo electrónico" name="correo" required>
                        <input type="password" placeholder="Contraseña" name="passwd" required>
                        <input type="password" placeholder="Confirmar contraseña" name="passwdConfirm" required>

                        <br>
                        <?php
                            if(isset($_GET['error'])){
                                echo "<span>" . $_GET['error'] . "</span>";
                            }
                        ?>

                        <button id="btnRegister" type="submit">Registrar</button>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="footPage">
            <footer>
                <p>&copy; 2024 SimpleArt - Blog de Manualidades</p>
            </footer>
        </div>
    </div>
</body>
</html>