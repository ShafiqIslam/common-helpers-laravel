<?php

namespace Polygontech\CommonHelpers\Identity;

class BDNid
{
    private readonly string $number;

    /**
     * @throws InvalidBDNid
     */
    public function __construct(string $number)
    {
        $this->number = BDNidValidator::getValidated($number);
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    public function isSame(BDNid $nid): bool
    {
        return $this->getNumber() === $nid->getNumber();
    }
}
