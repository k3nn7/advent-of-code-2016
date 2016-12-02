<?php

namespace AOC\Tests\Day1\Part2;

use AOC\Day1\Part2\Main;

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
                '$input' => 'R8, R4, R4, R8',
                '$expectedOutput' => 4
            ],
        ];
    }
}
