<?php

    require './php/conexion.php';

    session_start();

    if (isset($_SESSION["usuario"])){
        //sesión activa
        $usuario = $_SESSION['usuario'];
        
    } else {
        header("Location: http://localhost/SimpleArt/acceder.php");
    }


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
    <title>SimpleArt - Plantillas</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="css/styleBlogs.css">

    <style>
        .contentBlog h4 {
            padding-bottom: 10px;
        }

        .contentBlog #descripcion {
            padding-bottom: 60px;
        }

        .enlaceDesc {
            color: black;
            text-align: center;
            padding: 20px 0px 40px 0;
        }
    </style>

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
            <a class="active" href="plantillas.php">Plantillas</a>
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
        <!-- Plantillas -->
        <section class="blogs swiper">
            <h1>Bisutería</h1>
            <div class="sliderBtn">
                <span class="fa-solid fa-angle-left swiper-button-prev"></span>
                <span class="fa-solid fa-angle-right swiper-button-next"></span>
            </div>

            <div class="bisuteria swiper-wrapper">

                <?php
                    foreach($articulos as $key => $articulo) {
                        if($articulo['categoria'] == 'bisuteria' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postBis_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'tejido' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postTej_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'porcelana' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postPorc_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'costura' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postCost_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'pintura' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postPint_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'papiroflexia' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postPap_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>

                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'globoflexia' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postGlob_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>

                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'papel' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postPyC_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>

                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>

                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'diy' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postDIY_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>
                                </div>
                                
                            </div>

                <?php
                            }
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
                        if($articulo['categoria'] == 'reciclaje' && $articulo['plantillas'] != ""){
                            
                            $nombreArchivo = $articulo['plantillas'];
                            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                            $urlDescarga = "img/{$nombreArchivo}";

                            $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                            $esPDF = strtolower($extension) === 'pdf';

                            if($esImagen || $esPDF) {
                ?>

                            <div class="individualBlogs swiper-slide" id="postRec_<?php echo $articulo['idArticulo'] ?>">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                    <br>
                                    <br>
                                    <a class="enlaceDesc" href="<?php echo $urlDescarga ?>" download>Plantilla disponible aquí</a>

                                </div>
                                
                            </div>

                <?php
                            }
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