<?php
require('controladores/funciones.php');
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errores = [];
    $errores = validarUsuarioLogin($_POST);
    if (count($errores) === 0) {
        $bd = conexion('localhost', 'comodoroTurismo', 'root', '');
        $usuario = buscarU($bd, 'usuarios', $email);
        if ($usuario === false) {
            $errores['email'] = 'El usuario o contraseña son inválidos';
        } else {
            if (password_verify($password, $usuario['password']) === false) {
                $errores['password'] = 'El usuario o contraseña son inválidos';
            } else {
                seteoUsuario($usuario, $_POST);
                header("location: perfil.php");
            }
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

<body>
    <?php require_once('partials/navegador.php') ?>
    <div class="a">
        <h1>Iniciar Sesion</h1>
        <span>o <a href="registro.php">Regístrate</a></span>
    </div>

    <section class="formulario">
        <?php if (isset($errores)) : ?>
            <ul class="text-center alert alert-danger">

                <?php foreach ($errores as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form class="mx-auto w-50" action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ""; ?>" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Clave</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="recordarme">
                <label class="form-check-label" for="recordarme">
                    Recordarme
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Inciar sesión</button>
            <div class="mt-3 text-center">
                <a href="registro.php">Aun no poseo una cuenta!</a>
            </div>
        </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</body>



</html>