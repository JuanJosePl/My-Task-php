<?php
session_start();

$userLoggedIn = true;

if (isset($_SESSION["login"]) && $_SESSION["login"] == "OK") {
    $userLoggedIn = false;
} else {
    header("Location: /task/app/index.php");
    exit;
}
?>


<div class="navbar__links navbar__links--left ">
    <img src="../../../../../../task/public/icons/cheque.png" alt="Icono de My-Task" class="navbar__app-icon" />
    <?php if (!$userLoggedIn) { ?>
        <a href="/task/app/index.php" class="navbar__app-name">My-Task</a>
    <?php } ?>
</div>
<div class="navbar__links navbar__links--right">
    <?php if ($userLoggedIn) { ?>
        <div>
            <a href="/taskform" class="navbar__app-name">My-Task</a>
            <a href="/" class="navbar__link-cerrar-sesion" onclick="openLogoutModal(event)">Cerrar sesión</a>
        </div>
    <?php } else { ?>
        <div>
            <a href="/task/app/Views/pages/login/login.php" class="navbar__link">Iniciar sesión</a>
            <a href="/task/app/Views/pages/register/register.php" class="navbar__link">Registrarse</a>
        </div>
    <?php } ?>
</div>
<div class="switch">
    <!-- Agrega aquí tu lógica para el switch si es necesaria en PHP -->
    <?php
    // Código PHP para manejar el switch
    ?>
</div>

<!-- Agrega aquí el código HTML/PHP necesario para el modal de logout -->

<script>
    function openLogoutModal(event) {
        event.preventDefault();
        // Agrega aquí la lógica para abrir el modal de logout en PHP si es necesario
    }
</script>
