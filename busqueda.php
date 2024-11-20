<?php
    require './php/conexion.php';

    session_start();

    $query = isset($_GET['query']) ? mysqli_real_escape_string($conexion, $_GET['query']) : '';

    $sql = "SELECT * FROM articulos WHERE titulo LIKE '%$query%' ORDER BY fechaPublicacion DESC, hora DESC";
    $result = mysqli_query($conexion, $sql);

    $articulos = array();
    while ($row = mysqli_fetch_assoc($result)) {
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
    <link rel="stylesheet" href="busqueda.css">

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

    <!-- Main de Inicio (index)-->
    <main>
        <section class="blogs">
            <h1>Resultados de la búsqueda</h1>
            <div class="recienAgregados">
                <?php 
                    if (count($articulos) > 0){
                        foreach ($articulos as $articulo){
                ?>
                        <?php
                            $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $articulo['idUsuario'] . "'";
                            $queryUser = mysqli_query($conexion, $sqlUser);
                            $rowUser = mysqli_fetch_assoc($queryUser);
                            $autor = $rowUser["nombre"] . " " . $rowUser['apellidos'];
                        ?>
                            <div class="individualBlogs" id="post_<?php echo $articulo['idArticulo'] ?>" onclick="window.location.href='./articulo.php?id=<?php echo $articulo['idArticulo'] ?>'">
                                <div class="containerImg">
                                    <img src="./img/<?php echo $articulo['imagen'] ?>" alt="imagen">
                                </div>
                                <div class="contentBlog">
                                    <h4><?php echo $articulo['titulo']?></h4>
                                </div>
                                <div class="autoria">
                                    <p><?php echo $autor?><br><?php echo $articulo['fechaPublicacion']?></p>
                                </div>
                            </div>
                <?php 
                        }
                    } else { 
                ?>
                    <p>No se encontraron resultados para "<?php echo htmlspecialchars($query); ?>"</p>
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