<?php
include('../../../../../task/app/Views/include/icons/icons.php');

include('../../../../config/database.php');

// Obtén el userId del usuario actual, puedes obtenerlo de tu sistema de autenticación
$userId = obtenerUserId(); // Esta función debería obtener el ID del usuario autenticado

// Consulta SQL para obtener las tareas del usuario
$sql = "SELECT * FROM tasks WHERE userId = $userId";
$resultado = $conn->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Imprime las tareas en un formato que desees
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='card__task " . ($fila['isCompleted'] ? 'completed' : 'pending') . "' key='" . $fila['id'] . "'>";
        echo "<div class='card__task-info'>";
        echo "<h3 class='card__task-name'>" . $fila['names_tasks'] . "</h3>";
        echo "<p class='card__task-description'>" . $fila['descriptions_tasks'] . "</p>";
        echo "<p class='card__task-date'>" . $fila['finish_dates'] . "</p>";
        echo "</div>";
        echo "<div class='card__task-actions'>";
        echo "<button class='card__action-button' onclick='dispatch({ type: \"SET_UPDATE_TASK\", payload: " . json_encode($fila) . " })'>";
        echo EditTask();
        echo "</button>";
        echo "<button class='card__action-button' onclick='handleDelete(\"" . $fila['id'] . "\")'>";
        echo DeleteTask();
        echo "</button>";
        echo "<button class='card__action-button' onclick='completeTask(\"" . $fila['id'] . "\")'>";
        echo $fila['isCompleted'] ? Taskcomplete() : Taskpending();
        echo "</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No hay tareas disponibles.";
}

$conn->close();
?>
