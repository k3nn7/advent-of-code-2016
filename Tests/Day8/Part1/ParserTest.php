<?php
declare(strict_types=1);

namespace AOC\Tests\Day8\Part1;

use AOC\Day8\Part1\Command;
use AOC\Day8\Part1\Parser;

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
    public function test_parse(string $input, array $expectedCommand): void
    {
        $command = $this->parser->parse($input);

        $this->assertEquals($expectedCommand, $command);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'rect 4x12',
                '$expectedCommand' => [Command::RECT, 4, 12]
            ],
            [
                '$input' => 'rotate row y=3 by 17',
                '$expectedCommand' => [Command::ROTATE_ROW, 3, 17]
            ],
            [
                '$input' => 'rotate column x=39 by 3',
                '$expectedCommand' => [Command::ROTATE_COLUMN, 39, 3]
            ],
        ];
    }
}
