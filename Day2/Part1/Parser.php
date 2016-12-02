<?php
declare(strict_types=1);

namespace AOC\Day2\Part1;

class Parser
{
    private $charToMove = [
        'U' => Move::UP,
        'D' => Move::DOWN,
        'L' => Move::LEFT,
        'R' => Move::RIGHT
    ];

    public function parse(string $input): array
    {
        $chars = str_split($input);

        return array_map(function (string $char) {
            return $this->charToMove[$char];
        }, $chars);
    }
}
