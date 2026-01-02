<?php

class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function buscarPorUsuario($usuario) {
        $sql = "SELECT * FROM Usuarios WHERE Usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario]);
        return $stmt->fetch();
    }
}
