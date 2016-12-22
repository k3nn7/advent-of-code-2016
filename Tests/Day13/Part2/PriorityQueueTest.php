<?php
declare(strict_types=1);

namespace AOC\Tests\Day13\Part2;

use AOC\Day13\Part1\Vertex;
use AOC\Day13\Part2\PriorityQueue;

class PriorityQueueTest extends \PHPUnit_Framework_TestCase
{
    public function test_insert_and_extract()
    {
        $queue = new PriorityQueue();

        $v1 = new Vertex('.');
        $v2 = new Vertex('#');

        $queue->insert($v1, 3);
        $queue->insert($v2, 1);

        $item = $queue->extract();
        $this->assertEquals($v2, $item);
    }
}
