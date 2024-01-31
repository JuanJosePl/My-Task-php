<?php
// Conexión a la base de datos
include('../config/database.php');

// Obtener los datos actualizados de la tarea
$taskId = $_POST['taskId'];
$newName = $_POST['newName'];
$newDescription = $_POST['newDescription'];
$newFinishDate = $_POST['newFinishDate'];

// Query para actualizar la tarea
$sql = "UPDATE tasks SET name = :newName, description = :newDescription, finish_date = :newFinishDate WHERE id = :taskId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':taskId', $taskId, PDO::PARAM_INT);
$stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
$stmt->bindParam(':newDescription', $newDescription, PDO::PARAM_STR);
$stmt->bindParam(':newFinishDate', $newFinishDate, PDO::PARAM_STR);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Tarea actualizada correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar la tarea']);
}
?>
