<?php

namespace App\Db;
use PDO;
use PDOException;   

class Database {

    //variaveis de conexão com o banco de dados
    const HOST = 'localhost';
    const NAME = 'projetinho-store';
    const USER = 'root';
    const PASS = '';

    protected $table;
    private $connection;

    public function __construct($table = null) 
    {
        $this->table = $table;
        $this->setConnection();
    }
    
    public function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR CATCH'. $e->getmessage());
        }
    }
}

?>