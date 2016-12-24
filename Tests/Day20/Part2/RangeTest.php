<?php
declare(strict_types=1);

namespace AOC\Tests\Day20\Part2;

use AOC\Day20\Part2\Range;

class RangeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_remove(array $from, array $remove, array $expectedResult)
    {
        $range = new Range($from);
        $result = $range->remove($remove);

        $this->assertEquals(new Range($expectedResult), $result);
    }

    /**
     * @dataProvider valuesCountDataProvider
     */
    public function test_values_count(array $range, int $count)
    {
        $range = new Range($range);
        $this->assertEquals($count, $range->valuesCount());
    }

    public function dataProvider(): array
    {
        return [
            [
                '$from' => [[0, 9]],
                '$remove' => [0, 2],
                '$expectedResult' => [[3, 9]],
            ],
            [
                '$from' => [[0, 9]],
                '$remove' => [7, 9],
                '$expectedResult' => [[0, 6]],
            ],
            [
                '$from' => [[0, 1], [4, 5], [7, 9]],
                '$remove' => [1, 5],
                '$expectedResult' => [[0, 0], [7, 9]],
            ],
            [
                '$from' => [[0, 9]],
                '$remove' => [3, 4],
                '$expectedResult' => [[0, 2], [5, 9]],
            ],
            [
                '$from' => [[0, 2], [5, 8]],
                '$remove' => [2, 7],
                '$expectedResult' => [[0, 1], [8, 8]],
            ],
        ];
    }

    public function valuesCountDataProvider(): array
    {
        return [
            [
                '$range' => [[0, 9]],
                '$count' => 10,
            ],
            [
                '$range' => [[0, 2], [4, 5]],
                '$count' => 5,
            ],
        ];
    }
}
