<?php
declare(strict_types=1);

namespace AOC\Day15\Part1;

class DiscFunction
{
    /**
     * @var int
     */
    private $positions;
    /**
     * @var int
     */
    private $startPosition;

    public function __construct(int $positions, int $startPosition)
    {
        $this->positions = $positions;
        $this->startPosition = $startPosition;
    }

    public function at(int $time): int
    {
        return ($time + $this->startPosition) % $this->positions;
    }
}
