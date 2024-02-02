<?php
// Incluir el archivo de conexión
include('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = isset($_POST['taskId']) ? $_POST['taskId'] : null;
    $newName = isset($_POST['newName']) ? $_POST['newName'] : null;
    $newDescription = isset($_POST['newDescription']) ? $_POST['newDescription'] : null;
    $newFinishDate = isset($_POST['newFinishDate']) ? $_POST['newFinishDate'] : null;

    // Verificar si alguna variable es nula o vacía antes de construir la consulta SQL
    if ($taskId !== null && $newName !== null && $newDescription !== null && $newFinishDate !== null) {
        // Construir la consulta SQL
        $sql = "UPDATE tasks SET names_tasks = '$newName', descriptions_tasks = '$newDescription', finish_dates = '$newFinishDate' WHERE id = $taskId";

        // Imprimir la consulta SQL (puedes comentar o eliminar esta línea en producción)
        echo "Consulta SQL: $sql";

        // Ejecutar la consulta SQL
        if (mysqli_query($conn, $sql)) {
            // Redirigir a la página de tareas
            header("Location: /task/app/Views/pages/task/tasks.php");
            exit;
        } else {
            // Redirigir con un mensaje de error en la consulta
            header('Location: /task/app/Views/pages/task/tasks.php?error=sql_error');
            exit;
        }
    } else {
        // Redirigir con un mensaje de error por datos faltantes
        header('Location: /task/app/Views/pages/task/tasks.php?error=missing_data');
        exit;
    }
} else {
    // Redirigir con un mensaje de error para solicitudes no válidas
    header('Location: /task/app/Views/pages/task/tasks.php?error=invalid_request');
    exit;
}

// Cerrar la conexión
mysqli_close($conn);
?>
