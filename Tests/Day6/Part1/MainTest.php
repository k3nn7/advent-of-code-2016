<?php
declare(strict_types=1);

namespace AOC\Tests\Day6\Part1;

use AOC\Day6\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $input = "eedadn\ndrvtee\neandsr\nraavrd\natevrs\ntsrnev\nsdttsa\nrasrtv\nnssdts\nntnada\nsvetve\ntesnvt\nvntsnd\nvrdear\ndvrsen\nenarar\n";
        $expectedOutput = 'advent';

        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
