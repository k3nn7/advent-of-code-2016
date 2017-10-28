<?php

namespace AOC\Day24\Part1;

class Main
{
    /**
     * @var MapGenerator
     */
    private $mapGenerator;

    public function __construct()
    {
        $this->mapGenerator = new MapGenerator();
    }

    public function run(string $input): int
    {
        $graph = $this->mapGenerator->buildSimpleGraph($input);

        $distances = [];

        foreach ($graph as $vertex) {
            $distances[$vertex->getName()] = [];
            foreach ($vertex->getNeighbours() as $neighbour) {
                $distances[$vertex->getName()][$neighbour->getName()] = $vertex->distanceToNeighbour($neighbour);
            }
        }

        var_dump($graph[0]->shortestPathThroughAllNeighbours([], $graph[2]));
        var_dump($graph[1]->shortestPathThroughAllNeighbours([], $graph[2]));
        var_dump($graph[2]->shortestPathThroughAllNeighbours([], $graph[2]));
    }
}
