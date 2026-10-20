# EventHub - Sistema de Gestão de Eventos e Inscrições

Aplicação web desenvolvida em Laravel para centralizar o gerenciamento de eventos, controle de vagas e inscrições de participantes.

## 🛠️ Tecnologias Utilizadas

* **Linguagem / Framework:** PHP 8.x / Laravel 11.x

* **Banco de Dados:** MySQL

* **Interface:** Blade Templates + Bootstrap 5

* **Testes Automatizados:** PHPUnit / Pest

## 👤 Usuários para Teste (Credenciais de Demonstração)

### 🔴 Administrador

* **E-mail:** `admin@eventhub.test`

* **Senha:** `password`

### 🔵 Usuário Comum

* **E-mail:** `usuario@eventhub.test`

* **Senha:** `password`

## 🚀 Como Executar o Projeto Localmente

1. **Clonar o repositório:**

   ```
   git clone https://github.com/SEU_USUARIO/eventhub.git
   cd eventhub
   
   ```

2. **Instalar as dependências do PHP (Composer):**

   ```
   composer install
   
   ```

3. **Configurar o arquivo de ambiente:**

   ```
   cp .env.example .env
   php artisan key:generate
   
   ```

4. **Configurar o Banco de Dados MySQL:**

   * Configure as variáveis de ambiente `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` no arquivo `.env`.

   * Execute as migrações e popule o banco de dados com os dados padrão:

     ```
     php artisan migrate:fresh --seed
     
     ```

5. **Iniciar o servidor de desenvolvimento:**

   ```
   php artisan serve
   
   ```

   Acesse a aplicação via <http://127.0.0.1:8000>.