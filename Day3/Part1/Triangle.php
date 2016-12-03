<?php
declare(strict_types=1);

namespace AOC\Day3\Part1;

class Triangle
{
    public function __construct(int $a, int $b, int $c)
    {
        if ($a + $b <= $c) {
            throw new \InvalidArgumentException();
        }
        if ($b + $c <= $a) {
            throw new \InvalidArgumentException();
        }
        if ($a + $c <= $b) {
            throw new \InvalidArgumentException();
        }
    }
}
