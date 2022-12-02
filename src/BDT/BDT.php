<?php

namespace Polygontech\CommonHelpers\BDT;

use Exception;

class BDT
{
    private readonly int $totalPoysa;

    public function __construct(int $totalPoysa)
    {
        if ($totalPoysa < 0) throw new InvalidBDT("Money can't be negative.");

        $this->totalPoysa = $totalPoysa;
    }

    public function toDecimal(): float
    {
        return $this->totalPoysa / 100;
    }

    public function toInt(): int
    {
        return intval($this->toDecimal());
    }

    public function toString(): string
    {
        $poysa = "" . $this->totalPoysa;
        if ($this->totalPoysa < 100) $poysa = "0" . $poysa;
        if ($this->totalPoysa < 10) $poysa = "0" . $poysa;

        return substr_replace($poysa, '.', strlen($poysa) - 2, 0);
    }

    public static function fromDecimal(float $value): BDT
    {
        return new BDT(intval($value * 100));
    }

    public static function fromString(string $value): BDT
    {
        if (self::isInValidBDTString($value)) throw new InvalidBDT("Invalid Money string.");

        return BDT::fromDecimal(floatval($value));
    }

    public static function isInValidBDTString(string $value)
    {
        return !self::isValidBDTString($value);
    }

    public static function isValidBDTString(string $value)
    {
        return preg_match('/^\d{1,3}(?:\.\d{2})?$/', $value)
            || preg_match('/^(\d{1,2},?)+(\d{3})(?:\.\d{2})?$/', $value);
    }
}
