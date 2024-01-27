<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: /task/app/index.php");
    exit;
}
?>
