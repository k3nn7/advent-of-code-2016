<?php
declare(strict_types=1);

namespace AOC\Tests\Day4\Part1;

use AOC\Day4\Part1\Main;

class MainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_run(string $input, int $expectedOutput)
    {
        $main = new Main();
        $output = $main->run($input);

        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => "aaaaa-bbb-z-y-x-123[abxyz]\na-b-c-d-e-f-g-h-987[abcde]\nnot-a-real-room-404[oarel]\ntotally-real-room-200[decoy]\n",
                '$expectedOutput' => 1514
            ]
        ];
    }
}
