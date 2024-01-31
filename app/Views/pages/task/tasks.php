<?php
include('../../../../config/session_config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-Task</title>
    <link rel="stylesheet" href="../../../../../task/app/index.css">
</head>

<body>

    <?php include('../../include/navbar/navbar.php'); ?>

    <div class='containerAll_Task'>
        <?php include('../../include/taskForm/taskForm.php') ?>
    </div>

    <div class="card">
        <?php include('../../include/taskList/taskList.php') ?>
    </div>

    <footer class="footer" id="<?php echo $contextTheme; ?>">
        <?php include('../../include/footer/footer.php'); ?>
    </footer>
 

</body>

</html>
