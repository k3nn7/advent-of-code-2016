<?php

namespace AOC\Day1\Part1;

class Main
{
    public function run(string $input): int
    {
        $parser = new Parser();

        $commands = $parser->parse($input);

        $walker = new Walker();
        array_walk($commands, function(array $command) use ($walker) {
            $walker->move(new Direction($command[0]), $command[1]);
        });

        return $walker->getCoordinates()->distanceTo(new Coordinates(0, 0));
    }
}
