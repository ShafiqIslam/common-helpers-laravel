<?php

namespace Polygontech\CommonHelpers\Email;

class Email
{
    private readonly string $email;

    /**
     * @throws InvalidBDMobile
     */
    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new InvalidEmail();

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->email;
    }

    public function isSame(Email $email): bool
    {
        return $this->toString() === $email->toString();
    }
}
