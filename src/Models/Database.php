<?php
declare(strict_types=1);

namespace Models;

use PDO;
use PDOStatement;

class Database
{
    private  $pdo;

    public function __construct()
    {

        $this->pdo = new PDO(
            'mysql:host=' . getenv('PROD_DB_HOST') . ';dbname=' . getenv('PROD_DATABASE'),
            getenv('PROD_USERNAME'),
            getenv('PROD_PASSWORD')
        );

        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query(string $query, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);


        return $stmt;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}