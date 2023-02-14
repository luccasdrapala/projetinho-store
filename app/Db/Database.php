<?php

namespace App\Db;
use PDO;
use PDOException;

class Database
{
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
            $this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . NAME, USER, PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR CATCH'. $e->getmessage());
        }
    }

    public function executeQuery(string $sql) :array
    {
        return $this->connection->query($sql)->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function get(?string $where = '') :array
    {
        $sql = "SELECT * FROM {$this->table}" . $where;
        return $this->connection->query($sql)->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function delete(int $id) :bool
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

    public function insert(array $data, string $table = ""): int
    {
        if (!empty($table)) {
            $this->table = $table;
        }

        $fields = array_keys($data);
        $binds  = array_pad([], count($fields), '?');

        $sql = 'INSERT INTO ' .$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
        $stm = $this->connection->prepare($sql);

        $stm->execute(array_values($data));

        return (int) $this->connection->lastInsertId();
    }
}