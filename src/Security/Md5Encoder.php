<?php

namespace Security;

class Md5Encoder implements EncoderInterface
{
    public function encode(string $raw): string
    {
        return md5($raw);
    }
}
