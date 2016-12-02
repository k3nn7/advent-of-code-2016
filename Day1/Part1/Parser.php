<?php
declare(strict_types=1);

namespace AOC\Day1\Part1;

class Parser
{
    public function parse(string $input): array
    {
        if (strlen($input) == 0) {
            return [];
        }
        $symbols = $this->explodeSymbols($input);
        return array_map([$this, 'symbolToCommand'], $symbols);
    }

    private function symbolToCommand(string $symbol)
    {
        $direction = $symbol[0];
        $distance = substr($symbol, 1);

        switch ($direction) {
            case 'L':
                return [Direction::LEFT, $distance];
            case 'R':
                return [Direction::RIGHT, $distance];
        }
    }

    private function explodeSymbols(string $input): array
    {
        $symbols = explode(',', $input);
        return array_map(function (string $item) {
            return trim($item);
        }, $symbols);
    }
}
