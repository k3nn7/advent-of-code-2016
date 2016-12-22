<?php
declare(strict_types=1);

namespace AOC\Tests\Day13\Part2;

use AOC\Day13\Part1\Vertex;
use AOC\Day13\Part2\Dijkstra;

class DijkstraTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dijkstra
     */
    private $dijkstra;

    public function setUp()
    {
        $this->dijkstra = new Dijkstra();
    }

    public function test_findDistancesFromVertex()
    {
        $a = new Vertex('a');
        $b = new Vertex('b');
        $c = new Vertex('c');
        $d = new Vertex('d');
        $e = new Vertex('e');

        $a->linkTo($b, 3);
        $a->linkTo($c, 8);
        $b->linkTo($e, 5);
        $b->linkTo($d, 10);
        $c->linkTo($d, 4);

        $expectedDistances = [
            spl_object_hash($a) => 0,
            spl_object_hash($b) => 3,
            spl_object_hash($c) => 8,
            spl_object_hash($d) => 12,
            spl_object_hash($e) => 8
        ];

        $this->dijkstra->addVertices($a, $b, $c, $d, $e);

        $distances = $this->dijkstra->calculateDistancesFrom($a);
        $this->assertEquals($expectedDistances, $distances);
    }
}
