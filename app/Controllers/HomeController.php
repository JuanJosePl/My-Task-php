<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        // Aquí puedes incluir la lógica necesaria antes de cargar la vista

        include '../app/Views/home.php';
    }
}
?>
