<?php
declare(strict_types=1);

namespace AOC\Day13\Part1;

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
    }

    public function run(int $x, int $y): int
    {
        for ($i = 1; $i <= 50; $i++) {
            $this->mazeVertices[$i] = [];
            for ($j = 1; $j <= 50; $j++) {
                $type = $this->mazeGenerator->generateElement($i, $j);
                $v = new Vertex($type);
                
                if ($type === '.') {
                    $this->connectToNeighbourOpenSpaces($v, $i, $j, $x, $y);
                }

                $this->mazeVertices[$i][$j] = $v;
            }
        }

        return $this->mazeVertices[1][1]->distanceTo($this->mazeVertices[$x][$y]);
    }

    private function connectToNeighbourOpenSpaces(Vertex $v, int $x, int $y, int $maxX, int $maxY): void
    {
        if ($x > 1) {
            $this->connectToNeighbour($v, $x - 1, $y);
        }
        if ($x < $maxX) {
            $this->connectToNeighbour($v, $x + 1, $y);
        }
        if ($y > 1) {
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
        if ($neighbour->getType() === '.') {
            $v->linkTo($neighbour, 1);
        }
    }
}
