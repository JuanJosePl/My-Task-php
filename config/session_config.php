<?php
session_start();

if (!(isset($_SESSION["usuario_id"]) && $_SESSION["login"] == $_SESSION["usuario_id"])) {
    header("Location: /task/app/index.php");    
    exit;
}
?>
