<?php

namespace AOC\Tests\Day15\Part1;

use AOC\Day15\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Main
     */
    private $main;

    public function setUp()
    {
        $this->main = new Main();
    }

    public function test_run()
    {
        $input = "Disc #1 has 5 positions; at time=0, it is at position 4.\nDisc #2 has 2 positions; at time=0, it is at position 1.\n";
        $expectedResult = 5;

        $result = $this->main->run($input);

        $this->assertEquals($expectedResult, $result);
    }
}
