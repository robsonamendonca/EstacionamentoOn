<?php
require __DIR__ . '/app/database/connection.php';

try {
    echo "Testing connection...\n";
    $stmt = $pdo->query("SELECT * FROM Usuarios");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Connection successful!\n";
    echo "Users found: " . count($users) . "\n";
    foreach ($users as $user) {
        echo "- " . $user['Usuario'] . "\n";
    }

} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
    exit(1);
}
