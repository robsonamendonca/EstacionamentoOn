<?php
require __DIR__ . '/app/database/connection.php';

try {
    // Tabela Usuarios
    $pdo->exec("CREATE TABLE IF NOT EXISTS Usuarios (
        Id INTEGER PRIMARY KEY AUTOINCREMENT,
        Usuario TEXT NOT NULL,
        Senha TEXT NOT NULL
    )");

    // Tabela Veiculos
    $pdo->exec("CREATE TABLE IF NOT EXISTS Veiculos (
        Id INTEGER PRIMARY KEY AUTOINCREMENT,
        Placa TEXT NOT NULL,
        Modelo TEXT,
        Cor TEXT,
        DataEntrada DATETIME NOT NULL,
        DataSaida DATETIME,
        ValorPago DECIMAL(10,2),
        Status TEXT NOT NULL
    )");

    // Usuário Admin Padrão
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM Usuarios WHERE Usuario = ?");
    $stmt->execute(['admin']);
    if ($stmt->fetchColumn() == 0) {
        $senhaHash = password_hash('admin', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO Usuarios (Usuario, Senha) VALUES (?, ?)");
        $stmt->execute(['admin', $senhaHash]);
        echo "Usuário admin criado com sucesso.\n";
    } else {
        echo "Usuário admin já existe.\n";
    }

    echo "Tabelas criadas com sucesso.\n";

} catch (PDOException $e) {
    echo "Erro ao configurar banco: " . $e->getMessage() . "\n";
}
