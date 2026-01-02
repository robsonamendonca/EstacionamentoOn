<?php include __DIR__ . '/header.php'; ?>

<div class="form-container">
    <h2>Entrada de Veículo</h2>
    <?php if (isset($erro)): ?>
        <p style="color: red; text-align: center;"><?php echo $erro; ?></p>
    <?php endif; ?>
    
    <form action="/entrada.php" method="POST">
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" placeholder="ABC-1234" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" placeholder="Ex: Gol 1.0" required>
        </div>
        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" id="cor" name="cor" placeholder="Ex: Prata" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Registrar Entrada</button>
    </form>
    
    <div style="margin-top: 1rem; text-align: center;">
        <a href="/dashboard.php" style="color: #666; text-decoration: none;">Voltar</a>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
