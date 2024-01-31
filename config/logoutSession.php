<?php
session_start();
session_destroy();
header('Location: /task/app/Views/pages/login/login.php'); 
exit;
?>
