<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Register || My-Task</title>
    <link rel="stylesheet" href="../../../index.css">
</head>

<body>

    <!-- Navbar -->
   
        <?php include('../../include/navbar/navbar.php'); ?>
    

    <div class="contenedor" id="contextTheme">
        <div class="login-form__uno">
            <h2 class="login-form__titulo">¡Regístrate para comenzar!</h2>
            <p class="login-form__descripcion">
                Completa los siguientes campos para crear tu cuenta.
            </p>
            <form action="../../../Controllers/RegisterController.php" method="post">
                <div class="login-form__fila">
                    <div class="login-form__campo">
                        <span class="login-form__icon">&#128100;</span>
                        <input type="text" name="firstName" placeholder="Nombre" class="login-form__input" required>
                    </div>
                    <div class="login-form__campo">
                        <span class="login-form__icon">&#128101;</span>
                        <input type="text" name="lastName" placeholder="Apellido" class="login-form__input" required>
                    </div>
                </div>
                <div class="login-form__fila">
                    <div class="login-form__campo">
                        <span class="login-form__icon">&#9993;</span>
                        <input type="email" name="email" placeholder="Correo Electrónico" class="login-form__input" required>
                    </div>
                    <div class="login-form__campo">
                        <span class="login-form__icon">&#128273;</span>
                        <input type="password" name="password" placeholder="Contraseña" class="login-form__input" required>
                    </div>
                </div>
                <button type="submit" class="login-form__btn" role="button">
                    Registrarse
                </button>
            </form>
            <p class="login-form__registro">
                ¿Ya tienes una cuenta? <a href="/task/app/Views/pages/login/login.php">Iniciar sesión</a>
            </p>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer" id="<?php echo $contextTheme; ?>">
        <?php include('../../include/footer/footer.php'); ?>
    </footer>

</body>

</html>
