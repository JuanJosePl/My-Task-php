<?php
include('../../../../config/database.php');

// Obtén la ID de la tarea del parámetro "id" en la URL
$taskId = isset($_GET['id']) ? $_GET['id'] : null;

if ($taskId) {
    // Consulta SQL para obtener la información de la tarea
    $sql = "SELECT * FROM tasks WHERE id = $taskId";
    $resultado = $conn->query($sql);

    // Verifica si se obtuvieron resultados
    if ($resultado && $resultado->num_rows > 0) {
        // Obtén la primera fila (puedes ajustar esto según tus necesidades)
        $fila = $resultado->fetch_assoc();
    } else {
        // Maneja el caso donde no se encontró la tarea o hubo un error
        echo "No se encontró la tarea o hubo un error en la consulta.";
        // Puedes redirigir o manejar de otra manera según tus necesidades
        exit;
    }
} else {
    echo "No se proporcionó una ID de tarea válida.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-task</title>
    <link rel="stylesheet" href="editTask.css">
</head>
<body>

<div class="form-container">
    <form method='POST' action='/task/api/update_task.php'>
        <input type='hidden' name='taskId' value='<?php echo $fila['id']; ?>' />
        <label class='form-label' for='newName'>Nuevo Nombre:</label>
        <input class='form-input' type='text' name='newName' />
        <label class='form-label' for='newDescription'>Nueva Descripción:</label>
        <textarea class='form-textarea' name='newDescription'></textarea>
        <label class='form-label' for='newFinishDate'>Nueva Fecha de Finalización:</label>
        <input class='form-input' type='date' name='newFinishDate' />
        <!-- Agrega campos para la descripción y la fecha de finalización -->
        <button class='form-button' type='submit'>Guardar Cambios</button>
    </form>
</div>

</body>
</html>

