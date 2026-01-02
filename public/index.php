<?php
session_start();

// Simples Router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove leading slash if exists for easier matching or keep it
// $uri defaults to '/' on root. 

// Define routes
$routes = [
    '/' => '../app/controllers/AuthController.php',
    '/login' => '../app/controllers/AuthController.php',
    '/logout' => '../app/controllers/AuthController.php',
    '/dashboard' => '../app/controllers/VeiculoController.php',
    '/entrada' => '../app/controllers/VeiculoController.php',
    '/saida' => '../app/controllers/VeiculoController.php',
];

// Determine logic based on URI (Simplification for the challenge)
// Ideally, we would have a proper router, but for "PHP puro", we can include the controller/view directly.

// Check if user is logged in
$isLoggedIn = isset($_SESSION['usuario_id']);

if ($uri === '/' || $uri === '/index.php') {
    if ($isLoggedIn) {
        header('Location: /dashboard');
        exit;
    } else {
        require __DIR__ . '/../app/views/login.php';
    }
} elseif (isset($routes[$uri])) {
    // Basic protection
    if (!$isLoggedIn && $uri !== '/login') {
        header('Location: /');
        exit;
    }
    
    // Using direct mapping based on user request (simple structure)
    // Map URL to Public file or Controller
    // Since we have public/dashboard.php, public/entrada.php etc.
    // We should route /dashboard to public/dashboard.php
    
    // However, the $routes array points to '../app/controllers/...' currently.
    // If we want to use the public files (which init the controller), we should point there.
    // OR we change index.php to require the public file.
    
    // Let's redefine routes to map to public files for simplicity, 
    // because public files handle instantiation.
    
    $publicFile = __DIR__ . $uri . '.php'; // e.g., /dashboard -> /.../public/dashboard.php
    
    if (file_exists($publicFile)) {
        require $publicFile;
    } else {
        // Fallback or error
        http_response_code(404);
        echo "Rota não encontrada ou arquivo ausente: " . htmlspecialchars($uri);
    }

} else {
    // 404
    http_response_code(404);
    echo "Página não encontrada.";
}
