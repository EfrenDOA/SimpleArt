<?php

    require './php/conexion.php';


    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        $nombre = $_SESSION['nombre'] . " " . $_SESSION['apellidos'];
        $correo = $_SESSION['usuario'];
        $username = $_SESSION['username'];
        $fechaUnion = $_SESSION['fechaUnion'];
        $rol = $_SESSION['rol'];

    } else {
        //no existe ninguna sesión
        header("Location: http://localhost/SimpleArt/acceder.php");
    }

    $sqlUser = "SELECT idUsuario, username FROM usuarios WHERE correo='" . $_SESSION['usuario'] . "'";
    $queryUser = mysqli_query($conexion, $sqlUser);
    $rowUser = mysqli_fetch_assoc($queryUser);


    $sql = "SELECT * FROM posts WHERE idUsuario='". $rowUser['idUsuario'] . "' ORDER BY CONCAT(fechaPublicacion, ' ', hora) DESC";
    $query = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Blog de manualidades</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="css/styleForo.css">
    <link rel="stylesheet" href="stylePerfil.css">


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


    <div class="contentComment">
        <div class="cajaComentarios">
            <div class="closeComment">
                <i class="fas fa-times" id="closeComment"></i>
            </div>
            
            <div class="comentarios">
                <div class="comentarioInd">
                    <p id="user">
                        username 
                        <br>
                        <span>fecha publicación</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam et, facere quibusdam impedit quam enim velit necessitatibus adipisci omnis laudantium doloremque ratione placeat! Assumenda nulla, sit quas non minima est!</p>
                </div>
    
                <div class="comentarioInd">
                    <p id="user">
                        username 
                        <br>
                        <span>fecha publicación</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam et, facere quibusdam impedit quam enim velit necessitatibus adipisci omnis laudantium doloremque ratione placeat! Assumenda nulla, sit quas non minima est!</p>
                </div>
    
                <div class="comentarioInd">
                    <p id="user">
                        username 
                        <br>
                        <span>fecha publicación</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam et, facere quibusdam impedit quam enim velit necessitatibus adipisci omnis laudantium doloremque ratione placeat! Assumenda nulla, sit quas non minima est!</p>
                </div>

                <div class="comentarioInd">
                    <p id="user">
                        username 
                        <br>
                        <span>fecha publicación</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam et, facere quibusdam impedit quam enim velit necessitatibus adipisci omnis laudantium doloremque ratione placeat! Assumenda nulla, sit quas non minima est!</p>
                </div>

                <div class="comentarioInd">
                    <p id="user">
                        username 
                        <br>
                        <span>fecha publicación</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam et, facere quibusdam impedit quam enim velit necessitatibus adipisci omnis laudantium doloremque ratione placeat! Assumenda nulla, sit quas non minima est!</p>
                </div>
            </div>
    
            <div class="comentarioForm">
                <form id="comentForm">
                    <textarea id="comentario" placeholder="Añadir comentario" required></textarea>
                    <button type="submit" class="fa-regular fa-paper-plane"></button>
                </form>
            </div>
    
        </div>
    </div>
    

    <!-- Main de Inicio (index)-->
    <main>
        <section class="profileCard">
            <!--
            <div class="imgAvatarContainer">
                <img src="avatar.jpg" alt="Avatar" class="imgAvatar">
            </div>
        -->
            <div class="infoContainer">
                <div class="infoUser">
                    <h1 class="profileName"> <?php echo $nombre?> </h1>
                    <h3 class="profileUsername"> <?php echo $username?> </h3>
                    <p class="profileEmail">Correo electrónico: <?php echo $correo?> </p>
                    <p class="profileDate">Fecha de registro: <?php echo $fechaUnion?> </p>
                </div>

                <div class="btns">

                    <div class="btnIzq">
                        <?php
                            if ($rol == "admin" || $rol == "editor") {
                        ?>
                                <button onclick="window.location.href='agregarArticulo.php'" class="addArticle">Agregar artículo</button>
                        <?php
                            }
                        ?>  
                    </div>

                    <div class="btnIzq">
                        <?php
                            if ($rol == "admin"){
                        ?>
                                <button onclick="window.location.href='administrar.php'" class="addArticle deleteArticle">Administrar</button>
                        <?php
                            }
                        ?>  
                    </div>

                    <div class="btnDer">
                            <button type="submit" class="logout" name="logout" onclick="window.location.href='./php/logout.php'">Cerrar sesión</button>
                    </div>
                </div>
                
            </div>
        </section>

        <?php
            while($row = mysqli_fetch_array($query)){

        ?>

            <section id="individualPost">
                <article class="contentPost">
                    <h2><?php echo $row['titulo'] ?></h2>
                    <p class="autor"><b>Por: </b><?php echo $username ?> | <span class="fecha"><?php echo $row['fechaPublicacion'] ?></span></p>
                    <p>
                        <?php echo $row['contenido'] ?>
                    </p>
                </article>

                <div class="informacion">
                </div>

                <article class="icosnInteractive">
                </article>
            </section>

        <?php
                
            }
        ?>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy; 2024 SimpleArt. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="header.js"></script>
    <script src="js/foro.js"></script>
</body>
</html>