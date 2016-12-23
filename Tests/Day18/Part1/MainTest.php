<?php
declare(strict_types=1);

namespace AOC\Tests\Day18\Part1;

use AOC\Day18\Part1\Main;

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
        $input = '.^^.^.^^^^';
        $rows = 10;
        $expectedResult = 38;

        $result = $this->main->run($input, $rows);

        $this->assertEquals($expectedResult, $result);
    }
}
