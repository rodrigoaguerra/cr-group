# 🛠️ CR Group Agenda CRUD

Este projeto consiste em uma API RESTful desenvolvida em PHP puro, utilizando PDO para acesso ao banco de dados MySQL.

A aplicação tem como objetivo fornecer o ranking de um determinado movimento com base nos dados armazenados no banco, retornando as informações em formato JSON.

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
define( 'DB_PASSWORD', '123456@@ );
```

### 🔹 1.4 Rodar o Docker  
```sh
doker compose up
```
O projeto estará disponível em: http://localhost:8080

## 📌 3. Funcionalidades
- ✅ CRUD de agendamento 

## 📌 3. Créditos
Desenvolvido por **Rodrigo Alves Guerra 🖥️🚀**

## 📌 4. Demo 
  - [Aplicação](https://cr.rodrigoalvesguerra.com.br)