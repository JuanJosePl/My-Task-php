<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
  
    $taskId = $_POST['task_id'];

    include('../config/database.php');

    $consulta = "SELECT is_completed FROM tasks WHERE id = $taskId";
    $resultadoConsulta = $conn->query($consulta);

    if ($resultadoConsulta->num_rows == 1) {
        $fila = $resultadoConsulta->fetch_assoc();
        $estadoActual = $fila['is_completed'];

        // Invierte el estado de completado (0 a 1, 1 a 0)
        $nuevoEstado = $estadoActual == 0 ? 1 : 0;

        // Actualiza el estado en la base de datos
        $sql = "UPDATE tasks SET is_completed = $nuevoEstado WHERE id = $taskId";
        $resultado = $conn->query($sql);

        if ($resultado) {
            // Redirige a la página de tareas o realiza otras acciones
            header("Location: /task/app/Views/pages/task/tasks.php");
            exit;
        } else {
            echo "Error al actualizar el estado de completado";
        }
    } else {
        echo "No se pudo obtener la información de la tarea";
    }

    $conn->close();
} else {
    echo "ID de tarea no válido";
}
?>
