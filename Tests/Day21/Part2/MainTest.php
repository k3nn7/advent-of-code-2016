<?php
declare(strict_types=1);

namespace AOC\Tests\Day21\Part2;

use AOC\Day21\Part2\Main;
use AOC\Day21\Part1\Main as MainP1;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Main
     */
    private $main;
    /**
     * @var MainP1
     */
    private $mainp1;

    public function setUp()
    {
        $this->mainp1 = new MainP1();
        $this->main = new Main();
    }

    public function test_run()
    {
        $operations = "swap position 4 with position 0\nswap letter d with letter b\nreverse positions 0 through 4\nrotate left 1 step\nmove position 1 to position 4\nmove position 3 to position 0\nrotate based on position of letter b\nrotate based on position of letter d\n";
        $input = 'abcdefgh';

        $scrambled = $this->mainp1->run($input, $operations);
        $unscrambled = $this->main->run($scrambled, $operations);

        $this->assertEquals($input, $unscrambled);
    }
}
