<?php

    require './php/conexion.php';

    session_start();

    $sql = "SELECT * FROM articulos ORDER BY fechaPublicacion DESC, hora DESC LIMIT 4;";
    $query = mysqli_query($conexion, $sql);

    $articulos = array();
    while($row = mysqli_fetch_assoc($query)) {
        $articulos[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleArt - Blog de manualidades</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="css/styleInicio.css">

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
            <a class="active" href="index.php">Inicio</a>
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

    <!-- Main de Inicio (index)-->
    <main>
        <!-- Presentación -->
        <section class="banner">
            <div class="txtBanner">
                <h1>Imagina, Diseña, Crea y Comparte</h1>
                <p>Si tu cabeza es un torbellino lleno de ideas, proyectos, papeles, herramientas, telas, sueños y creatividad, ¡este blog es perfecto para ti! Nos encantan las manualidades, el scrapbooking, la costura, la bisutería y todo lo que implique meter mano y hacerlo tú mismo, ya sea un poquito o un montón.
                </p>
            </div>
            <div class="imgBanner">
                <img src="img/presentacion.png" alt="">
            </div>
        </section>

        <!-- Sobre nosotros -->
        <h1 id="titleAbout">Sobre nosotros</h1>
        <section class="about">
            <div class="imgAbout">
                <img src="img/aboutUs.png" alt="">
            </div>
            <div class="txtAbout">
                <p>En SimpleArt, nos apasiona explorar el mundo de las manualidades y el arte DIY. Somos un equipo de entusiastas creativos que disfrutamos sumergiéndonos en proyectos hechos a mano, desde scrapbooking hasta costura, pasando por la creación de bisutería única.
                <br>
                Nuestro objetivo es inspirarte a través de ideas creativas, tutoriales paso a paso y consejos prácticos que te ayudarán a dar rienda suelta a tu creatividad y a crear proyectos increíbles con tus propias manos.
                <br> 
                Ya sea que estés buscando nuevas técnicas, inspiración para un proyecto específico o simplemente quieras sumergirte en el maravilloso mundo de las manualidades, ¡estás en el lugar correcto! Únete a nuestra comunidad y juntos exploraremos el arte de lo simple en SimpleArt.</p>
            </div>
        </section>

        <!-- Blogs -->
        <!--
        <section class="blogs">
            <h1>Tendencias</h1>
            <div class="tendencias">
                <div class="individualBlogs">
                    <div class="containerImg">
                        <img class="imgPost" id="img1" src="img/prueba1.jpg" alt="">
                    </div>
                    <div class="contentBlog">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                    </div>
                    <div class="autoria" id="aut1">
                        <p>Autor | Fecha</p>
                    </div>
                </div>

                <div class="individualBlogs">
                    <div class="containerImg">
                        <img class="imgPost" id="img2" src="img/prueba2.jpg" alt="">
                    </div>
                    <div class="contentBlog">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                    </div>
                    <div class="autoria" id="aut2">
                        <p>Autor | Fecha</p>
                    </div>
                </div>

                <div class="individualBlogs">
                    <div class="containerImg">
                        <img class="imgPost" id="img3" src="img/prueba3.jpg" alt="">
                    </div>
                    <div class="contentBlog">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                    </div>
                    <div class="autoria" id="aut3">
                        <p>Autor | Fecha</p>
                    </div>
                </div>

                <div class="individualBlogs">
                    <div class="containerImg">
                        <img class="imgPost" id="img4" src="img/prueba4.jpg" alt="">
                    </div>
                    <div class="contentBlog">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                    </div>
                    <div class="autoria" id="aut4">
                        <p>Autor | Fecha</p>
                    </div>
                </div>
            </div> 
-->
        <section class="blogs">
            <h1>Recien agregados</h1>
            <div class="recienAgregados">
                <?php
                    foreach($articulos as $key => $articulo) {
                        $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                        $queryUser = mysqli_query($conexion, $sqlUser);
                        $rowUser = mysqli_fetch_assoc($queryUser);
                        $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                ?>

                <div class="individualBlogs" id="postRecent_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                    <div class="containerImg">
                        <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                    </div>
                    <div class="contentBlog">
                        <h4><?php echo $articulo['titulo']?></h4>
                    </div>
                    <div class="autoria" id="aut5">
                        <p><?php echo $autor?>
                            <br>
                            <?php echo $articulo['fechaPublicacion']?>
                        </p>
                    </div>
                </div>

                <?php
                    }
                ?>
                
            </div> 
        </section>
    </main>

    <footer>
        <div class="copyright">
            <p>&copy; 2024 SimpleArt. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="header.js"></script>
</body>
</html>