<?php
declare(strict_types=1);

namespace AOC\Day1\Part1;

class Walker
{
    /**
     * @var Coordinates
     */
    private $coordinates;
    /**
     * @var Directionk
     */
    private $currentDirection;

    public function __construct()
    {
        $this->coordinates = new Coordinates(0, 0);
        $this->currentDirection = new Direction(Direction::UP);
    }

    public function move(Direction $direction, int $distance)
    {
        $this->currentDirection = $this->currentDirection->rotate($direction);

        switch ($this->currentDirection->getDirection()) {
            case Direction::UP:
                $c = new Coordinates(0, $distance);
                break;
            case Direction::DOWN:
                $c = new Coordinates(0, -$distance);
                break;
            case Direction::LEFT:
                $c = new Coordinates(-$distance, 0);
                break;
            case Direction::RIGHT:
                $c = new Coordinates($distance, 0);
                break;
        }

        $this->coordinates = $this->coordinates->add($c);
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }
}
