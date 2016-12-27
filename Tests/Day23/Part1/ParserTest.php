<?php
declare(strict_types=1);

namespace AOC\Tests\Day23\Part1;

use AOC\Day23\Part1\Instruction;
use AOC\Day23\Part1\Parser;

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
                '$input' => 'cpy a 1',
                '$expectedInstruction' => [Instruction::CPY, 'a', '1'],
            ],
            [
                '$input' => 'cpy 2 -5',
                '$expectedInstruction' => [Instruction::CPY, '2', '-5'],
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
            [
                '$input' => 'tgl 10',
                '$expectedInstruction' => [Instruction::TGL, 10],
            ],
            [
                '$input' => 'mul a c d',
                '$expectedInstruction' => [Instruction::MUL, 'a', 'c', 'd'],
            ],
            [
                '$input' => 'nop',
                '$expectedInstruction' => [Instruction::NOP],
            ],
        ];
    }
}
