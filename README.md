# Projetinho Store
You can check the project running [here](https://www.wribeiiro.com/projetinho_store/)

# Screenshots

### Tecnologies
- PHP / PDO
- Postgres / MySQL
- JavaScript
- Bootstrap 4

### Getting started

Clone the repository
```bash
$ git clone https://github.com/luccasdrapala/projetinho-store
```
Switch to the repo folder
```bash
$ cd projetinho-store
```
Install all the dependencies using composer
```bash
$ composer install
```
Set the database params config.php
```bash
$ define("BASE_URL", "http://localhost:8080/");
$ define("HOST", "localhost");
$ define("NAME", "projetinho_store");
$ define("USER", "root");
$ define("PASS", "");
```

After changing the above parameters,

- Import the projetinho_store_postgresql.sql file for postgres database defined at constant "NAME"

Start the local development server
```bash
$ php -S localhost:8080
```
