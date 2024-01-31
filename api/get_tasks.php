<?php
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_GET['userId'];

    // Obtén las tareas del usuario
    $sql = "SELECT * FROM tasks WHERE userId = '$userId'";
    $result = $conn->query($sql);

    $tasks = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    echo json_encode(['success' => true, 'tasks' => $tasks]);
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>
