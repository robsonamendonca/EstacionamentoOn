\# PHP + SQLite + hospedagem compartilhada



\## 🔹 FASE 1 — Preparação do Projeto (Fundação)



\### 1️⃣ Criar o repositório (fork)



\* Fork do repositório oficial HDEV

\* Clonar localmente

\* Criar `.gitignore` básico (cache, logs, sqlite se quiser gerar em runtime)



\### 2️⃣ Estrutura de pastas



Criar a estrutura base:



```

/public

/app

/assets

/app/database

```



👉 Não escreva lógica ainda. Só estrutura.



---



\## 🔹 FASE 2 — Banco de Dados (antes de qualquer tela)



\### 3️⃣ Criar o SQLite



\* Criar arquivo `database.sqlite`

\* Criar script SQL inicial

\* Rodar criação das tabelas



\### 4️⃣ Criar conexão PDO



Arquivo único:



```

/app/database/connection.php

```



\* Conexão PDO

\* Tratamento básico de erro

\* Charset padrão



⚠️ \*\*Não seguir se o banco não estiver funcionando.\*\*



---



\## 🔹 FASE 3 — Autenticação (controle de acesso)



\### 5️⃣ Criar tabela de usuários



\* Usuário padrão (admin / admin)

\* Senha com `password\_hash`



\### 6️⃣ Criar login funcional



\* Tela de login

\* Validação

\* Sessão PHP



\### 7️⃣ Proteger rotas



\* Verificação de sessão

\* Redirecionamento automático



👉 Só avance quando login estiver 100% funcional.



---



\## 🔹 FASE 4 — Modelo e Regras de Negócio



\### 8️⃣ Criar Model Veículo



Arquivo:



```

/app/models/Veiculo.php

```



Funções:



\* cadastrar

\* listar estacionados

\* buscar por ID

\* finalizar



\### 9️⃣ Criar Service de Estacionamento



Arquivo:



```

/app/services/EstacionamentoService.php

```



Responsável por:



\* cálculo de horas

\* cálculo de valor

\* regra de negócio



👉 \*\*Nenhuma regra em controller.\*\*



---



\## 🔹 FASE 5 — Entrada de Veículos



\### 🔟 Tela de entrada



\* Formulário simples

\* Placa, modelo, cor



\### 1️⃣1️⃣ Controller de entrada



\* Captura dados

\* Chama Model

\* Salva data/hora automática

\* Status = `ESTACIONADO`



\### 1️⃣2️⃣ Testar persistência



\* Verificar banco manualmente

\* Garantir que data/hora estão corretas



---



\## 🔹 FASE 6 — Dashboard (visão central)



\### 1️⃣3️⃣ Criar dashboard



\* Listar veículos estacionados

\* Mostrar placa, horário, status

\* Botão “Registrar Saída”



\### 1️⃣4️⃣ Atualização dinâmica simples



\* Reload manual

\* Sem AJAX (opcional)



---



\## 🔹 FASE 7 — Saída de Veículo (parte mais importante)



\### 1️⃣5️⃣ Tela de saída



\* Mostrar dados do veículo

\* Mostrar tempo calculado

\* Mostrar valor a pagar



\### 1️⃣6️⃣ Controller de saída



\* Calcula permanência

\* Calcula valor

\* Atualiza banco

\* Status = `FINALIZADO`



\### 1️⃣7️⃣ Testar todos os cenários



\* < 2h

\* 2h exatas

\* > 2h

\* Horas quebradas



👉 \*\*Essa fase não pode ter erro.\*\*



---



\## 🔹 FASE 8 — Interface e Usabilidade



\### 1️⃣8️⃣ Layout básico



\* CSS simples

\* Responsivo

\* Botões claros



\### 1️⃣9️⃣ Status visual



\* Badge verde (estacionado)

\* Badge cinza/vermelho (finalizado)



---



\## 🔹 FASE 9 — Validação Final do Desafio



\### 2️⃣0️⃣ Revisar requisitos



Checklist:



\* SQLite local

\* Login funcional

\* Cadastro de veículo

\* Entrada automática

\* Saída + cálculo

\* Status atualizado



\### 2️⃣1️⃣ README (obrigatório)



Incluir:



\* Tecnologias usadas

\* Como rodar

\* Prints

\* Vídeo demonstrativo



---



\## 🔹 FASE 10 — Deploy em Hospedagem Compartilhada



\### 2️⃣2️⃣ Upload via FTP



\* Subir arquivos

\* Ajustar permissões do SQLite



\### 2️⃣3️⃣ Teste em produção



\* Login

\* Entrada

\* Saída

\* Cálculo

\* Persistência



---



\## 🔹 FASE 11 — Base para Produto (opcional, mas estratégico)



\### 2️⃣4️⃣ Organização final



\* Comentários claros

\* Código legível

\* Separação de responsabilidades



\### 2️⃣5️⃣ Preparar evolução futura



\* Backup SQLite

\* Relatórios

\* Configuração de preço



---



\## ✅ Regra de Ouro



❌ Não comece tela sem banco

❌ Não coloque regra em controller

❌ Não complique com frameworks

✅ Simples, funcional, validável





