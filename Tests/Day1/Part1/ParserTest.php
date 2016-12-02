<?php
declare(strict_types=1);

namespace AOC\Tests\Day1\Part1;

use AOC\Day1\Part1\Direction;
use AOC\Day1\Part1\Parser;

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
    public function test_parse(string $input, array $expectedResult)
    {
        $result = $this->parser->parse($input);

        $this->assertEquals(
            $expectedResult,
            $result
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$input' => '',
                '$expectedResult' => []
            ],
            [
                '$input' => 'L1',
                '$expectedResult' => [
                    [Direction::LEFT, 1]
                ]
            ],
            [
                '$input' => 'R134',
                '$expectedResult' => [
                    [Direction::RIGHT, 134]
                ]
            ],
            [
                '$input' => 'L2, R3, L5',
                '$expectedResult' => [
                    [Direction::LEFT, 2],
                    [Direction::RIGHT, 3],
                    [Direction::LEFT, 5]
                ]
            ],
        ];
    }
}
