<?php
declare(strict_types=1);

namespace AOC\Tests\Day10\Part1;

use AOC\Day10\Part1\Command;
use AOC\Day10\Part1\Parser;

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
    public function test_parse(string $commandString, array $expectedCommand): void
    {
        $command = $this->parser->parse($commandString);
        $this->assertEquals($expectedCommand, $command);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$command' => 'bot 152 gives low to bot 155 and high to bot 70',
                '$expectedCommand' => [Command::BOT_GIVES, 152, Command::TO_BOT, 155, Command::TO_BOT, 70],
            ],
            [
                '$command' => 'bot 167 gives low to output 4 and high to bot 34',
                '$expectedCommand' => [Command::BOT_GIVES, 167, Command::TO_OUTPUT, 4, Command::TO_BOT, 34],
            ],
            [
                '$command' => 'bot 194 gives low to output 17 and high to output 13',
                '$expectedCommand' => [Command::BOT_GIVES, 194, Command::TO_OUTPUT, 17, Command::TO_OUTPUT, 13],
            ],
            [
                '$command' => 'value 61 goes to bot 33',
                '$expectedCommand' => [Command::SET_VALUE, 61, Command::TO_BOT, 33],
            ],
        ];
    }
}
