<?php
declare(strict_types=1);

namespace AOC\Tests\Day3\Part1;

use AOC\Day3\Part1\Triangle;

class TriangleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validTriangles
     */
    public function test_create_valid_triangle(array $sides)
    {
        new Triangle(...$sides);
    }

    /**
     * @dataProvider invalidTriangles
     * @expectedException \InvalidArgumentException
     */
    public function test_create_invalid_triangle(array $sides)
    {
        new Triangle(...$sides);
    }

    public function validTriangles()
    {
        return [
            ['$sides' => [1, 1, 1]],
            ['$sides' => [10, 15, 20]],
        ];
   }

    public function invalidTriangles()
    {
        return [
            ['$sides' => [5, 10, 25]],
            ['$sides' => [25, 10, 5]],
            ['$sides' => [10, 25, 5]],
        ];
    }
}
