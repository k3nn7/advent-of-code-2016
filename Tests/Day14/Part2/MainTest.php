<?php
declare(strict_types=1);

namespace AOC\Tests\Day14\Part2;

use AOC\Day14\Part2\Main;

class MainTest
{
    /**
     * @var Main
     */
    private $main;

    public function setUp()
    {
        $this->main = new Main();
    }

    public function _test_run()
    {
        $salt = 'abc';
        $expectedResult = 22859;

        $result = $this->main->run($salt);

        $this->assertEquals($expectedResult, $result);
    }
}
