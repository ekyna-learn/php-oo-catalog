<?php

namespace Security;

interface UserInterface
{
    /**
     * Returns the email.
     *
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * Returns the raw password.
     *
     * @return string|null
     */
    public function getPlainPassword(): ?string;

    /**
     * Sets the raw password.
     *
     * @param string $password
     */
    public function setPlainPassword(string $password): void;

    /**
     * Returns the encoded password.
     *
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * Sets the encoded password.
     *
     * @param string $password
     */
    public function setPassword(string $password): void;
}
