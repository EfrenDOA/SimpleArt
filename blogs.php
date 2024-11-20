<?php

    require './php/conexion.php';

    session_start();

    $sql = "SELECT * FROM articulos";
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
    <title>SimpleArt - Blogs</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="css/styleBlogs.css">

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
            <a class="active" href="blogs.php">Blogs</a>
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

    <!-- Main de Blogs -->
    <main>

        
            <!-- Blogs -->
            <section class="blogs swiper">
                <h1>Bisutería</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="bisuteria swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'bisuteria'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postBis_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Tejido</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="tejido swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'tejido'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postTej_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Porcelana fría</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="porcelana swiper-wrapper">
                    
                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'porcelana'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postPorc_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Costura</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="costura swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'costura'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postCost_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>       
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Pintura</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="pintura swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'pintura'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postPint_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Papiroflexia</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="papiroflexia swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'papiroflexia'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postPap_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Globoflexia</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="globoflexia swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'globoflexia'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postGlob_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Papel y cartón</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="pyc swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'papel'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postPyC_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>DIY</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="diy swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'diy'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postDIY_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
                        }
                    ?>
                </div>
            </section>

            <section class="blogs swiper">
                <h1>Reciclaje</h1>
                <div class="sliderBtn">
                    <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                    <span class="fa-solid fa-angle-right swiper-button-next"></span>
                </div>

                <div class="reciclaje swiper-wrapper">

                    <?php
                        foreach($articulos as $key => $articulo) {
                            if($articulo['categoria'] == 'reciclaje'){

                                $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);
                                $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                    ?>

                        <div class="individualBlogs swiper-slide" id="postRec_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                            <div class="containerImg">
                                <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                            </div>
                            <div class="contentBlog">
                                <h4><?php echo $articulo['titulo']?></h4>
                            </div>
                            <div class="autoria">
                                <p><?php echo $autor?>
                                <br>
                                <?php echo $articulo['fechaPublicacion']?></p>
                            </div>
                        </div>

                    <?php
                            }
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script src="header.js"></script>
    <script src="js/swiperSlider.js"></script>

</body>
</html>