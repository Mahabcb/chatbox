<?php

namespace App\Repository;

use App\Connection;
use App\QueryBuilder;

abstract class Repository {
    
    protected $db;
    protected $table;
    protected $queryBuilder;

    public function __construct()
    {
        $this->db = Connection::getConnection();
        $this->queryBuilder = new QueryBuilder();
    }

    public function findAll(): array
    {
        return $this->queryBuilder->select();
    }

    // public function find(int $id): array
    // {
    //     $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
    //     $query->execute(['id' => $id]);
    //     $item = $query->fetch();
    //     return $item;
    // }
}
