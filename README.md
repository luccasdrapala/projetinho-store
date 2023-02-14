# Projetinho Store
You can check the project running [here](https://www.wribeiiro.com/projetinho_store/)

# Screenshots
![chrome_F6ymH9azhU](https://user-images.githubusercontent.com/78103055/218616256-f4d759d0-f63f-4af3-98dd-23e3f212378d.png)
![chrome_u8Iz4kyrq3](https://user-images.githubusercontent.com/78103055/218616481-da73226d-1582-4ccd-b9ae-8a4c007fa115.png)
![chrome_lpRHJ3nRIc](https://user-images.githubusercontent.com/78103055/218616505-f68a167b-f8f0-498a-b555-affe014a3b00.png)
![chrome_bgP3LhdKX9](https://user-images.githubusercontent.com/78103055/218616545-6e385104-29d9-42ac-a39f-2bf40a2a15e1.png)
![chrome_BHfb1FgIAi](https://user-images.githubusercontent.com/78103055/218616551-1d3f5c85-101d-4204-a38a-453bf2ee9432.png)
![chrome_vKmt2LT8eO](https://user-images.githubusercontent.com/78103055/218616557-834641c2-21bd-4f3a-b554-f5a7336ee5e7.png)


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
