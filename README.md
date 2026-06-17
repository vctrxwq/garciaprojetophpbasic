# Sistema de Gerenciamento de Tarefas e Controle de Motos

Este projeto é uma aplicação web desenvolvida em PHP que integra um sistema de autenticação de usuários, uma lista de tarefas (Dashboard) e um módulo customizado para o gerenciamento (CRUD) de motocicletas. 

O projeto foi construído seguindo rigorosamente a arquitetura **MVC (Model-View-Controller)** e aplicando boas práticas de Engenharia de Software com Padrões de Projetos.

---

## 🚀 Requisitos Implementados

- **Cadastro e Login de Usuários**: Sistema de autenticação com persistência em banco de dados MySQL.
- **Segurança**: Armazenamento seguro de senhas utilizando criptografia de ponta com o algoritmo **bcrypt** (`password_hash`).
- **Dashboard (Página Inicial)**: Exibição dinâmica da lista de tarefas vinculada exclusivamente ao usuário autenticado.
- **CRUD de Motos**: Módulo completo para inserção, seleção, atualização e remoção de registros de motocicletas.

---

## 🏗️ Arquitetura e Padrões de Projetos

### 1. Padrão Arquitetural MVC
O sistema foi estruturado para garantir a separação de conceitos e responsabilidades:
- **Models (`src/models/`)**: Responsáveis pela lógica de negócios e estruturação dos dados (`user.php`, `moto.php`).
- **Views (`src/views/`)**: Camada de apresentação que interage diretamente com o usuário (`login.php`, `dashboard.php`, `moto_list.php`).
- **Controllers (`src/controllers/`)**: Intermediários que recebem as requisições das Views, acionam os Models e determinam a resposta do sistema (`AuthController.php`, `MotoController.php`).

### 2. Design Patterns Utilizados
Para atender aos requisitos de arquitetura de software, foram implementados dois padrões clássicos:
- **Singleton**: Aplicado na classe de conexão com o banco de dados (`config/database.php`). Garante que a aplicação abra e reutilize apenas uma única instância de conexão PDO com o MySQL durante todo o ciclo de vida da requisição, otimizando o uso de recursos de memória.
- **DAO (Data Access Object)**: Implementado nas classes `tarefadao.php` e `motodao.php`. Esse padrão encapsula todas as operações de banco de dados (inserção, consultas, deleções), isolando completamente a lógica SQL do restante da aplicação e dos Controllers.

---

## 📁 Estrutura de Pastas do Projeto

```text
├── config/             # Configurações de banco de dados e persistência
├── controllers/        # Controladores com as regras de negócio
├── models/             # Classes de dados e objetos de acesso a dados (DAO)
├── views/              # Telas e arquivos de interface HTML/PHP
├── prints/             # Evidências e capturas de tela do sistema em funcionamento
├── index.php           # Ponto de entrada centralizado e gerenciador de rotas
└── README.md           # Documentação do projeto