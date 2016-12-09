<?php
declare(strict_types=1);

namespace AOC\Day8\Part1;

class Parser
{
    public function parse(string $input): array
    {
        $matches = [];

        preg_match('/^rect (\d+)x(\d+)$/', $input, $matches);
        if (count($matches) > 0) {
            return [Command::RECT, (int)$matches[1], (int)$matches[2]];
        }

        preg_match('/^rotate row y=(\d+) by (\d+)$/', $input, $matches);
        if (count($matches) > 0) {
            return [Command::ROTATE_ROW, (int)$matches[1], (int)$matches[2]];
        }

        preg_match('/^rotate column x=(\d+) by (\d+)$/', $input, $matches);
        if (count($matches) > 0) {
            return [Command::ROTATE_COLUMN, (int)$matches[1], (int)$matches[2]];
        }
    }
}
