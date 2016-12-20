<?php
declare(strict_types=1);

namespace AOC\Tests\Day13\Part1;

use AOC\Day13\Part1\Vertex;

class VertexTest extends \PHPUnit_Framework_TestCase
{
    public function test_link()
    {
        $a = new Vertex();
        $b = new Vertex();
        $c = new Vertex();

        $a->linkTo($b, 3);
        $c->linkTo($b, 2);

        $this->assertTrue($a->isLinkedTo($b));
        $this->assertTrue($b->isLinkedTo($a));

        $this->assertFalse($a->isLinkedTo($c));
        $this->assertFalse($c->isLinkedTo($a));
    }

    public function test_distanceTo()
    {
        $a = new Vertex();
        $b = new Vertex();
        $c = new Vertex();
        $d = new Vertex();
        $e = new Vertex();

        $a->linkTo($b, 5);
        $a->linkTo($c, 8);
        $b->linkTo($d, 10);
        $c->linkTo($d, 1);

        $this->assertEquals(0, $a->distanceTo($a));
        $this->assertEquals(PHP_INT_MAX, $a->distanceTo($e));

        $this->assertEquals(5, $a->distanceTo($b));
        $this->assertEquals($a->distanceTo($b), $b->distanceTo($a));

        $this->assertEquals(9, $a->distanceTo($d));
    }
}
