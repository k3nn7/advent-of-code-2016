<?php
declare(strict_types=1);

namespace AOC\Tests\Day20\Part1;

use AOC\Day20\Part1\Main;

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
        $input = "5-8\n0-2\n4-7\n";
        $expectedOutput = 3;

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
