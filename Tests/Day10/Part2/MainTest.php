<?php

namespace AOC\Tests\Day10\Part2;

use AOC\Day10\Part2\Main;

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

    public function testRun()
    {
        $input = "value 5 goes to bot 2\nbot 2 gives low to bot 1 and high to bot 0\nvalue 3 goes to bot 1\nbot 1 gives low to output 1 and high to bot 0\nbot 0 gives low to output 2 and high to output 0\nvalue 2 goes to bot 2\n";
        $expectedOutput = 30;

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
