<?php

namespace App\Repository;

use \PDO;
use \PDOException;

class Connection
{
    private $connection;

    public function __construct(array $config)
    {
        try {
            $host = $config['host'];
            $dbname = $config['database'];
            $username = $config['username'];
            $password = $config['password'];
            $charset = $config['charset'];
            $flags = $config['flags'];
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            $timezone = requestTimezone();
            if ($timezone)
                $flags[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET time_zone = '{$timezone}'";

            $this->connection = new PDO($dsn, $username, $password, $flags);
        } catch (PDOException $e) {
            throw new \Exception('Connection failed: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = null)
    {
        try {
            $query = $this->connection->prepare($sql);
            $query->execute($params);

            return $query;
        } catch (PDOException $e) {
            throw new \Exception('Query failed: ' . $e->getMessage());
        }
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}