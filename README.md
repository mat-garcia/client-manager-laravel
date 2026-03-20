# CManager

Sistema de gerenciamento de clientes desenvolvido com Laravel 12 e PostgreSQL.

## Tecnologias

- Laravel 12
- PostgreSQL 15
- Docker & Docker Compose
- PHP 8.2
- Node.js

## Pré-requisitos

- Docker e Docker Compose

## Instalação e Execução

1. Clone o repositório

```bash
git clone <repository-url>
cd client-manager-laravel
```

2. Inicie os containers

```bash
docker-compose up --build
```

- espere a execucao do build

3. Acesse a aplicação

```
http://localhost:8000
```

Rotas estao protegidas e exigem autenticacao de usuario.

**Credenciais de Acesso**

Email: `admin@admin.com` <br>
Senha: `admin`

## Estrutura do Projeto

- `app/` - Modelos, Controllers, Policies e Validations
- `routes/` - Definição das rotas
- `resources/` - Views Blade e assets (CSS/JS)
- `database/` - Migrations e seeders
- `tests/` - Testes automatizados

## funcionalidade

`/clientes`
Rota principcial onde sera exibido a listagem dos clientes e botoes para gerenciamento

Aqui voce pode:

- Visualizar todos os clientes.
- incluir, editar ou excluir um cliente.

o `formulario` de clientes possui auto preenchimento de nos campos `rua`, `bairro` e `cidade` ao digitar o `cep`

Voce **não** pode incluir Clientes com mesmo endereco de Email.

## Licença

MIT
