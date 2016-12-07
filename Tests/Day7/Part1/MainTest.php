<?php

namespace AOC\Tests\Day7\Part1;

use AOC\Day7\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $input = "abba[mnop]qrst\nabcd[bddb]xyyx\naaaa[qwer]tyui\nioxxoj[asdfgh]zxcvbn\n";
        $expectedOutput = 2;

        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
