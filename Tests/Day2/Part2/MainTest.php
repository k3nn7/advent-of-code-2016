<?php
declare(strict_types=1);

namespace AOC\Tests\Day2\Part2;

use AOC\Day2\Part2\Main;

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
        $input = "ULL\nRRDDD\nLURDL\nUUUUD\n";
        $expectedOutput = ['5', 'D', 'B', 3];

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
