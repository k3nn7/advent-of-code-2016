<?php
declare(strict_types=1);

namespace AOC\Day20\Part1;

class Parser
{
    private const REGEX = '/(?P<from>\d+)\-(?P<to>\d+)/';

    public function parse(string $input): array
    {
        $matches = [];

        preg_match(self::REGEX, $input, $matches);
        return [(int)$matches['from'], (int)$matches['to']];
    }
}
