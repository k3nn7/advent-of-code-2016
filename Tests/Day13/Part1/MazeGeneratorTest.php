<?php
declare(strict_types=1);

namespace AOC\Tests\Day13\Part1;

use AOC\Day13\Part1\MazeGenerator;

class MazeGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MazeGenerator
     */
    private $mazeGenerator;

    public function setUp()
    {
        $this->mazeGenerator = new MazeGenerator(10);
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_generate(int $x, int $y, string $expectedElement)
    {
        $element = $this->mazeGenerator->generateElement($x, $y);

        $this->assertEquals($expectedElement, $element);
    }

    public function dataProvider()
    {
        return [
            [
                '$x' => 0,
                '$y' => 0,
                '$expectedElement' => '.',
            ],
            [
                '$x' => 9,
                '$y' => 6,
                '$expectedElement' => '#',
            ],
        ];
    }
}
