<?php
declare(strict_types=1);

namespace AOC\Tests\Day16\Part1;

use AOC\Day16\Part1\Main;

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
        $requiredLength = 20;
        $input = '10000';
        $expectedOutput = '01100';

        $output = $this->main->run($input, $requiredLength);
        $this->assertEquals($expectedOutput, $output);
    }
}
