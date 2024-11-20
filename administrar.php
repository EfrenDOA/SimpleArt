<?php
    require './php/conexion.php';

    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        $usuario = $_SESSION['usuario'];
    } else {
        //no existe ninguna sesión
        header("Location: http://localhost/SimpleArt/acceder.php");
    }

    $sql = "SELECT * FROM articulos";
    $query = mysqli_query($conexion, $sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Blog de manualidades</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/styleHeader.css">
    <link rel="stylesheet" href="styleFormArticle.css">

    <!-- link font awoseme (iconos utilizados) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icono en la pestaña -->
    <link rel="icon" href="img/logo.png">

</head>
<body>
    <header>
        <!-- Logo de la página -->
        <div class="logo">
            <div class="logoimg">
                <img src="img/logo.png" alt="">
            </div>
            <a href="#">Simple<span style="color: #f5f5f5; -webkit-text-stroke: 1px black;">Art</span></a>
        </div>
        
        <!-- Menu de navegación -->
        <nav class="navbar">
            <a href="index.php">Inicio</a>
            <a href="blogs.php">Blogs</a>
            <a href="plantillas.php">Plantillas</a>
            <a href="foro.php">Foro</a>
        </nav>

        <!-- Iconos de navegación -->
        <div class="icons">
            <i class="fas fa-bars" id="menuBars"></i>
            
            <!--
            <i class="fas fa-search" id="searchIcon"></i>
            
            <a href="#" class="fas fa-bookmark"></a>
            -->
            <a href='acceder.php' class="fas fa-user" id="userBars"></a>
        </div>        
    </header>

    <!-- Search form-->

    <form action="" id="searchForm">
        <input type="search" name="" placeholder="Buscar aquí..." id="searchBox">
        <label for="searchBox" class="fa fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>

    <!-- Main de Articulo-->
    <main>
        <section class="bodyArt">
            <h1>Administrar</h1>
            <form action="./php/deleteUser.php" method="POST">
                <br>
                <label for="titulo">Nombre de usuario</label>
                <input type="text" name="username" required>
                <br>

                <button type="submit">Eliminar usuario</button>            
            </form>

            <br>
            <br>
            <br>


            <form action="./php/updateRol.php" method="POST">
                <br>
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" required>
                <select name="rol" id="">
                    <option value="miembro">Miembro</option>
                    <option value="editor">Editor</option>
                    <option value="admin">Administrador</option>
                </select>
                <br>

                <button type="submit">Modificar rol</button>            
            </form>

            <br>
            <br>
            <br>

            <form action="./php/deleteArticle.php" method="POST">
                <br>
                <label for="titulo">Titulo de Articulo</label>
                <input type="text" name="titulo" required>
                <br>
                <label for="titulo">Nombre de usuario (autor)</label>
                <input type="text" name="username" required>
                <br>

                <button type="submit">Eliminar articulo</button>            
            </form>

            <br>
            <br>
            <br>

            <form action="./php/deletePost.php" method="POST">
                <br>
                <label for="titulo">Titulo del Post</label>
                <input type="text" name="titulo" required>
                <br>
                <label for="username">Nombre de usuario (autor)</label>
                <input type="text" name="username" required>
                <br>

                <button type="submit">Eliminar post</button>            
            </form>



        </section>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy; 2024 SimpleArt. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="js/header.js"></script>
</body>
</html>