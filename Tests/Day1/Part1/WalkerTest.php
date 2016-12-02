<?php
declare(strict_types=1);

namespace AOC\Tests\Day1\Part1;

use AOC\Day1\Part1\Coordinates;
use AOC\Day1\Part1\Direction;
use AOC\Day1\Part1\Walker;

class WalkerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_move(
        array $moves,
        Coordinates $expectedCoordinates
    ) {
        $marker = new Walker();

        array_walk($moves, function($move) use ($marker) {
            $marker->move($move[0], $move[1]);
        });

        $this->assertEquals(
            $expectedCoordinates,
            $marker->getCoordinates()
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$moves' => [
                    [new Direction(Direction::LEFT), 2]
                ],
                '$expectedCoordinates' => new Coordinates(-2, 0)
            ],
            [
                '$moves' => [
                    [new Direction(Direction::LEFT), 2],
                    [new Direction(Direction::LEFT), 3]
                ],
                '$expectedCoordinates' => new Coordinates(-2, -3)
            ],
            [
                '$moves' => [
                    [new Direction(Direction::RIGHT), 5],
                    [new Direction(Direction::LEFT), 3]
                ],
                '$expectedCoordinates' => new Coordinates(5, 3)
            ],
        ];
    }
}
