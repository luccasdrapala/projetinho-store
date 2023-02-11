<?php

namespace App\Db;
use PDO;
use PDOException;   

class Database {

    //variaveis de conexão com o banco de dados
    const HOST = 'localhost';
    const NAME = 'projetinho_store';
    const USER = 'root';
    const PASS = '';

    protected $table;

    /**
     * @var \PDO
     */
    protected $connection;

    public function __construct() 
    {
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

    public function executeQuery(string $sql) :array
    {
        return $this->connection->query($sql)->fetchAll(\PDO::FETCH_CLASS, self::class); // FETCH_CLASS retorna o array
    }

    public function get(?string $where = '') :array 
    {   
        $sql = "SELECT * FROM {$this->table}" . $where;
        return $this->connection->query($sql)->fetchAll(\PDO::FETCH_CLASS, self::class); // FETCH_CLASS retorna o array
    }

    public function delete(int $id) :bool 
    { 
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $prepare = $this->connection->prepare($sql);
        $prepare->bindValue(":id", $id);

        return $prepare->execute();
    }

    public function salesDelete(int $id) :bool 
    { 
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $prepare = $this->connection->prepare($sql);
        $prepare->bindValue(":id", $id);

        return $prepare->execute();
    }

    public function update(int $id, array $data) :bool
    {
        $array_fields = implode('=?,',array_keys($data)) . '=?';

        $sql = "UPDATE {$this->table} SET {$array_fields} WHERE id = {$id}";
        $prepare = $this->connection->prepare($sql);
        
        return $prepare->execute(array_values($data));
    }

    public function insert(array $data) 
    {    
        $fields = array_keys($data);
        $binds = array_pad([], count($fields), '?');

        $sql = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $prepare = $this->connection->prepare($sql);

        return $prepare->execute(array_values($data));
    }

}

?>