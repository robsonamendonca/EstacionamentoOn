<?php
require_once __DIR__ . '/../app/controllers/AuthController.php';

// Check if we have $pdo available... index.php doesn't include it globally but connection.php is required by AuthController.
// However AuthController requires connection.php, which defines $pdo.
// But $pdo is local scope in connection.php unless global.
// connection.php: $pdo = new PDO(...) 
// files requiring it will have access to $pdo variable if included in current scope.

// Instantiate Controller
$auth = new AuthController($pdo);
$auth->logout();
