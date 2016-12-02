<?php
declare(strict_types=1);

namespace AOC\Tests\Day2\Part1;

use AOC\Day2\Part1\Move;
use AOC\Day2\Part1\Parser;

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

    public function dataProvider()
    {
        return [
          [
              '$input' => 'UDLR',
              '$expectedOutput' => [Move::UP, Move::DOWN, Move::LEFT, Move::RIGHT]
          ]
        ];
    }
}
