<?php
declare(strict_types=1);

namespace AOC\Tests\Day21\Part1;

use AOC\Day21\Part1\Operation;
use AOC\Day21\Part1\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Parser
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_parse(string $input, array $expectedOutput)
    {
        $output = $this->parser->parse($input);

        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'swap position 9 with position 11',
                '$expectedOutput' => [Operation::SWAP_POSITION, 9, 11],
            ],
            [
                '$input' => 'swap letter b with letter d',
                '$expectedOutput' => [Operation::SWAP_LETTER, 'b', 'd'],
            ],
            [
                '$input' => 'rotate left 10 steps',
                '$expectedOutput' => [Operation::ROTATE_LEFT, 10],
            ],
            [
                '$input' => 'rotate right 1 steps',
                '$expectedOutput' => [Operation::ROTATE_RIGHT, 1],
            ],
            [
                '$input' => 'rotate based on position of letter c',
                '$expectedOutput' => [Operation::ROTATE_BASED, 'c'],
            ],
            [
                '$input' => 'reverse positions 7 through 2',
                '$expectedOutput' => [Operation::REVERSE, 7, 2],
            ],
            [
                '$input' => 'move position 3 to position 5',
                '$expectedOutput' => [Operation::MOVE, 3, 5],
            ],
        ];
    }
}
