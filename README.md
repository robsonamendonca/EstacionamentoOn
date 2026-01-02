# EstacionamentoOn

Sistema simples para controle de estacionamento, desenvolvido em PHP puro e SQLite.

## 🚀 Tecnologias

- **PHP** (Sem frameworks)
- **SQLite** (Banco de dados local)
- **HTML/CSS** (Frontend simples e responsivo)

## 📋 Funcionalidades

- **Login/Logout**: Acesso restrito via sessão.
- **Dashboard**: Visualização rápida de veículos estacionados.
- **Entrada**: Registro rápido de veículos (Placa, Modelo, Cor).
- **Saída**: Cálculo automático do valor com base no tempo de permanência.
  - Até 2 horas: R$ 18,00
  - Hora adicional: + R$ 5,00
- **Histórico**: Registro de data de entrada, saída e valor pago.

## ⚙️ Como Rodar

1. **Pré-requisitos**:
   - PHP 7.4 ou superior com extensão `pdo_sqlite` habilitada.
   - Permissão de escrita na pasta `app/database`.

2. **Instalação**:
   - O banco de dados serÃ¡ criado automaticamente ao rodar o script PHP abaixo.
     ```bash
     php setup_database.php
     ```

3. **Execução**:
   Inicie o servidor embutido do PHP na pasta `public`:
   ```bash
   cd public
   php -S localhost:8000
   ```

4. **Acesso**:
   - Abra `http://localhost:8000` no navegador.
   - **Usuário**: admin
   - **Senha**: admin

## 📂 Estrutura

- `/app`: Lógica do sistema (Controllers, Models, Services).
- `/public`: Ponto de entrada web accessível.
- `/assets`: Arquivos estáticos (CSS, JS).

## ⚠️ Notas Importantes

- A aplicação foi desenvolvida para rodar em hospedagem compartilhada.

