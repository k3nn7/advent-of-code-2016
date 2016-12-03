<?php
declare(strict_types=1);

namespace AOC\Tests\Day2\Part2;

use AOC\Day2\Part2\Keypad;
use AOC\Day2\Part1\Move;

class KeypadTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Keypad
     */
    private $keypad;

    public function setUp()
    {
        $this->keypad = new Keypad();
    }

    public function test_getCurrentNumber_starts_with_5()
    {
        $number = $this->keypad->getCurrentNumber();

        $this->assertEquals(5, $number);
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_return_valid_number_after_moves(array $moves, $expectedNumber): void
    {
        $keypad = $this->keypad;

        array_walk($moves, function(int $move) use ($keypad) {
           $keypad->moveFinger($move);
        });

        $this->assertEquals(
            $expectedNumber,
            $keypad->getCurrentNumber()
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$moves' => [Move::UP],
                '$expectedNumber' => 5
            ],
            [
                '$moves' => [Move::UP, Move::LEFT, Move::LEFT, Move::RIGHT, Move::RIGHT, Move::DOWN, Move::DOWN, Move::DOWN],
                '$expectedNumber' => 'D'
            ],
        ];
    }
}
