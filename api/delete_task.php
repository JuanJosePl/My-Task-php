<?php
// Conexión a la base de datos
include('../config/database.php');

// Obtener el ID de la tarea a eliminar
$taskId = $_POST['task_id'];

// Query para eliminar la tarea
$sql = "DELETE FROM tasks WHERE id = $taskId";

// Ejecutar la consulta
if ($conn->query($sql)) {
    echo json_encode(['success' => true, 'message' => 'Tarea eliminada correctamente']);
    header("Location: /task/app/Views/pages/task/tasks.php");
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Error al eliminar la tarea']);
    header("Location: /task/app/Views/pages/task/tasks.php");
    exit;
}

// Cerrar la conexión
$conn->close();
