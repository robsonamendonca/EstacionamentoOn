<?php
require_once __DIR__ . '/../app/database/connection.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

session_start();

// Se já estiver logado, redireciona
if (isset($_SESSION['usuario_id'])) {
    header('Location: /dashboard.php'); // Or index.php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    // Instantiate Controller
    // Note: $pdo is available from connection.php
    $auth = new AuthController($pdo);
    
    if ($auth->login($usuario, $senha)) {
        header('Location: /index.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}

// Render View
require __DIR__ . '/../app/views/login.php';
