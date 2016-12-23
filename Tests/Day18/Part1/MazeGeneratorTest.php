<?php
declare(strict_types=1);

namespace AOC\Tests\Day18\Part1;

use AOC\Day18\Part1\MazeGenerator;

class MazeGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MazeGenerator
     */
    private $generator;

    public function setUp()
    {
        $this->generator = new MazeGenerator();
    }

    public function test_generate()
    {
        $input = '..^^.';
        $expectedOutput = "..^^.\n.^^^^\n^^..^";

        $output = $this->generator->generate($input, 3);
        $this->assertEquals($expectedOutput, $output);
    }
}
