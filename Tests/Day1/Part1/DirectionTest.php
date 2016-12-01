<?php
declare(strict_types=1);

namespace AOC\Tests\Day1\Part1;

use AOC\Day1\Part1\Direction;

class DirectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_rotate(
        Direction $start,
        Direction $rotation,
        Direction $expectedResult
    ) {
        $result = $start->rotate($rotation);

        $this->assertEquals(
            $expectedResult,
            $result
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$start' => new Direction(Direction::UP),
                '$rotation' => new Direction(Direction::LEFT),
                '$expectedResult' => new Direction(Direction::LEFT)
            ],
            [
                '$start' => new Direction(Direction::UP),
                '$rotation' => new Direction(Direction::RIGHT),
                '$expectedResult' => new Direction(Direction::RIGHT)
            ],
            [
                '$start' => new Direction(Direction::LEFT),
                '$rotation' => new Direction(Direction::LEFT),
                '$expectedResult' => new Direction(Direction::DOWN)
            ],
            [
                '$start' => new Direction(Direction::LEFT),
                '$rotation' => new Direction(Direction::DOWN),
                '$expectedResult' => new Direction(Direction::RIGHT)
            ],
            [
                '$start' => new Direction(Direction::DOWN),
                '$rotation' => new Direction(Direction::LEFT),
                '$expectedResult' => new Direction(Direction::RIGHT)
            ],
            [
                '$start' => new Direction(Direction::DOWN),
                '$rotation' => new Direction(Direction::RIGHT),
                '$expectedResult' => new Direction(Direction::LEFT)
            ],
            [
                '$start' => new Direction(Direction::DOWN),
                '$rotation' => new Direction(Direction::DOWN),
                '$expectedResult' => new Direction(Direction::UP)
            ],
            [
                '$start' => new Direction(Direction::RIGHT),
                '$rotation' => new Direction(Direction::DOWN),
                '$expectedResult' => new Direction(Direction::LEFT)
            ],
            [
                '$start' => new Direction(Direction::RIGHT),
                '$rotation' => new Direction(Direction::LEFT),
                '$expectedResult' => new Direction(Direction::UP)
            ],
            [
                '$start' => new Direction(Direction::RIGHT),
                '$rotation' => new Direction(Direction::RIGHT),
                '$expectedResult' => new Direction(Direction::DOWN)
            ],
        ];
    }
}
