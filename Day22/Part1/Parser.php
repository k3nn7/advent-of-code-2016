<?php
declare(strict_types=1);

namespace AOC\Day22\Part1;

class Parser
{

    public function parse(string $input): Node
    {
        $matches = [];
        preg_match('/(?P<size>\d+)T\s+(?P<used>\d+)T\s+(\d+)T/', $input, $matches);
        return new Node((int)$matches['size'], (int)$matches['used']);
    }
}
