<?php
declare(strict_types=1);

namespace AOC\Tests\Day15\Part1;

use AOC\Day15\Part1\Parser;

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
    public function test_parse(string $input, array $expectedOutput): void
    {
        $output = $this->parser->parse($input);
        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'Disc #1 has 5 positions; at time=0, it is at position 4.',
                '$expectedOutput' => [5, 4],
            ],
            [
                '$input' => 'Disc #2 has 2 positions; at time=0, it is at position 1.',
                '$expectedOutput' => [2, 1]
            ]
        ];
    }
}
