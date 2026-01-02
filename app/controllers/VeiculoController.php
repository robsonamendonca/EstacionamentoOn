<?php
require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../models/Veiculo.php';
require_once __DIR__ . '/../services/EstacionamentoService.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header('Location: /login.php');
    exit;
}

$veiculoModel = new Veiculo($pdo);
$service = new EstacionamentoService();
$view = '';

// Simple routing based on file inclusion or query param
// We assume this file is included by public/entrada.php, public/saida.php, public/dashboard.php
// But "MVC enxuta" usually has the controller handle the request.
// Let's check how we are calling this. 
// If public/dashboard.php requires this file, then this file executes?
// Usually controllers are classes.
// I'll make it a class-based controller and instantiate it in the public files.

class VeiculoController {
    private $veiculoModel;
    private $service;

    public function __construct($pdo) {
        $this->veiculoModel = new Veiculo($pdo);
        $this->service = new EstacionamentoService();
    }

    public function dashboard() {
        $veiculos = $this->veiculoModel->listarEstacionados();
        require __DIR__ . '/../views/dashboard.php';
    }

    public function entrada() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $placa = $_POST['placa'];
            $modelo = $_POST['modelo'];
            $cor = $_POST['cor'];
            
            if ($this->veiculoModel->cadastrar($placa, $modelo, $cor)) {
                header('Location: /dashboard.php');
                exit;
            } else {
                $erro = "Erro ao cadastrar veículo.";
                require __DIR__ . '/../views/entrada.php';
            }
        } else {
            require __DIR__ . '/../views/entrada.php';
        }
    }

    public function saida() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /dashboard.php');
            exit;
        }

        $veiculo = $this->veiculoModel->buscarPorId($id);
        
        if (!$veiculo) {
            header('Location: /dashboard.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Confirmar saída
            // Recalcular para garantir
            $agora = date('Y-m-d H:i:s');
            // Mocking or using POST data if strictly valid? 
            // Better to calculate server-side right now to avoid manipulation.
            $calculo = $this->service->calcularValor($veiculo->DataEntrada, $agora);
            
            if ($this->veiculoModel->finalizar($id, $agora, $calculo['valor'])) {
                header('Location: /dashboard.php');
                exit;
            } else {
                $erro = "Erro ao registrar saída.";
            }

        }
        
        // Show preview
        $agora = date('Y-m-d H:i:s');
        $calculo = $this->service->calcularValor($veiculo->DataEntrada, $agora);
        
        require __DIR__ . '/../views/saida.php';
    }
}
