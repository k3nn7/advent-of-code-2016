<?php
declare(strict_types=1);

namespace AOC\Day1\Part1;

class Coordinates
{
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function distanceTo(Coordinates $other): int
    {
        $xDistance = abs($other->getX() - $this->getX());
        $yDistance = abs($other->getY() - $this->getY());
        return (int)($xDistance + $yDistance);
    }

    public function add(Coordinates $other): Coordinates
    {
        $xSum = $this->getX() + $other->getX();
        $ySum = $this->getY() + $other->getY();

        return new Coordinates(
            $xSum,
            $ySum
        );
    }
}
