<?php
declare(strict_types=1);

namespace AOC\Tests\Day17\Part1;

use AOC\Day17\Part1\Main;

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
        $input = 'kglvqrro';
        $expectedOutput = [12, 'DDUDRLRRUDRD'];

        $output = $this->main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
