<?php
declare(strict_types=1);

namespace AOC\Tests\Day21\Part2;

use AOC\Day21\Part1\Operation;
use AOC\Day21\Part2\OperationReverser;

class OperationReverwerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OperationReverser
     */
    private $reverser;

    public function setUp()
    {
        $this->reverser = new OperationReverser();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_reverse(array $operation, array $expectedReverse)
    {
        $reversed = $this->reverser->reverse($operation);

        $this->assertEquals($expectedReverse, $reversed);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$operation' => [Operation::SWAP_POSITION, 3, 5],
                '$expectedReversed' => [Operation::SWAP_POSITION, 5, 3],
            ],
            [
                '$operation' => [Operation::SWAP_LETTER, 'a', 'c'],
                '$expectedReversed' => [Operation::SWAP_LETTER, 'c', 'a'],
            ],
            [
                '$operation' => [Operation::ROTATE_LEFT, 3],
                '$expectedReversed' => [Operation::ROTATE_RIGHT, 3],
            ],
            [
                '$operation' => [Operation::ROTATE_RIGHT, 3],
                '$expectedReversed' => [Operation::ROTATE_LEFT, 3],
            ],
            [
                '$operation' => [Operation::ROTATE_BASED, 'a'],
                '$expectedReversed' => [Operation::REVERSE_ROTATE_BASED, 'a'],
            ],
            [
                '$operation' => [Operation::REVERSE, 5, 3],
                '$expectedReversed' => [Operation::REVERSE, 5, 3],
            ],
            [
                '$operation' => [Operation::MOVE, 3, 2],
                '$expectedReversed' => [Operation::MOVE, 2, 3],
            ],
        ];
    }
}
