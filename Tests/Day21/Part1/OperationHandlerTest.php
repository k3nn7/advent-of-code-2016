<?php
declare(strict_types=1);

namespace AOC\Tests\Day21\Part1;

use AOC\Day21\Part1\Operation;
use AOC\Day21\Part1\OperationHandler;

class OperationHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperationHandler
     */
    private $handler;

    public function setUp()
    {
        $this->handler = new OperationHandler();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_handle(array $operation, string $input, string $expectedOutput)
    {
        $output = $this->handler->handle($operation, $input);

        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$operation' => [Operation::SWAP_POSITION, 4, 0],
                '$input' => 'abcde',
                '$expectedOutput' => 'ebcda',
            ],
            [
                '$operation' => [Operation::SWAP_LETTER, 'd', 'b'],
                '$input' => 'ebcda',
                '$expectedOutput' => 'edcba',
            ],
            [
                '$operation' => [Operation::REVERSE, 0, 4],
                '$input' => 'edcba',
                '$expectedOutput' => 'abcde',
            ],
            [
                '$operation' => [Operation::ROTATE_LEFT, 2],
                '$input' => 'abcde',
                '$expectedOutput' => 'cdeab',
            ],
            [
                '$operation' => [Operation::ROTATE_RIGHT, 2],
                '$input' => 'abcde',
                '$expectedOutput' => 'deabc',
            ],
            [
                '$operation' => [Operation::MOVE, 1, 4],
                '$input' => 'bcdea',
                '$expectedOutput' => 'bdeac',
            ],
            [
                '$operation' => [Operation::MOVE, 3, 2],
                '$input' => 'bcdea',
                '$expectedOutput' => 'bceda',
            ],
            [
                '$operation' => [Operation::MOVE, 3, 0],
                '$input' => 'bdeac',
                '$expectedOutput' => 'abdec',
            ],
            [
                '$operation' => [Operation::ROTATE_BASED, 'b'],
                '$input' => 'abdec',
                '$expectedOutput' => 'ecabd',
            ],
            [
                '$operation' => [Operation::ROTATE_BASED, 'd'],
                '$input' => 'ecabd',
                '$expectedOutput' => 'decab',
            ],
        ];
    }
}
