<?php

namespace App\Domain\User\Repository;

use App\Constants\TableNames;
use App\Repository\Connection;

class UserRepository
{
    /** @var Connection */
    private $connection;

    /**
     * UserRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM " . TableNames::USERS;

        $data = $this->connection->query($sql);

        return $data->fetchAll();
    }
}