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

            header('Location: /task/app/Views/pages/task/tasks.php');
            exit;
        } else {
            echo "Contraseña incorrecta.";
            header('Refresh: 3; url=/task/app/Views/pages/login/login.php');
            exit;
        }
    } else {
        echo "Usuario no encontrado.";
        header('Refresh: 3; url=/task/app/Views/pages/login/login.php');
        exit;
    }
}

mysqli_close($conn);
?>
