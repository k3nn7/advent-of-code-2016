<?php
declare(strict_types=1);

namespace AOC\Tests\Day21\Part1;

use AOC\Day21\Part1\Main;

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
        $operations = "swap position 4 with position 0\nswap letter d with letter b\nreverse positions 0 through 4\nrotate left 1 step\nmove position 1 to position 4\nmove position 3 to position 0\nrotate based on position of letter b\nrotate based on position of letter d\n";
        $input = 'abcde';
        $expectedOutput = 'decab';

        $output = $this->main->run($input, $operations);

        $this->assertEquals($expectedOutput, $output);
    }
}
