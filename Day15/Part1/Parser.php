<?php
declare(strict_types=1);

namespace AOC\Day15\Part1;

class Parser
{
    private const REGEX = '/^Disc #\d+ has (?P<positions>\d+) positions; at time=0, it is at position (?P<starting>\d+)\.$/';

    public function parse(string $input): array
    {
        $matches = [];
        preg_match(self::REGEX, $input, $matches);
        return [(int)$matches['positions'], (int)$matches['starting']];
    }
}
