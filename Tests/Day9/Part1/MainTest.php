<?php
declare(strict_types=1);

namespace AOC\Tests\Day9\Part1;

use AOC\Day9\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run(): void
    {
        $input = "ADVENT\nA(1x5)BC\nX(8x2)(3x3)ABCY\n";
        $expectedOutput = 6 + 7 + 18;

        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
