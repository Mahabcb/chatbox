<?php

namespace App;
require_once __DIR__ . '/../vendor/autoload.php';

use App\Connection;
/**
 * 
 * la classe qui se charge de faire des requetes SQL
 */
abstract class QueryBuilder {
    
    private $connection;
    protected $table;

    public function __construct() 
    {
        $this->connection = Connection::getConnection();
    }

    public function select(string $order = "date DESC") : array
    {
        $sql = "SELECT * from {$this->table}";
        if($order) {
            $sql .= " ORDER BY $order";
        }
        return $this->connection->query($sql)->fetch_all();
    }

    public function insert(string $author, string $contents)
    {
        $query = $this->connection->prepare("INSERT INTO messages SET author = :author, content = :content, created_at = NOW()");
        $query->execute(compact('author', 'content'));
    }

    
}
