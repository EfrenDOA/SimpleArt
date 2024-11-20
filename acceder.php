<?php
    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        header("Location: http://localhost/SimpleArt/perfil.php");
        return;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Acceso</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/styleAccess.css">

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
                <p>¿No tienes una cuenta? </p><a href="registro.php"> Registrarse</a>
            </div>

            <div class="access">
                <div class="divForm">
                    <form action="./php/login.php" method="POST">
                        <br>
                        <input type="email" name="user" placeholder="Correo electrónico">
                        <br>
                        <input type="password" name="pass" placeholder="Contraseña">
                        <br>
                        <?php
                            if(isset($_GET['error'])){
                                echo "<span>" . $_GET['error'] . "</span>";
                            }
                        ?>
                        <br>
                        <a href="index.php">Volver al inicio</a>
                        <br>
                        
                        <button id="btnAccess" type="submit">Acceso</button>
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