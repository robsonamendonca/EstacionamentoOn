<?php

class Veiculo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($placa, $modelo, $cor) {
        $sql = "INSERT INTO Veiculos (Placa, Modelo, Cor, DataEntrada, Status) VALUES (?, ?, ?, ?, 'ESTACIONADO')";
        $stmt = $this->pdo->prepare($sql);
        $dataEntrada = date('Y-m-d H:i:s');
        return $stmt->execute([$placa, $modelo, $cor, $dataEntrada]);
    }

    public function listarEstacionados() {
        $sql = "SELECT * FROM Veiculos WHERE Status = 'ESTACIONADO' ORDER BY DataEntrada DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM Veiculos WHERE Id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function finalizar($id, $dataSaida, $valorPago) {
        $sql = "UPDATE Veiculos SET DataSaida = ?, ValorPago = ?, Status = 'FINALIZADO' WHERE Id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$dataSaida, $valorPago, $id]);
    }
}
