<?php

    require './php/conexion.php';

    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        $usuario = $_SESSION['usuario'];
        
    } else {
        header("Location: http://localhost/SimpleArt/acceder.php");
    }


    $sql = "SELECT * FROM posts ORDER BY CONCAT(fechaPublicacion, ' ', hora) DESC";
    $query = mysqli_query($conexion, $sql);

    $sqlUser = "SELECT username FROM usuarios WHERE correo='" . $_SESSION['usuario'] . "'";
    $queryUser = mysqli_query($conexion, $sqlUser);
    $rowUser = mysqli_fetch_assoc($queryUser);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Blog de manualidades</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="styleForo.css">


    <!-- link font awoseme (iconos utilizados) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


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
            <a class="active" href="foro.php">Foro</a>
        </nav>

        <!-- Iconos de navegación -->
        <div class="icons">
            <i class="fas fa-bars" id="menuBars"></i>
            
            
            <i class="fas fa-search" id="searchIcon"></i>
            
            <!--
            <a href="#" class="fas fa-bookmark"></a>
            -->
            <a href='acceder.php' class="fas fa-user" id="userBars"></a>
        </div>        
    </header>

    <!-- Search form-->

    <form action="busqueda.php" id="searchForm" method="GET">
        <input type="search" name="query" placeholder="Buscar aquí..." id="searchBox">
        <button for="searchBox" class="fa fa-search"></button>
        <i class="fas fa-times" id="close"></i>
    </form>

    <!-- Main de Inicio (index)-->
    <main>
        <section id="addPost">
            <h2>Agregar nuevo post</h2>
            <form action="./php/insertPost.php" method="POST">
                <label for="post-title">Título:</label>
                <input type="text" id="post-title" name="postTitle" required>
                <label for="post-content">Contenido:</label>
                <textarea id="post-content" name="postContent" required></textarea>

                <br>
                <?php
                    if(isset($_GET['error'])){
                        echo "<span>" . $_GET['error'] . "</span>";
                    }
                ?>

                <button type="submit">Publicar</button>
            </form>
        </section>

        <?php
            while($row = mysqli_fetch_array($query)){

                $sqlUser = "SELECT username FROM usuarios WHERE idUsuario='" . $row['idUsuario'] . "'";
                $queryUser = mysqli_query($conexion, $sqlUser);
                $rowUser = mysqli_fetch_assoc($queryUser);

        ?>

            <section id="individualPost">
                <article class="contentPost">
                    <h2><?php echo $row['titulo'] ?></h2>
                    <p class="autor"><b>Por: </b><?php echo $rowUser['username'] ?> | <span class="fecha"><?php echo $row['fechaPublicacion'] ?></span></p>
                    <p>
                        <?php echo $row['contenido'] ?>
                    </p>
                </article>

                <div class="informacion">

                </div>

                <article class="icosnInteractive">

                    </div>

                    
                </article>
            </section>

        <?php
            }
        ?>

    </main>

    
    
    


    <div class="contentComment">
        <div class="cajaComentarios">
            <div class="closeComment">
                <i class="fas fa-times" id="closeComment"></i>
            </div>
            
            <div class="comentarios" >

                
            </div>

            <div class="comentarioForm">
                <form id="comentForm" action="./php/insertCommentPost.php" method="POST" >
                    <textarea id="comentario" placeholder="Añadir comentario" required name="comentario"></textarea>
                    <input type="text" hidden value="" name="idPost" id="idCommentPost">
                    <button type="submit" class="fa-regular fa-paper-plane"></button>
                </form>
            </div>
    
        </div>
    </div>

    </script>

    <footer>
        <div class="copyright">
            <p>&copy; 2024 SimpleArt. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="header.js"></script>
    <script src="js/foro.js"></script>
    <script src="comentario.js"></script>
    
</body>
</html>