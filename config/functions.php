<?php
function obtenerUserId()
{
    // Inicia la sesión si aún no está iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verifica si el ID del usuario está almacenado en la sesión
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    }

    // Si no hay ID de usuario en la sesión, redirige a la página de inicio de sesión.
    header('Location: /task/app/Views/pages/login/login');
    exit(); 

}
