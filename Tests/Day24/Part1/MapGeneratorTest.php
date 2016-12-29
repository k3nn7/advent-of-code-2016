<?php
declare(strict_types=1);

namespace AOC\Tests\Day24\Part1;

use AOC\Day13\Part1\Vertex;
use AOC\Day24\Part1\MapGenerator;

class MapGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MapGenerator
     */
    private $generator;

    public function setUp()
    {
        $this->generator = new MapGenerator();
    }

    public function test_buildGraph()
    {
        $input = $this->graphInput();
        $expectedGraph = $this->expectedGraph();

        $graph = $this->generator->buildGraph($input);

        $this->assertEquals(count($expectedGraph), count($graph));
        for ($i = 0; $i < count($expectedGraph); $i++) {
            $this->assertEquals(
                count($expectedGraph[$i]->getNeighbours()),
                count($graph[$i]->getNeighbours()),
                'For neighbour '. $i
            );
        }
    }

    public function test_buildSimpleGraph()
    {
        $input = $this->graphInput();

        $graph = $this->generator->buildSimpleGraph($input);

        $this->assertCount(3, $graph);

        $this->assertEquals(
            [$graph[1], $graph[2]],
            $graph[0]->getNeighbours()
        );
        $this->assertEquals(
            [$graph[0], $graph[2]],
            $graph[1]->getNeighbours()
        );
        $this->assertEquals(
            [$graph[0], $graph[1]],
            $graph[2]->getNeighbours()
        );

        $this->assertEquals(
            2,
            $graph[0]->distanceToNeighbour($graph[1])
        );

        $this->assertEquals(
            4,
            $graph[0]->distanceToNeighbour($graph[2])
        );
    }

    private function graphInput(): string
    {
        return <<<HEREDOC
#####
#0..#
#.#.#
#1.2#
#####
HEREDOC;
    }

    private function expectedGraph(): array
    {
        $vertices = [
            new Vertex('0'),
            new Vertex('.'),
            new Vertex('.'),
            new Vertex('.'),
            new Vertex('.'),
            new Vertex('.'),
            new Vertex('.'),
            new Vertex('1')
        ];

        $vertices[0]->linkTo($vertices[1], 1);
        $vertices[0]->linkTo($vertices[3], 1);

        $vertices[1]->linkTo($vertices[2], 1);

        $vertices[2]->linkTo($vertices[4], 1);

        $vertices[3]->linkTo($vertices[5], 1);

        $vertices[4]->linkTo($vertices[7], 1);

        $vertices[5]->linkTo($vertices[6], 1);

        $vertices[6]->linkTo($vertices[7], 1);
        return $vertices;
    }
}
