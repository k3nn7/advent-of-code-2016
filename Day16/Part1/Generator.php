<?php
declare(strict_types=1);

namespace AOC\Day16\Part1;

class Generator
{
    public function generator(string $input, int $minLength): string
    {
        $result = $input;
        while (strlen($result) < $minLength) {
            $a = $result;
            $b = strrev($a);
            $b = strtr($b, [1, 0]);
            $result = sprintf('%s0%s', $a, $b);
        }
        return $result;
    }
}
