<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

class Chip
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
