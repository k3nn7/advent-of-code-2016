<?php
declare(strict_types=1);

namespace AOC\Day13\Part2;

use AOC\Day13\Part1\Vertex;

class Dijkstra
{
    /**
     * @var Vertex[]
     */
    private $vertices = [];

    public function addVertices(Vertex ...$vertices): void
    {
        foreach ($vertices as $v) {
            $hash = spl_object_hash($v);
            $this->vertices[$hash] = $v;
        }
    }

    public function calculateDistancesFrom(Vertex $start): array
    {
        $distances = [];
        $previous = [];
        $notVisited = new PriorityQueue();

        foreach ($this->vertices as $hash => $v) {
            if ($v === $start) {
                $distances[$hash] = 0;
                $notVisited->insert($hash, 0);
            } else {
                $distances[$hash] = PHP_INT_MAX;
                $notVisited->insert($hash, PHP_INT_MAX);
            }
            $previous[$hash] = null;
        }

        while (!$notVisited->isEmpty()) {
            $smallest = $notVisited->extract();
            if ($distances[$smallest] === PHP_INT_MAX) break;

            foreach ($this->vertices[$smallest]->getNeighbours() as $neighbour) {
                $neighbourHash = spl_object_hash($neighbour);
                $distance = $distances[$smallest] + $this->vertices[$smallest]->distanceToNeighbour($neighbour);
                if ($distance < $distances[$neighbourHash]) {
                    $distances[$neighbourHash] = $distance;
                    $previous[$neighbourHash] = $smallest;
                    $notVisited->insert($neighbourHash, $distance);
                }
            }
        }

        return $distances;
    }
}
