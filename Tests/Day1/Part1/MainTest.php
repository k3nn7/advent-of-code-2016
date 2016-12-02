<?php

namespace AOC\Tests\Day1\Part1;

use AOC\Day1\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_run(string $input, int $expectedOutput)
    {
        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals(
            $expectedOutput,
            $output
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$input' => 'R2, L3',
                '$expectedOutput' => 5
            ],
            [
                '$input' => 'R2, R2, R2',
                '$expectedOutput' => 2
            ],
            [
                '$input' => 'R5, L5, R5, R3',
                '$expectedOutput' => 12
            ],
        ];
    }
}
