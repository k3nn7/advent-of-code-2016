<?php
declare(strict_types=1);

namespace AOC\Tests\Day3\Part2;

use AOC\Day3\Part2\Main;

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
        $input = "  1  10  5\n  1  15  10\n  1  20  25\n";
        $expectedOutput = 2;

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
