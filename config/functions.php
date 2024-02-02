<?php


function obtenerUserId() {
    if (isset($_SESSION["usuario_id"])) {
        return $_SESSION["usuario_id"];
    } else {
        exit();
    }
}

