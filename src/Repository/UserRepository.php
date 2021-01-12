<?php

namespace Repository;

use Entity\User;
use PDO;

class UserRepository
{
    /**
     * @var PDO
     */
    private $connection;


    /**
     * Constructor.
     *
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Finds one user by its id.
     *
     * @param int $id
     *
     * @return User|null
     */
    public function findOneById(int $id): ?User
    {
        // TODO query database to fetch the user

        throw new \Exception("Not yet implemented.");
    }

    /**
     * Finds one user by its email.
     *
     * @param string $email
     *
     * @return User|null
     */
    public function findOneByEmail(string $email): ?User
    {
        // TODO query database to fetch the user

        throw new \Exception("Not yet implemented.");
    }
}
