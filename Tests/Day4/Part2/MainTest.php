<?php

namespace AOC\Day4\Part2;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function test_run()
    {
        $input = "vxupkizork-sgmtkzoi-pkrrehkgt-zxgototm-644[kotgr]\nmbiyqoxsm-pvygob-nocsqx-900[obmqs]\n";
        $expectedOutput = [
            'projectile magnetic jellybean training',
            'cryogenic flower design'
            ];

        $main = new Main();

        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }
}
