<?php

namespace AOC\Tests\Day8\Part1;

use AOC\Day8\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $input = "rect 3x2\nrotate column x=1 by 1\nrotate row y=0 by 4\nrotate column x=1 by 1\n";
        $expectedOutput = 6;

        $main = new Main(7, 3);
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
