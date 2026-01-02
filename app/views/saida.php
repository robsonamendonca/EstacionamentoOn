<?php include __DIR__ . '/header.php'; ?>

<div class="card">
    <h2>Saída de Veículo</h2>
    
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <div class="info">
        <p><strong>Placa:</strong> <?php echo htmlspecialchars($veiculo->Placa); ?></p>
        <p><strong>Modelo:</strong> <?php echo htmlspecialchars($veiculo->Modelo); ?> - <?php echo htmlspecialchars($veiculo->Cor); ?></p>
        <p><strong>Entrada:</strong> <?php echo date('d/m/Y H:i', strtotime($veiculo->DataEntrada)); ?></p>
        <p><strong>Saída (Estimada):</strong> <?php echo date('d/m/Y H:i', strtotime($agora)); ?></p>
        <p><strong>Tempo Total:</strong> <?php echo $calculo['horas']; ?> hora(s)</p>
    </div>
    
    <div class="value">
        R$ <?php echo $calculo['valor']; ?>
    </div>
    
    <form action="/saida.php?id=<?php echo $veiculo->Id; ?>" method="POST">
        <!-- Hidden input to confirm action -->
        <input type="hidden" name="confirmar" value="1">
        <button type="submit" class="btn btn-danger" style="width: 100%;">Finalizar e Cobrar</button>
    </form>
    
    <div style="margin-top: 1rem;">
        <a href="/dashboard.php" style="color: #666; text-decoration: none;">Cancelar</a>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
