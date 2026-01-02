<?php
require_once __DIR__ . '/../app/controllers/VeiculoController.php';

// Instantiate and Run Controller
$controller = new VeiculoController($pdo);
$controller->saida();
