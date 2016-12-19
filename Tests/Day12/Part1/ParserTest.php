<?php
declare(strict_types=1);

namespace AOC\Day12\Part1;

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
    public function test_parse(string $input, array $expectedInstruction): void
    {
        $instruction = $this->parser->parse($input);

        $this->assertEquals($expectedInstruction, $instruction);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'cpy 1 a',
                '$expectedInstruction' => [Instruction::CPY, '1', 'a'],
            ],
            [
                '$input' => 'cpy a c',
                '$expectedInstruction' => [Instruction::CPY, 'a', 'c'],
            ],
            [
                '$input' => 'inc b',
                '$expectedInstruction' => [Instruction::INC, 'b'],
            ],
            [
                '$input' => 'dec c',
                '$expectedInstruction' => [Instruction::DEC, 'c'],
            ],
            [
                '$input' => 'jnz c 10',
                '$expectedInstruction' => [Instruction::JNZ, 'c', 10],
            ],
            [
                '$input' => 'jnz 1 -10',
                '$expectedInstruction' => [Instruction::JNZ, '1', -10],
            ],
        ];
    }
}
