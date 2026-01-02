<?php

class EstacionamentoService {
    
    public function calcularValor($dataEntrada, $dataSaida) {
        $entrada = new DateTime($dataEntrada);
        $saida = new DateTime($dataSaida);
        
        $intervalo = $entrada->diff($saida);
        
        // Calcular horas totais (arredondar para cima)
        // Se ficar 1h01m, conta 2h.
        $horas = $intervalo->h + ($intervalo->days * 24);
        if ($intervalo->i > 0) {
            $horas++;
        }
        
        // Regra:
        // Até 2 horas -> R$ 18,00
        // A partir da 3ª -> + R$ 5,00 por hora
        
        if ($horas <= 2) {
            $valor = 18.00;
        } else {
            $valor = 18.00 + (($horas - 2) * 5.00);
        }
        
        return [
            'horas' => $horas,
            'valor' => number_format($valor, 2, '.', '')
        ];
    }
}
