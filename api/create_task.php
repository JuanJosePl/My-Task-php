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
        echo json_encode(['success' => true, 'message' => 'Tarea creada correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al crear la tarea: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>
