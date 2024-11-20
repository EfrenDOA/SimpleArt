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
            <h1>Formulario de articulos</h1>
            <form action="./php/insertArticle.php" method="POST" enctype="multipart/form-data">
                <label for="titulo">TÍtulo del artículo</label>
                <input type="text" name="titulo" required>
                <br>

                <label for="categoria">Categoria</label>
                <select name="categoria" required>
                    <option value="bisuteria">Bisutería</option>
                    <option value="tejido">Tejido</option>
                    <option value="porcelana">Porcelana Fría</option>
                    <option value="costura">Costura</option>
                    <option value="pintura">Pintura</option>
                    <option value="papiroflexia">Papiroflexia</option>
                    <option value="globoflexia">Globoflexia</option>
                    <option value="diy">DIY</option>
                    <option value="papel">Papel y cartón</option>
                    <option value="reciclaje">Reciclaje</option>
                </select>
                <br>

                <label for="imagen">Imagen de la manualidad</label>
                <input type="file" name="imagen" required>
                <br>

                <label for="plantilla">Plantilla para realizar la manualidad (Opcional)</label>
                <input type="file" name="plantilla">
                <br>

                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" required>
                <br>

                <p class="instrucciones">Para las siguientes secciones (materiales, herramientas, procedimiento) por favor, dejar un salto de linea entre cada uno. Por ejemplo:
                <br><br>
                <b>Material:</b>
                <br>
                Hojas iris
                <br>
                Diamantina
                <br>
                Cartulina
                </p>
                <br>
                <label for="materiales">Materiales</label>
                <textarea name="materiales" required></textarea>
                <br>
                
                <label for="herramientas">Herramientas</label>
                <textarea name="herramientas" required></textarea>
                <br>

                <label for="procedimiento">Procedimiento</label>
                <textarea name="procedimiento" required></textarea>
                <br>

                <button type="submit">Agregar</button>

                <?php
                    if(isset($_GET['error'])){
                        echo "<span>" . $_GET['error'] . "</span>";
                    }
                ?>
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