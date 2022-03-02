<?php
//require 'database.php';
require_once 'controladores/funciones.php';

if ($_POST) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $errores = [];

    $errores = validarUsuarioRegistro($_POST, $_FILES);
    //dd($_POST);
    if (count($errores) === 0) {
        $bd = conexion('localhost', 'comodoroTurismo', 'root', '');
        $avatar = armarImagen($_FILES);
        guardarUsuarioBD($bd, 'usuarios', $_POST, $avatar);
        //enviarEmail($_POST);
        //header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require 'partials/navegador.php'; ?>
    <div class="a">
        <h1>Regístrate</h1>
        <span> o <a href="login.php">Iniciar Sesion </a></span>
    </div>

    <?php if (isset($errores)) : ?>
        <ul class="text-center alert alert-danger">
            <?php foreach ($errores as $error) : ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" class="nombre" name="nombre" placeholder="nombre">

        <input type="text" class="apellido" name="apellido" placeholder="apellido">

        <input type="text" class="email" name="email" placeholder="ingrese email">

        <input type="password" class="password" name="password" placeholder="contraseña">

        <input type="password" class="password" name="confirm_password" placeholder="confirmar contraseña">

        <div>
            <input class="control" type="file" name="avatar">
        </div>

        <input type="date" class="fechaNacimiento" name="fechaNacimiento" id="fechaNacimiento">
        <label for="Enviar"></label>
        <input type="submit" id="enviar" class="enviar">
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>