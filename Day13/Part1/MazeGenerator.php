<?php
declare(strict_types=1);

namespace AOC\Day13\Part1;

class MazeGenerator
{
    /**
     * @var int
     */
    private $seed;

    public function __construct(int $seed)
    {
        $this->seed = $seed;
    }

    public function generateElement(int $x, int $y): string
    {
        $n = $x * $x + 3 * $x + 2 * $x * $y + $y + $y * $y + $this->seed;
        $onesCount = substr_count(decbin($n), '1');

        if ($this->isOdd($onesCount)) {
            return '#';
        }

        return '.';
    }

    private function isOdd(int $value): bool
    {
        return (bool) ($value & 1);
    }
}
