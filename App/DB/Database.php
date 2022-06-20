<?php

namespace App\DB;

use PDOException;
use PDO;

class Database {
    const HOST = 'localhost';
    const NAME = 'tokenlab';
    const USER = 'pkielblock';
    const PASSWORD = 'pedro01112002';
    private string $table;
    private PDO $connection;


    public function __construct($table)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(): void
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);
            //Atributo do tipo errormode que define o comportamento do PDO ao encontrar um erro
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro ao conectar com o banco de dados' . $e->getMessage());
        }
    }

    public function execute($sql, $params = null): bool|\PDOStatement
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            die('Erro ao executar a consulta' .  $e->getMessage());
        }
    }


    public function insert($values): int
    {
        //Deixando os campos e binds dinamicos
        $campos = array_keys($values); //array keys para pegar as chaves
        $binds = array_pad([], count($campos), '?');

        $sql = "INSERT INTO " . $this->table . " (" . implode(',', $campos) . ") VALUES (" . implode(',', $binds) . ")";
        $this->execute($sql, array_values($values)); //array values para pegar os valores
        
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'): \PDOStatement
    {
        //caso haja valor adicionar a query, caso nao deixar em branco.
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $sql = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->execute($sql);
    }

    public function update($where, $values): bool
    {
        $fields = array_keys($values);
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
        $this->execute($sql, array_values($values));

        return true;
    }

    public function delete($where): bool
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($sql);

        return true;
    }
}