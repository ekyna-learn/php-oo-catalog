<?php

namespace Security;

interface EncoderInterface
{
    /**
     * Encodes the given raw string.
     *
     * @param string $raw The raw string
     *
     * @return string The encoded string
     */
    public function encode(string $raw): string;
}
