<?php
include('../../../../../task/app/Views/include/icons/icons.php');
include('../../../../config/database.php');
include('../../../../../task/config/functions.php');

// Obtén el userId del usuario actual, puedes obtenerlo de tu sistema de autenticación
$userId = obtenerUserId(); // Esta función debería obtener el ID del usuario autenticado

// Consulta SQL para obtener las tareas del usuario
$sql = "SELECT * FROM tasks WHERE userId = $userId";
$resultado = $conn->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Imprime las tareas en un formato que desees
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<div class='card__task " . ($fila['is_completed'] ? 'completed' : 'pending') . "' key='" . $fila['id'] . "'>";
        echo "<div class='card__task-info'>";
        echo "<h3 class='card__task-name'>" . $fila['names_tasks'] . "</h3>";
        echo "<p class='card__task-description'>" . $fila['descriptions_tasks'] . "</p>";
        echo "<p class='card__task-date'>" . $fila['finish_dates'] . "</p>";
        echo "</div>";

        // Boton para Editar la Tarea
        echo "<div class='card__task-actions'>";
        echo "<a href='/task/app/Views/include/editTask/edit_task.php?id=" . $fila['id'] . "' class='card__action-button'>";
        echo "<input type='hidden' name='task_id' value='" . $fila['id'] . "'>";
        echo EditTask();
        echo "</a>";


        // Boton para eliminar la Tarea
        echo "<input type='hidden' name='task_id' value='" . $fila['id'] . "'>";
        echo "<button type='submit' class='card__action-button'>";
        echo DeleteTask();
        echo "</button>";
        // Botón para completar la tarea
        echo "<form method='post' action='../../../../api/completed_task.php'>";
        echo "<input type='hidden' name='task_id' value='" . $fila['id'] . "'>";
        echo "<button type='submit' class='card__action-button'>";
        echo $fila['is_completed'] ? Taskpending() : Taskcomplete();
        echo "</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No hay tareas disponibles.";
}

$conn->close();
