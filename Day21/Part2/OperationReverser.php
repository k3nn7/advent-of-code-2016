<?php
declare(strict_types=1);

namespace AOC\Day21\Part2;

use AOC\Day21\Part1\Operation;

class OperationReverser
{
    public function reverse(array $operation): array
    {
        switch ($operation[0]) {
            case Operation::SWAP_POSITION:
                return [Operation::SWAP_POSITION, $operation[2], $operation[1]];
            case Operation::SWAP_LETTER:
                return [Operation::SWAP_LETTER, $operation[2], $operation[1]];
            case Operation::ROTATE_LEFT:
                return [Operation::ROTATE_RIGHT, $operation[1]];
            case Operation::ROTATE_RIGHT:
                return [Operation::ROTATE_LEFT, $operation[1]];
            case Operation::ROTATE_BASED:
                return [Operation::REVERSE_ROTATE_BASED, $operation[1]];
            case Operation::REVERSE:
                return $operation;
            case Operation::MOVE:
                return [Operation::MOVE, $operation[2], $operation[1]];
        }
    }
}
