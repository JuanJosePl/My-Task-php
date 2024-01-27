<?php
include('../../config/database.php');

// Obtener valores del formulario
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


// Verificar si el correo ya está registrado
$consulta_existencia = "SELECT COUNT(*) AS total FROM accounts WHERE mails = '$email'";
$result_existencia = mysqli_query($conn, $consulta_existencia);
$row_existencia = mysqli_fetch_assoc($result_existencia);
$total = $row_existencia['total'];

if ($total > 0) {
    echo "Los datos ya existen. Redirigiendo al Registro.";
    header('Refresh: 3; url=/task/app/Views/pages/register/register.php');
} else {
    // Insertar nuevo usuario en la base de datos
    $miconsulta = "INSERT INTO accounts (names, surnames, mails, passwords ) VALUES ('$firstName', '$lastName', '$email', '$password')";

    if (mysqli_query($conn, $miconsulta)) {
        echo "Registro exitoso. Redirigiendo al Login.";
        header('Refresh: 3; url=/task/app/Views/pages/login/login.php');
    } else {
        echo "Error al registrar: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
