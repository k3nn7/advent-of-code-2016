<?php
declare(strict_types=1);

namespace AOC\Tests\Day20\Part1;

use AOC\Day20\Part1\Parser;

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
                '$input' => '0-2',
                '$expectedOutput' => [0, 2],
            ],
            [
                '$input' => '993-1992',
                '$expectedOutput' => [993, 1992],
            ],
        ];
    }
}
