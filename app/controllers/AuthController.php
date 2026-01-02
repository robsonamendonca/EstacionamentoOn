<?php
require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct($pdo) {
        $this->usuarioModel = new Usuario($pdo);
    }

    public function login($usuario, $senha) {
        $user = $this->usuarioModel->buscarPorUsuario($usuario);
        
        if ($user && password_verify($senha, $user->Senha)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['usuario_id'] = $user->Id;
            $_SESSION['usuario_nome'] = $user->Usuario;
            return true;
        }
        
        return false;
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /login.php'); // Or index.php
        exit;
    }
}
