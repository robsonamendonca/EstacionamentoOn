\# ESTACIONAMENTO ON


## 1️⃣ Decisão Estratégica Correta (muito importante)



Com essas regras, a \*\*melhor escolha técnica\*\* é:



👉 \*\*Aplicação Web em PHP puro (ou PHP + micro-framework próprio)\*\*

👉 \*\*SQLite local via PDO\*\*

👉 \*\*Frontend simples com HTML + CSS + JS vanilla\*\*



\*\*Por quê isso é perfeito:\*\*



\* Roda em \*\*qualquer SO\*\* (Windows, Linux, macOS)

\* Roda em \*\*qualquer hospedagem compartilhada\*\*

\* Zero dependência de Node, Docker, serviços externos

\* Fácil de entregar, validar e evoluir

\* Ideal para depois vender como \*\*licença + instalação\*\*



Evite Laravel neste desafio — ele \*\*complica o deploy\*\* em hospedagem compartilhada e foge da proposta de simplicidade.



---



\## 2️⃣ Arquitetura Recomendada (Simples, mas Profissional)



Use uma \*\*arquitetura MVC enxuta\*\*, sem framework:



```

/public

&nbsp; index.php

&nbsp; login.php

&nbsp; logout.php

/assets

&nbsp; /css

&nbsp; /js

/app

&nbsp; /controllers

&nbsp;   AuthController.php

&nbsp;   VeiculoController.php

&nbsp; /models

&nbsp;   Veiculo.php

&nbsp;   Usuario.php

&nbsp; /services

&nbsp;   EstacionamentoService.php

&nbsp; /database

&nbsp;   database.sqlite

&nbsp;   connection.php

&nbsp; /views

&nbsp;   login.php

&nbsp;   dashboard.php

&nbsp;   entrada.php

&nbsp;   saida.php

```



👉 Isso já demonstra \*\*organização de produto\*\*, não só desafio.



---



\## 3️⃣ Banco de Dados (SQLite)



Use exatamente o que o desafio pede, mas com \*\*pequenas melhorias internas\*\* (sem quebrar validação):



```sql

CREATE TABLE Veiculos (

&nbsp;   Id INTEGER PRIMARY KEY AUTOINCREMENT,

&nbsp;   Placa TEXT NOT NULL,

&nbsp;   Modelo TEXT,

&nbsp;   Cor TEXT,

&nbsp;   DataEntrada DATETIME NOT NULL,

&nbsp;   DataSaida DATETIME,

&nbsp;   ValorPago DECIMAL(10,2),

&nbsp;   Status TEXT NOT NULL

);



CREATE TABLE Usuarios (

&nbsp;   Id INTEGER PRIMARY KEY AUTOINCREMENT,

&nbsp;   Usuario TEXT NOT NULL,

&nbsp;   Senha TEXT NOT NULL

);

```



💡 Senha com `password\_hash()` — simples e profissional.



---



\## 4️⃣ Regra de Negócio (Coração do Sistema)



Centralize tudo em um \*\*Service\*\*, nunca espalhe lógica em controller.



\### Cálculo de Permanência



\* Entrada → `DateTime`

\* Saída → `DateTime`

\* Diferença em horas (arredondar para cima)



```php

$intervalo = $entrada->diff($saida);

$horas = ceil($intervalo->h + ($intervalo->i / 60));

```



\### Regra de Preço



```

Até 2 horas → R$ 18,00

A partir da 3ª → + R$ 5,00 por hora

```



```php

if ($horas <= 2) {

&nbsp;   $valor = 18;

} else {

&nbsp;   $valor = 18 + (($horas - 2) \* 5);

}

```



👉 Simples, claro, auditável e validável pelo desafio.



---



\## 5️⃣ Fluxos Obrigatórios (do ponto de vista do usuário)



\### Login



\* Usuário + senha

\* Sessão PHP



\### Entrada de Veículo



\* Cadastro rápido (placa, modelo, cor)

\* DataEntrada automática (`NOW()`)

\* Status = `ESTACIONADO`



\### Dashboard



\* Lista de veículos estacionados

\* Botão “Registrar Saída”



\### Saída



\* Calcula permanência

\* Calcula valor

\* Atualiza:



&nbsp; \* DataSaida

&nbsp; \* ValorPago

&nbsp; \* Status = `FINALIZADO`



---



\## 6️⃣ Interface (o suficiente para passar e vender)



Nada sofisticado — foque em \*\*clareza\*\*:



\* Layout responsivo simples (Flexbox)

\* Cores neutras

\* Botões claros

\* Status visual (badge verde/vermelho)



👉 Isso atende o desafio \*\*e já serve como MVP comercial\*\*.



---



\## 7️⃣ Deploy em Hospedagem Compartilhada



Perfeito para PHP + SQLite:



1\. Subir arquivos via FTP

2\. Garantir permissão de escrita no `.sqlite`

3\. Ajustar path do banco:



&nbsp;  ```php

&nbsp;  $pdo = new PDO("sqlite:" . \_\_DIR\_\_ . "/database.sqlite");

&nbsp;  ```

4\. Pronto. Zero configuração extra.



---



\## 8️⃣ Como Isso Vira Produto Depois (importante)



Sem mudar quase nada, você pode:



\* Vender como \*\*licença anual\*\*

\* Alugar como \*\*instalação mensal\*\*

\* Criar versões:



&nbsp; \* Free (local)

&nbsp; \* Pro (backup, relatórios)

&nbsp; \* White-label



Basta depois adicionar:



\* Backup automático do SQLite

\* Exportação CSV/PDF

\* Multiusuário

\* Configuração de preço



👉 O desafio vira \*\*fundação de SaaS local / produto on-premise\*\*.



---



