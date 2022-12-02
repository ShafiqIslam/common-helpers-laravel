<?php

namespace Polygontech\CommonHelpers\Mobile;

class BDMobileValidator
{
    public function validate($number): bool
    {
        if (!$number) {
            return false;
        }

        $number = BDMobileFormatter::format($number);
        return $this->isBangladeshiNumberFormat($number);
    }

    private function isBangladeshiNumberFormat($number): bool
    {
        return self::contains88($number) && strlen($number) == 14 && $number[4] == '1' && self::inBdNumberDomain($number);
    }

    private function contains88($number): bool
    {
        return str_starts_with($number, '+880');
    }

    private function inBdNumberDomain($number): bool
    {
        return in_array($number[5], [3, 4, 5, 6, 7, 8, 9]);
    }

    /**
     * @param $number
     * @return string
     * @throws InvalidMobile
     */

    public function getValidated($number): string
    {
        if (!$this->validate($number)) throw new InvalidBDMobile();

        return BDMobileFormatter::format($number);
    }
}
