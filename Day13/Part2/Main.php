<?php
declare(strict_types=1);

namespace AOC\Day13\Part2;

use AOC\Day13\Part1\MazeGenerator;
use AOC\Day13\Part1\Vertex;

class Main
{
    /**
     * @var MazeGenerator
     */
    private $mazeGenerator;

    /**
     * @var Vertex[][]
     */
    private $mazeVertices = [];

    public function __construct(int $favouriteNumber)
    {
        $this->mazeGenerator = new MazeGenerator($favouriteNumber);
        $this->dijkstra = new Dijkstra();
    }

    public function run(int $x, int $y): int
    {
        for ($i = 0; $i <= $x; $i++) {
            $this->mazeVertices[$i] = [];
            for ($j = 0; $j <= $y; $j++) {
                $type = $this->mazeGenerator->generateElement($i, $j);
                $v = new Vertex($type);
                
                if ($type === '.') {
                    $this->connectToNeighbourOpenSpaces($v, $i, $j, $x, $y);
                }

                $this->mazeVertices[$i][$j] = $v;
                $this->dijkstra->addVertices($v);
            }
        }

        $distances = $this->dijkstra->calculateDistancesFrom($this->mazeVertices[1][1]);

        $distancesBelow50 = array_filter($distances, function (int $distance): bool {
            return $distance <= 50;
        });

        return count($distancesBelow50);
    }

    private function connectToNeighbourOpenSpaces(Vertex $v, int $x, int $y, int $maxX, int $maxY): void
    {
        if ($x > 0) {
            $this->connectToNeighbour($v, $x - 1, $y);
        }
        if ($x < $maxX) {
            $this->connectToNeighbour($v, $x + 1, $y);
        }
        if ($y > 0) {
            $this->connectToNeighbour($v, $x, $y - 1);
        }
        if ($y < $maxY) {
            $this->connectToNeighbour($v, $x, $y + 1);
        }
    }

    private function connectToNeighbour(Vertex $v, int $x, int $y): void
    {
        if (!isset($this->mazeVertices[$x])) return;
        if (!isset($this->mazeVertices[$x][$y])) return;

        $neighbour = $this->mazeVertices[$x][$y];
        if ($neighbour->getName() === '.') {
            $v->linkTo($neighbour, 1);
        }
    }
}
