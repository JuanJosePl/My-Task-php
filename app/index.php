<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../task/app/index.css">
    <?php include('../config/database.php'); ?>
    <title>My-Task</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" id="<?php echo $contextTheme; ?>">
        <?php include('Views/include/navbar/navbar.php'); ?>
    </nav>

    <!-- Home -->
    <div class="home">
        <?php include('Views/pages/home/home.php'); ?>
    </div>
    <!-- footer -->
    <footer class="footer" id="<?php echo $contextTheme; ?>">
        <?php include('Views/include/footer/footer.php'); ?>
    </footer>

</body>

</html>