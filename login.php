<?php
//iniciar sesion
session_start();
require_once '../conecction.php';


//consultar si el metodo es post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //recibir datos
    $email = $_POST['email'];
    $pass = $_POST['password'];
    echo "<script>console.log('$email');</script>";
    echo "<script>console.log('$pass');</script>";
    //consultar si el usuario existe
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND pass = '$pass'";
    $result = $conn->query($sql);
    //si existe
    if ($result->num_rows > 0) {
        //redireccionar a la pagina de inicio
        header('Location: ../../home.html');
    } else {
        //redireccionar a la pagina de login y enviar un mensaje de error por consola
        echo "<script>console.log('Usuario o contraseña incorrectos');</script>";
        header('Location: ../../login.html');
    }
} else {
    //redireccionar a la pagina de login
    header('Location: ../../login.hmtl');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import bootstrap por CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fonts/fontawesome-webfont.eot">
    <!-- favicon import -->
    <link rel="icon" href="assets/images/Storm.png" type="image/x-icon">
    <title>STORM GPS</title>

</head>

<body>

    <section class="home">
        <div class="content">
            <a href="#">STORM GPS</a>
            <h2>Bienvenidos</h2>
            <pre>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </pre>

            <div class="icon">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-github"></i>
            </div>
        </div>

        <div class="col-6 row text-center ">
            <form class="signin" action="" method="post">
                <h2>Inicio de sesión</h2>

                <div class="input">
                    <input type="email" placeholder="Correo" name="email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input">
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="check">
                    <label><input type="checkbox" class="checking">Recordarme</label>
                    <a href="#">¿Olvidaste la contraseña?</a>
                </div>

                <div class="btn">
                    <button class="buttons" id="loginButton">Ingresar</button>
                </div>

                <div class="account">
                    <p>¿No tienes una cuenta?</p>
                    <a href="#">Regístrate</a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>