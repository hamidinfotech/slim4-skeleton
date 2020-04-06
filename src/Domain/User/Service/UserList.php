<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserRepository;

class UserList
{
    /** @var UserRepository */
    private $repository;

    /**
     * UserList constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(): array
    {
        return $this->repository->findAll();
    }
}