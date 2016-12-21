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

    public function getType(): string
    {
        return $this->type;
    }
}
