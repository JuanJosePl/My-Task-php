<?php
session_start();

include('../../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts WHERE mails = '$email'";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $ValidarContraseñas = $fila['passwords'];

        if (password_verify($password, $ValidarContraseñas)) {
            $_SESSION['usuario_id'] = $fila['id'];
            $_SESSION['usuario'] = $fila;
            $_SESSION["login"] = $fila['id']; 

            header('Location: /ruta_a_redirigir');
            exit;
        } else {
            echo "Contraseña incorrecta.";
            exit;
        }
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}

mysqli_close($conn);
?>
