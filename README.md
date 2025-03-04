### Instruções para configuração

---

#### Acessar a pasta do projeto

```bash
$ cd teste-api
```

#### Criar o arquivo .env

```bash
$ cp .env.example .env
```

#### Instalar as dependências

```bash
$ composer install
$ npm install
```

#### Configurar as credenciais do banco de dados no .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Executar as migrations

```bash
$ php artisan migrate
```

#### Executar o projeto

```bash
$ php artisan serve
```

#### Acessar a API

-   ##### [http://localhost:8000/](http://localhost:8000/)
