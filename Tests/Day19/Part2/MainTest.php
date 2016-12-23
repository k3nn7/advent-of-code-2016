<?php
declare(strict_types=1);

namespace AOC\Tests\Day19\Part2;

use AOC\Day19\Part2\Main;

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
        $input = 5;
        $expectedOutput = 2;

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
