<?php

namespace Manager;

use Entity\User;
use Exception;
use PDO;
use Security\EncoderInterface;

class UserManager
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var EncoderInterface
     */
    private $encoder;


    /**
     * Constructor.
     *
     * @param PDO              $connection
     * @param EncoderInterface $encoder
     */
    public function __construct(PDO $connection, EncoderInterface $encoder)
    {
        $this->connection = $connection;
        $this->encoder = $encoder;
    }

    /**
     * Persists the user.
     *
     * @param User $user
     *
     * @throws Exception If persistence fails.
     */
    public function persist(User $user): void
    {
        $this->prepare($user);

        if (0 < $user->getId()) {
            $this->update($user);

            return;
        }

        $this->insert($user);
    }

    /**
     * Removes the user from the database.
     *
     * @param User $user
     *
     * @throws Exception If removal fails.
     */
    public function remove(User $user): void
    {
        // TODO Remove the user.

        throw new Exception("Not yet implemented.");
    }

    /**
     * Prepares the user for persistence.
     *
     * @param User $user
     */
    private function prepare(User $user): void
    {
        // TODO If user has a plain password, update the encoded password.

        throw new Exception("Not yet implemented.");
    }

    /**
     * Inserts the user into the database.
     *
     * @param User $user
     *
     * @throws Exception If insertion fails.
     */
    private function insert(User $user): void
    {
        // TODO Insert the user.

        throw new Exception("Not yet implemented.");
    }

    /**
     * Updates the user in the database.
     *
     * @param User $user
     *
     * @throws Exception If update fails.
     */
    private function update(User $user): void
    {
        // TODO Update the user.

        throw new Exception("Not yet implemented.");
    }
}
