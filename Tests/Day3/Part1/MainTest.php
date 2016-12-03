<?php
declare(strict_types=1);

namespace AOC\Tests\Day3\Part1;

use AOC\Day3\Part1\Main;

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
        $input = "  1  1  1\n  10  15  20\n  5  10  25\n";
        $expectedOutput = 2;

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
