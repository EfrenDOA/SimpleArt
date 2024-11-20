<?php
    require './php/conexion.php';

    if (!isset($_GET['id'])) {
        header("Location: http://localhost/SimpleArt/blogs.php?error=No se encontro el articulo");

        return;
    }

    $idArticulo = $_GET['id'];

    $sql = "SELECT * FROM articulos WHERE idArticulo= '" . $idArticulo . "'";
    $query = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($query);

    $sqlUser = "SELECT nombre, apellidos FROM usuarios WHERE idUsuario='" . $row['idUsuario'] . "'";
    $queryUser = mysqli_query($conexion, $sqlUser);
    $rowUser = mysqli_fetch_assoc($queryUser);
    $autor = $rowUser['nombre'] . " " . $rowUser['apellidos'];


    $comentariosArt = array();

    $sqlComment = "SELECT * FROM comentariosarts WHERE idArticulo= '" . $idArticulo . "' ORDER BY CONCAT(fecha, ' ', hora) DESC";
    $queryComment = mysqli_query($conexion, $sqlComment);

    while($rowComment = mysqli_fetch_assoc($queryComment)) {
        $comentariosArt[] = $rowComment;
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
    <link rel="stylesheet" href="css/styleArticle.css">

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

    <form action="busqueda.php" id="searchForm" method="GET">
        <input type="search" name="query" placeholder="Buscar aquí..." id="searchBox">
        <button for="searchBox" class="fa fa-search"></button>
        <i class="fas fa-times" id="close"></i>
    </form>

    <!-- Main de Articulo-->
    <main>
        <section class="bodyArt">
            <h1 id="tituloM"><?php echo $row['titulo']?></h1>

            <div class="img1">
                <img id="img1" src="img/<?php echo $row['imagen']?>" alt="imagen">
            </div>

            <p id="autoria">
                <b>Por: </b><?php echo $autor?>
                <br>
                <b>Fechal de publicación: </b> <?php echo $row['fechaPublicacion']?>
                <br>
                <b>Hora publicación: </b> <?php echo $row['hora']?> horas
            </p>

            <div class="container">
                <h3 id="sub1">Descripción</h3>
                <p class="descripcion">
                    <?php echo $row['descripcion']?>
                </p>
            </div>

            <?php
                if($row['plantillas'] != ""){

                    $nombreArchivo = $row['plantillas'];
                    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                    $urlDescarga = "./img/{$nombreArchivo}";

                    echo $nombreArchivo;
                    echo $extension;
                    echo $urlDescarga;

                    $esImagen = in_array(strtolower($extension), array('jpg', 'jpeg', 'png'));
                    $esPDF = strtolower($extension) === 'pdf';

                    if($esImagen || $esPDF) {
            ?>

                        <div class="container">
                            <h3>Plantilla</h3>
                            
                                <?php 
                                    session_start(); 
                                    
                                    if(isset($_SESSION['usuario'])) {
                                
                                ?>
                                    <p>
                                        Plantilla disponible en el siguiente enlace: <a href="<?php echo $urlDescarga ?>" download><?php echo $row['titulo'] . "_plantilla"?></a>
                                    </p>
                                    

                                <?php 
                                    } else {
                                ?>
                                    Registrarse o iniciar sesión para poder ver la plantilla.
                                <?php 
                                    }
                                ?>
                            
                        </div>

         
            <?php
                    }
                }
            ?>

            <div class="container">
                <h3 id="sub2">Materiales</h3>
                <ul>
                    <?php  
                        $materiales = explode("\n", $row['materiales']);

                        foreach ($materiales as $material) {
                            echo "<li>$material</li>";
                        }
                    ?>
                </ul>
            </div>

            <div class="container">
                <h3 id="sub3">Herramientas</h3>
                <ul>
                    <?php  
                        $herramientas = explode("\n", $row['herramientas']);

                        foreach ($herramientas as $herramienta) {
                            echo "<li>$herramienta</li>";
                        }
                    ?>
                </ul>
            </div>

            <div class="container">
                <h3 id="sub4">Procedimiento</h3>
                <ul class="pasos">
                    <?php  
                        $pasos = explode("\n", $row['procedimiento']);

                        foreach ($pasos as $paso) {
                            echo "<li>$paso</li>";
                        }
                    ?>
                </ul>
            </div>
        </section>

        
        <section class="lateral">
            <div class="comentarios">
                <h1 id="tituloLat">Comentarios</h1>

                <div class="comentariosBox">
                    <div class="comentarioForm">
                        <form id="comentForm" action="./php/insertCommentArt.php" method="POST" >
                            <textarea id="comentario" name="comentario" placeholder="Añadir comentario" required></textarea>
                            <input type="text" hidden value="<?php echo $idArticulo?>" name="idArticulo">
                            <button type="submit" class="fa-regular fa-paper-plane"></button>
                        </form>
                    </div>

                    <?php
                        foreach($comentariosArt as $key => $comentarioArt) {
                                                       
                            if($comentarioArt['idArticulo'] == $idArticulo){
                                $sqlUser = "SELECT username FROM usuarios WHERE idUsuario='" . $comentarioArt['idUsuario'] . "'";
                                $queryUser = mysqli_query($conexion, $sqlUser);
                                $rowUser = mysqli_fetch_assoc($queryUser);

                    ?>

                            <div class="comentarioInd">
                                <p id="user">
                                    <?php echo $rowUser['username']?> 
                                    <br>
                                    <span><?php echo $comentarioArt['fecha']?> </span>
                                    <br>
                                    <span><?php echo $comentarioArt['hora']?> </span>
                                </p>
                                <p><?php echo $comentarioArt['contenido']?> </p>
                            </div>


                    <?php
                            }
                        }
                    ?>
                </div>
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