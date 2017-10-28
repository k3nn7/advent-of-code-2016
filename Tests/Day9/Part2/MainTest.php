<?php
declare(strict_types=1);

namespace AOC\Tests\Day9\Part2;

use AOC\Day9\Part2\Main;

class MainTest
{
    public function a_test_run(): void
    {
        $input = "ADVENT\nA(1x5)BC\nX(8x2)(3x3)ABCY\n";
        $expectedOutput = 33;

        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
