<?php

namespace AOC\Day1\Part2;

use AOC\Day1\Part1\Coordinates;
use AOC\Day1\Part1\Direction;
use AOC\Day1\Part1\Parser;
use AOC\Day1\Part1\Walker;

class Main
{
    public function run(string $input): int
    {
        $parser = new Parser();

        $commands = $parser->parse($input);

        $crossing = getCrossing($commands);

        return $crossing->distanceTo(new Coordinates(0, 0));
    }
}

function getCrossing(array $commands): Coordinates
{
    $walker = new Walker();
    $visited = [];
    foreach ($commands as $command) {
        $visited[] = clone($walker->getCoordinates());
        $walker->move(new Direction($command[0]), 1);
        if (in_array($walker->getCoordinates(), $visited)) {
            return $walker->getCoordinates();
        }
        for ($i = 1; $i < $command[1]; $i++) {
            $visited[] = clone($walker->getCoordinates());
            $walker->move(new Direction(Direction::UP), 1);
            if (in_array($walker->getCoordinates(), $visited)) {
                return $walker->getCoordinates();
            }
        }
    }
}
