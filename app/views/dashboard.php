<?php include __DIR__ . '/header.php'; ?>

<div class="dashboard-container">
    <h2>Veículos Estacionados</h2>
    <div class="actions">
        <a href="/entrada.php" class="btn btn-success">Nova Entrada</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Entrada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($veiculos)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhum veículo estacionado.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($veiculos as $v): ?>
                <tr>
                    <td><?php echo htmlspecialchars($v->Placa); ?></td>
                    <td><?php echo htmlspecialchars($v->Modelo); ?></td>
                    <td><?php echo htmlspecialchars($v->Cor); ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($v->DataEntrada)); ?></td>
                    <td>
                        <a href="/saida.php?id=<?php echo $v->Id; ?>" class="btn btn-outline-danger btn-sm">Saída</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/footer.php'; ?>
