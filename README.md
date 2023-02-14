# Projetinho Store
You can check the project running [here](https://www.wribeiiro.com/projetinho_store/)

# Screenshots
![image](https://user-images.githubusercontent.com/20648572/218607693-75f1c0af-3579-427c-97fe-0ef5f822f8ac.png)
![image](https://user-images.githubusercontent.com/20648572/218607718-855a3df3-c853-4884-ace3-a23f4385fef9.png)
![image](https://user-images.githubusercontent.com/20648572/218607750-d1509c16-b600-4c9a-a8be-60ad458ad394.png)
![image](https://user-images.githubusercontent.com/20648572/218607768-8a5311ef-a3eb-4c51-afae-9608a321fe08.png)
![image](https://user-images.githubusercontent.com/20648572/218607792-1c4a84f0-ce32-45a8-9299-46e7b506aeef.png)
![image](https://user-images.githubusercontent.com/20648572/218607896-496153fc-e630-4c26-8f09-761f3ae6e161.png)

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
