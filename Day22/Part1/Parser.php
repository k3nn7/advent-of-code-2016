<?php
declare(strict_types=1);

namespace AOC\Day22\Part1;

class Parser
{

    public function parse(string $input): Node
    {
        $matches = [];
        preg_match(
            '/node-x(?P<x>\d+)-y(?P<y>\d+)\s+(?P<size>\d+)T\s+(?P<used>\d+)T\s+(\d+)T/',
            $input,
            $matches
        );

        return new Node(
            (int)$matches['size'],
            (int)$matches['used'],
            (int)$matches['x'],
            (int)$matches['y']
        );
    }
}
