<?php
    require 'conexion.php';

    session_start();

    // Verificar que todos los datos necesarios están presentes
    if (!isset($_POST["titulo"]) || !isset($_POST["descripcion"]) || !isset($_POST["materiales"]) || !isset($_POST["herramientas"]) || !isset($_POST["procedimiento"]) || !$_FILES["imagen"] || $_FILES["imagen"]["name"] == "") {
        header("Location: http://localhost/SimpleArt/agregarArticulo.php?error=Datos incompletos");
        return;
    }

    // Obtener el idUsuario basado en el correo de la sesión actual
    $sqlUser = "SELECT idUsuario FROM usuarios WHERE correo='" . $_SESSION['usuario'] . "'";
    $queryUser = mysqli_query($conexion, $sqlUser);
    $row = mysqli_fetch_assoc($queryUser);
    $idUsuario = $row['idUsuario'];

    // Asignar variables desde el formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $materiales = $_POST["materiales"];
    $herramientas = $_POST["herramientas"];
    $procedimiento = $_POST["procedimiento"];
    $categoria = $_POST["categoria"];

    $imagen = $_FILES["imagen"]["name"];
    $tipo = $_FILES["imagen"]["type"];
    $path = $_FILES["imagen"]["tmp_name"];

    // Validar el tipo de archivo de la imagen
    if (!strpos($tipo, 'jpeg') && !strpos($tipo, 'png') && !strpos($tipo, 'jpg')) {
        header("Location: http://localhost/SimpleArt/agregarArticulo.php?error=Formato de imagen incorrecto");
        return;
    }

    $plantilla = "";

    // Verificar si se ha subido una plantilla
    if (isset($_FILES["plantilla"]) && $_FILES["plantilla"]["name"] != "") {
        $plantilla = $_FILES["plantilla"]["name"];
        $tipoPlant = $_FILES["plantilla"]["type"];
        $pathPlant = $_FILES["plantilla"]["tmp_name"];

        // Validar el tipo de archivo de la plantilla
        if (!strpos($tipoPlant, 'jpeg') && !strpos($tipoPlant, 'png') && !strpos($tipoPlant, 'jpg') && !strpos($tipoPlant, 'pdf')) {
            header("Location: http://localhost/SimpleArt/agregarArticulo.php?error=Formato de archivo incorrecto");
            return;
        }
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO articulos (idArticulo, idUsuario, titulo, fechaPublicacion, descripcion, materiales, herramientas, procedimiento, imagen, categoria, plantillas) 
            VALUES (NULL, '" . $idUsuario . "', '" . $titulo . "', current_timestamp(), '" . $descripcion . "','" . $materiales . "', '" . $herramientas . "', '" . $procedimiento ."', '" . $imagen . "', '" . $categoria . "', '" . $plantilla . "')";

    try {
        mysqli_query($conexion, $sql);
        move_uploaded_file($path, "../img/" . $imagen);

        if ($plantilla != "") {
            move_uploaded_file($pathPlant, "../img/" . $plantilla);
        }

        header("Location: http://localhost/SimpleArt/blogs.php");
    } catch (Exception $e) {
        header("Location: http://localhost/SimpleArt/agregarArticulo.php?error=" . $e->getMessage());
    }
?>
