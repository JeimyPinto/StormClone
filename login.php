<?php
//iniciar sesion
session_start();
include_once 'scripts/connection.php';

//Verificar si hay algo enviado por post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //verificar si los campos no estan vacios
    if (!empty($email) && !empty($password)) {
        //verificar si el email existe en la base de datos de la tabla usuario
        $stmt = $conn->prepare('SELECT * FROM usuario WHERE correo_electronico = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            //verificar si el password es correcto
            $row = $result->fetch_assoc();
            $password_bd = $row['contrasena'];

            if ($password_bd == $password) {
                $_SESSION['email'] = $email;
                header('Location: home.html');
            } else {
                echo "La contraseña no coincide";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon import -->
    <link rel="icon" href="assets/images/Storm.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/login.css">
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

        <div class="signin">
            <h2>Inicio de sesión</h2>
            <form class="signin" action="" method="post">

                <div class="input">
                    <input class="input1" type="email" placeholder="Correo" name="email" required>
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