# 🛠️ CR Group Agenda CRUD
A aplicação de agenda foi desenvolvida utilizando PHP 5.6 com acesso ao banco de dados MySQL via PDO, seguindo boas práticas de organização e segurança, como o uso de prepared statements para evitar SQL Injection.

O sistema contempla as funcionalidades básicas de CRUD, permitindo o cadastro, listagem, edição e exclusão de eventos. A interface foi construída HTML/CSS e JavaScript.

A estrutura do projeto foi organizada de forma simples e objetiva, separando a camada de conexão com o banco de dados, modelagem e interface, facilitando a manutenção e possíveis evoluções futuras.


## 🚀 Tecnologias Utilizadas
- Apache 2 (servidor http)
- PHP 5.6 (sem frameworks)
- PDO (PHP Data Objects)
- MySQL 5.7

## 📌 1. Instalação do Projeto
Siga os passos abaixo para instalar e configurar a api.

### 🔹 1.1 Clonar o Repositório
```sh
git clone https://github.com/rodrigoaguerra/cr-group.git
```
### 🔹 1.2 Navegar para pasta do projeto
```sh
cd cr-group
```

### 🔹 1.3 Configurar o Banco de Dados
2. **Copie o arquivo de configuração**
```sh
cp config-example.php config.php
```
3. **Edite o arquivo** 'config.php' e configure a conexão com o banco:
```php
// Configurações da aplicação
define( 'APP_ENV', 'development' );

// Configuração do banco de dados
define( 'DB_HOST', 'mysql57');
define( 'DB_PORT', '3306');
define( 'DB_NAME', 'cr_group' );
define( 'DB_USER', 'cr_group' );
define( 'DB_PASSWORD', '123456@@' );
```

### 🔹 1.4 Rodar o Docker  
```sh
docker compose up
```
O projeto estará disponível em: http://localhost:8080

## 📌 3. Funcionalidades
- ✅ CRUD de agendamento 

## 📌 3. Créditos
Desenvolvido por **Rodrigo Alves Guerra 🖥️🚀**

## 📌 4. Demo 
  - [Aplicação](https://cr.rodrigoalvesguerra.com.br)