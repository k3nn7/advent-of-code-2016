<?php
declare(strict_types=1);

namespace AOC\Tests\Day13\Part1;

use AOC\Day13\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Main
     */
    private $main;

    public function setUp()
    {
        $this->main = new Main(10);
    }

    public function test_run()
    {
        $expectedResult = 11;
        $result = $this->main->run(7, 4);
        $this->assertEquals($expectedResult, $result);
    }
}
