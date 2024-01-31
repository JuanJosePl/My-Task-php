<?php
// Conexión a la base de datos
include('../config/database.php');

// Obtener el ID de la tarea a eliminar
$taskId = $_POST['taskId'];

// Query para eliminar la tarea
$sql = "DELETE FROM tasks WHERE id = :taskId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':taskId', $taskId, PDO::PARAM_INT);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Tarea eliminada correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al eliminar la tarea']);
}
?>
