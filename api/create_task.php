<?php
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $name = $_POST['name'];
    $description = $_POST['description'];
    $finishDate = $_POST['finishDate'];
    $userId = $_POST['userId'];

    // Inserta la tarea en la base de datos
    $sql = "INSERT INTO tasks (names_tasks, descriptions_tasks	, finish_dates, userId) VALUES ('$name', '$description', '$finishDate', '$userId')";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea Creada Correctamente.";
        header("Location: /task/app/Views/pages/task/tasks.php");
        exit;
    } else {
        echo 'Error al crear la tarea: ' . $conn->error;
        header('Refresh: 3; url=/task/app/Views/pages/task/tasks.php');
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    header('Refresh: 3; url=/task/app/Views/pages/task/tasks.php');
    exit;
}

$conn->close();
