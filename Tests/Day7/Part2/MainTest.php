<?php

namespace AOC\Tests\Day7\Part2;

use AOC\Day7\Part2\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $input = "aba[bab]xyz\nxyx[xyx]xyx\naaa[kek]eke\nzazbz[bzb]cdb\n";
        $expectedOutput = 3;

        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
