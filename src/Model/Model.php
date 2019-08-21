<?php

namespace App\Model;

use PDO;

class Model
{
    protected $db;

    protected $tableName;

    protected $fields = [];

    protected $fetchStyle = PDO::FETCH_ASSOC;

    public function __construct(\PDO $dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();

        return $stmt->fetchAll($this->fetchStyle);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch($this->fetchStyle);
    }

    public function findColumns(array $columns)
    {
        $columns = implode(', ', $columns);
        $stmt = $this->db->prepare("SELECT $columns FROM $this->tableName");
        $stmt->execute();

        return $stmt->fetchAll($this->fetchStyle);
    }


    public function save($data)
    {
        $dataCopy = $data;
        $questions = array_map(function () {
            return '?';
        }, $dataCopy);

        $questions = implode(',', $questions);

        $fields = implode(',', $this->fields);
        $stmt = $this->db->prepare("INSERT INTO $this->tableName ($fields) VALUES ($questions)");

        return $stmt->execute($data);
    }

    public function update($data, $id)
    {
        $keys = array_keys($data);
        $keysForQuery = array_map(function ($key) {
            return "$key=?";
        }, $keys);

        $keysForQuery = implode(',', $keysForQuery);
        $sql = "UPDATE $this->tableName SET $keysForQuery WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $values = array_values($data);
        $values[] = $id;
        $stmt->execute($values);

        return $stmt->fetch($this->fetchStyle);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->tableName WHERE id =:id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

    public function paginate($page, $maxResultsPerPage = 5)
    {
        $offset = $maxResultsPerPage * $page;
        $sql = "SELECT * FROM $this->tableName LIMIT 5 OFFSET $offset";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll($this->fetchStyle);
    }
}
