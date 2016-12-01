<?php
declare(strict_types=1);

namespace AOC\Day1\Part1;

class Direction
{
    const UP = 0;
    const LEFT = 1;
    const DOWN = 2;
    const RIGHT = 3;

    private $direction;

    public function __construct(int $direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return int
     */
    public function getDirection(): int
    {
        return $this->direction;
    }

    public function rotate(Direction $rotation): Direction
    {
        $newDirection = ($this->getDirection() + $rotation->getDirection()) % 4;
        return new Direction($newDirection);
    }
}
