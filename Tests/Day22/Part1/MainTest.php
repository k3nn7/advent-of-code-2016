<?php
declare(strict_types=1);

namespace AOC\Tests\Day22\Part1;

use AOC\Day22\Part1\Main;

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
        $input = "root@ebhq-gridcenter# df -h\nFilesystem              Size  Used  Avail  Use%\n/dev/grid/node-x0-y0     92T   12T    80T   78%\n/dev/grid/node-x0-y1     88T   67T    21T   76%\n/dev/grid/node-x0-y2     89T   67T    22T   75%\n";
        $expectedResult = 4;

        $result = $this->main->run($input);

        $this->assertEquals($expectedResult, $result);
    }
}
