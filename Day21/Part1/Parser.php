<?php
declare(strict_types=1);

namespace AOC\Day21\Part1;

class Parser
{
    public function parse(string $input): array
    {
        $matches = [];

        if (preg_match('/^swap position (?P<X>\d+) with position (?P<Y>\d+)$/', $input, $matches)) {
            return [Operation::SWAP_POSITION, (int)$matches['X'], (int)$matches['Y']];
        }
        if (preg_match('/^swap letter (?P<X>\w) with letter (?P<Y>\w)$/', $input, $matches)) {
            return [Operation::SWAP_LETTER, $matches['X'], $matches['Y']];
        }
        if (preg_match('/^rotate left (?P<X>\d+) (step|steps)$/', $input, $matches)) {
            return [Operation::ROTATE_LEFT, (int)$matches['X']];
        }
        if (preg_match('/^rotate right (?P<X>\d+) (step|steps)$/', $input, $matches)) {
            return [Operation::ROTATE_RIGHT, (int)$matches['X']];
        }
        if (preg_match('/^rotate based on position of letter (?P<X>\w)$/', $input, $matches)) {
            return [Operation::ROTATE_BASED, $matches['X']];
        }
        if (preg_match('/^reverse positions (?P<X>\d+) through (?P<Y>\d+)$/', $input, $matches)) {
            return [Operation::REVERSE, (int)$matches['X'], (int)$matches['Y']];
        }
        if (preg_match('/^move position (?P<X>\d+) to position (?P<Y>\d+)$/', $input, $matches)) {
            return [Operation::MOVE, (int)$matches['X'], (int)$matches['Y']];
        }
    }
}

