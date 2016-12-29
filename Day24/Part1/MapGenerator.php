<?php
declare(strict_types=1);

namespace AOC\Day24\Part1;

use AOC\Day13\Part1\Vertex;
use AOC\Day13\Part2\Dijkstra;

class MapGenerator
{
    /**
     * @var Dijkstra
     */
    private $dijkstra;

    public function __construct()
    {
        $this->dijkstra = new Dijkstra();
    }

    /**
     * @param string $input
     * @return Vertex[]
     */
    public function buildGraph(string $input): array
    {
        $vertices = [];
        $inputRows = explode("\n", $input);
        $inputRows = array_filter($inputRows, function (string $row): bool {
            return strlen($row) > 0;
        });

        $height = count($inputRows);
        $width = strlen($inputRows[0]);

        for ($i = 0; $i < $height; $i++) {
            $inputRow = $inputRows[$i];
            for ($j = 0; $j < $width; $j++) {
                $currentIndex = $i * $width+ $j;
                $item = $inputRow[$j];

                if ($item != '#') {
                    $v = new Vertex($item);

                    if ($j > 0 && $inputRow[$j - 1] != '#') {
                        $v->linkTo($vertices[$currentIndex - 1], 1);
                    }

                    if ($j > 0 && $inputRows[$i - 1][$j] != '#') {
                        $v->linkTo($vertices[$currentIndex - $width], 1);
                    }

                    array_push($vertices, $v);
                } else {
                    array_push($vertices, new Vertex('#'));
                }
            }
        }

        $r = array_values(array_filter($vertices, function (Vertex $v): bool {
            return $v->getName() != '#';
        }));

        return $r;
    }

    /**
     * @param string $input
     * @return Vertex[]
     */
    public function buildSimpleGraph(string $input): array
    {
        $vertices = $this->buildGraph($input);
        $keyVertices = array_reduce($vertices, function (array $keyVertices, Vertex $vertex): array {
            if ($vertex->getName() != '.') array_push($keyVertices, $vertex);
            return $keyVertices;
        }, []);
        $simpleGraph = [];

        array_walk($vertices, function (Vertex $v) {
            $this->dijkstra->addVertices($v);
        });

        foreach ($keyVertices as $fromVertex) {
            $distances = $this->dijkstra->calculateDistancesFrom($fromVertex);

            if (!isset($simpleGraph[$fromVertex->getName()])) {
                $simpleGraph[$fromVertex->getName()] = new Vertex($fromVertex->getName());
            }

            $fromVertexSimple = $simpleGraph[$fromVertex->getName()];

            foreach ($distances as $toVertexHash => $distance) {
                $toVertex = $this->dijkstra->getVertexByHash($toVertexHash);
                if ($toVertex !== $fromVertex && in_array($toVertex, $keyVertices, true)) {

                    if (!isset($simpleGraph[$toVertex->getName()])) {
                        $simpleGraph[$toVertex->getName()] = new Vertex($toVertex->getName());
                    }
                    $toVertexSimple = $simpleGraph[$toVertex->getName()];

                    $fromVertexSimple->linkTo($toVertexSimple, $distance);

                }
            }
        }

        return array_values($simpleGraph);
    }
}
