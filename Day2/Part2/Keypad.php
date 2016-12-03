<?php
declare(strict_types=1);

namespace AOC\Day2\Part2;

use AOC\Day2\Part1\Move;

class Keypad
{
    /**
     * @var array
     */
    private $keypad = [
        [-1, -1, 1, -1, -1],
        [-1, 2, 3, 4, -1],
        [5, 6, 7, 8, 9],
        [-1, 'A', 'B', 'C', -1],
        [-1, -1, 'D', -1, -1]
    ];

    /**
     * @var int
     */
    private $xPosition = 0;

    /**
     * @var int
     */
    private $yPosition = 2;

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

    public function getCurrentNumber()
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
            if ($this->keypad[$this->yPosition - 1][$this->xPosition] != -1) {
                $this->yPosition--;
            }
        }
    }

    private function moveDown()
    {
        if ($this->yPosition < 4) {
            if ($this->keypad[$this->yPosition + 1][$this->xPosition] != -1) {
                $this->yPosition++;
            }
        }
    }

    private function moveLeft()
    {
        if ($this->xPosition > 0) {
            if ($this->keypad[$this->yPosition][$this->xPosition - 1] != -1) {
                $this->xPosition--;
            }
        }
    }

    private function moveRight()
    {
        if ($this->xPosition < 4) {
            if ($this->keypad[$this->yPosition][$this->xPosition + 1] != -1) {
                $this->xPosition++;
            }
        }
    }
}
