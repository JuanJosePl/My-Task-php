<?php
require_once('../../../../config/database.php');

$usuario = ['names' => 'Invitado']; // Valor predeterminado si no se puede obtener el nombre del usuario

if (isset($userId) && !empty($userId)) {
    $sql = "SELECT `names` FROM `accounts` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado) {
            $usuario = mysqli_fetch_assoc($resultado) ?? $usuario;
        } else {
        }

        mysqli_stmt_close($stmt);
    } else {
        
    }
}
?>

<div class='container__task__form_Task'>
    <form method='POST' action='../../../../api/create_task.php'>
        <div class='container__form_Task'>
            <h2 class='container__title__form_Task'>Crear Tarea</h2>
            <div class="iconoName">
                <img src='../../../../../task/public/icons/icono-saludo.png' class='imgSaludo' alt='' />
                <p class='namePerson'>Hola, <?php echo htmlspecialchars($usuario['names']); ?>!</p>
            </div>
            <div class='list__buttons__form_Task'>
                <div class='list__buttons__div_Task'>
                    <input id='name' name='name' class='inputs__form_Task' type='text' placeholder='Nombre de tu tarea' required value='<?php echo isset($_POST['name']) ? $_POST['name'] : (isset($state['taskToUpdate']) ? $state['taskToUpdate']['name'] : ''); ?>' />
                    <textarea id='description' name='description' class='description inputs__form_Task' rows='10' placeholder='Descripción para tu tarea' required><?php echo isset($_POST['description']) ? $_POST['description'] : (isset($state['taskToUpdate']) ? $state['taskToUpdate']['description'] : ''); ?></textarea>
                    <label class='label__fecha__finalizacion_Task' for='finishDate'>Fecha de finalización
                        <input id='finishDate' name='finishDate' class='inputsform date' type='date' required value='<?php echo isset($_POST['finishDate']) ? $_POST['finishDate'] : (isset($state['taskToUpdate']) ? $state['taskToUpdate']['finishDate'] : ''); ?>' />
                    </label>
                    <input type='hidden' id='userId' name='userId' value='<?php echo $userId; ?>' />
                </div>
            </div>
            <button type='submit' class='Register_Button_Task'>Crear Tarea</button>
        </div>
    </form>
</div>