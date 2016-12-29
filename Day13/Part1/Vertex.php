<?php
declare(strict_types=1);

namespace AOC\Day13\Part1;

class Vertex
{
    /**
     * @var array
     */
    private $links = [];
    /**
     * @var Vertex[]
     */
    private $neighbours = [];
    /**
     * @var string
     */
    private $type;

    public function __construct(string $type = '')
    {
        $this->type = $type;
    }

    public function linkTo(Vertex $other, int $cost): void
    {
        if ($this->isLinkedTo($other)) {
            return;
        }

        $otherHash = spl_object_hash($other);
        $this->links[$otherHash] = $cost;
        $this->neighbours[$otherHash] = $other;
        $other->linkTo($this, $cost);
    }

    public function isLinkedTo(Vertex $other): bool
    {
        return array_key_exists(spl_object_hash($other), $this->links);
    }

    public function distanceTo(Vertex $other, $visited = []): int
    {
        if ($other === $this) {
            return 0;
        }

        if (in_array($this, $visited)) {
            return PHP_INT_MAX;
        }

        $distance = PHP_INT_MAX;

        foreach ($this->links as $neighbourHash => $cost) {
            $distanceViaNeighbour = $cost + $this
                    ->neighbours[$neighbourHash]
                    ->distanceTo($other, array_merge([$this], $visited));
            if ($distanceViaNeighbour < $distance) {
                $distance = $distanceViaNeighbour;
            }
        }

        return $distance;
    }

    public function distanceToNeighbour(Vertex $neighbour): int
    {
        $hash = spl_object_hash($neighbour);
        if (!array_key_exists($hash, $this->links)) return PHP_INT_MAX;
        return $this->links[$hash];
    }

    public function getName(): string
    {
        return $this->type;
    }

    public function getNeighbours()
    {
        return array_values($this->neighbours);
    }

    public function shortestPathThroughAllNeighbours(array $visited = [], Vertex $lastVertex)
    {
        $shortest = PHP_INT_MAX;
        $visited[spl_object_hash($this)] = $this;

        if (empty(array_diff_key($this->neighbours, $visited))) {
            return $this->distanceToNeighbour($lastVertex);
        }

        foreach ($this->neighbours as $neighbour) {
            if (!in_array($neighbour, $visited)) {
                $distance =
                    $this->distanceToNeighbour($neighbour) +
                    $neighbour->shortestPathThroughAllNeighbours(array_merge($visited, [spl_object_hash($neighbour) => $neighbour]), $lastVertex);
                if ($distance < $shortest) $shortest = $distance;
            }
        }

        return $shortest;
    }
}
