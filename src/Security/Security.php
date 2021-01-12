<?php

namespace Security;

use Repository\UserRepository;
use Security\EncoderInterface;

class Security
{
    private const SESSION_USER_ID = 'authenticated_user_id';

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var bool
     */
    private $initialized;


    /**
     * Constructor.
     *
     * @param UserRepository             $repository
     * @param EncoderInterface $encoder
     */
    public function __construct(UserRepository $repository, EncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
        $this->initialized = false;
    }

    /**
     * Authenticates with the given credentials.
     *
     * @param string $email
     * @param string $password
     *
     * @return bool Whether authentication succeed
     */
    public function login(string $email, string $password): bool
    {
        // TODO find user by email (using the repository)

        // TODO Encodes the password (using encoder)

        // TODO If raw and encoded password are the same

            // TODO Store the user in user property

            // TODO Store the user id into the session

        return false;
    }

    /**
     * Disconnects the user.
     */
    public function logout(): void
    {
        // Remove the user id from the session
        unset($_SESSION[self::SESSION_USER_ID]);

        // Redirect to login page
        http_response_code(301);
        header('Location: login.php');
        exit;
    }

    /**
     * Returns the authenticated user.
     *
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        $this->initialize();

        return $this->user;
    }

    /**
     * Returns whether a user is authenticated.
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        $this->initialize();

        return null !== $this->user;
    }

    /**
     * Initializes the authenticator.
     */
    private function initialize(): void
    {
        if ($this->initialized) {
            return;
        }

        $this->initialized = true;

        if (!isset($_SESSION[self::SESSION_USER_ID])) {
            return;
        }

        $id = intval($_SESSION[self::SESSION_USER_ID]);

        $this->user = $this->repository->findOneById($id);
    }

    /**
     * @inheritDoc
     */
    public function encode(string $raw): string
    {
        // TODO: Implement encode() method.
    }
}
