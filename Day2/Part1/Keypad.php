<?php
declare(strict_types=1);

namespace AOC\Day2\Part1;

class Keypad
{
    /**
     * @var array
     */
    private $keypad = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];

    /**
     * @var int
     */
    private $xPosition = 1;

    /**
     * @var int
     */
    private $yPosition = 1;

    /**
     * @var array
     */
    private $moves = [];

    public function __construct()
    {
        $this->moves = [
            Move::UP => [$this, 'moveUp'],
            Move::DOWN => [$this, 'moveDown'],
            Move::LEFT => [$this, 'moveLeft'],
            Move::RIGHT => [$this, 'moveRight'],
        ];
    }

    public function getCurrentNumber(): int
    {
        return $this->keypad[$this->yPosition][$this->xPosition];
    }

    public function moveFinger(int $move)
    {
        $this->moves[$move]();
    }

    private function moveUp()
    {
        if ($this->yPosition > 0) {
            $this->yPosition--;
        }
    }

    private function moveDown()
    {
        if ($this->yPosition < 2) {
            $this->yPosition++;
        }
    }

    private function moveLeft()
    {
        if ($this->xPosition > 0) {
            $this->xPosition--;
        }
    }

    private function moveRight()
    {
        if ($this->xPosition < 2) {
            $this->xPosition++;
        }
    }
}
