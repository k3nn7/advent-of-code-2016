<?php
declare(strict_types=1);

namespace AOC\Tests\Day15\Part1;

use AOC\Day15\Part1\DiscFunction;

class DiscFunctionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_f_at(
        int $time,
        int $positions,
        int $startPosition,
        int $expectedValue
    ): void {
        $f = new DiscFunction($positions, $startPosition);
        $this->assertEquals($expectedValue, $f->at($time));
    }

    public function dataProvider(): array
    {
        return [
            [
                '$time' => 0,
                '$positions' => 5,
                '$startPosition' => 4,
                '$expectedValue' => 4,
            ],
            [
                '$time' => 3,
                '$positions' => 5,
                '$startPosition' => 4,
                '$expectedValue' => 2,
            ],
            [
                '$time' => 2,
                '$positions' => 2,
                '$startPosition' => 1,
                '$expectedValue' => 1,
            ],
        ];
    }
}
