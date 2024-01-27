<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../index.css">
    <title>Login || My-Task</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" id="<?php echo $contextTheme; ?>">
        <?php include('../../include/navbar/navbar.php'); ?>
    </nav>

    <form action="../../../Controllers/LoginController.php" method="post" class="login-form" id="contextTheme">
        <div class="login-form__header">
            <h2 class="login-form__title">Iniciar Sesión</h2>
            <p class="login-form__subtext">
                Ingresa a tu cuenta para comenzar.
            </p>
        </div>
        <label class="login-form__input-label">
            <span class="login-form__icon">&#128101;</span>
            <input type="email" name="email" class="login-form__input" placeholder="Correo Electrónico" required>
        </label>
        <label class="login-form__input-label">
            <span class="login-form__icon">&#128273;</span>
            <input type="password" name="password" class="login-form__input" placeholder="Contraseña" required>
        </label>
        <button type="submit" class="login-form__submit-button">
            Iniciar Sesión
        </button>
        <p class="login-form__registro">
            ¿No tienes una cuenta? <a href="/task/app/Views/pages/register/register.php">Regístrate aquí</a>
        </p>
    </form>

    <!-- footer -->
    <footer class="footer" id="<?php echo $contextTheme; ?>">
        <?php include('../../include/footer/footer.php'); ?>
    </footer>
</body>

</html>
