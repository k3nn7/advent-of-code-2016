<?php
declare(strict_types=1);

namespace AOC\Tests\Day1\Part1;

use AOC\Day1\Part1\Coordinates;

class CoordinatesTest extends \PHPUnit_Framework_TestCase
{
    public function test_has_valid_x_and_y_parameters()
    {
        $x = 10;
        $y = 11;

        $coordinates = new Coordinates($x, $y);

        $this->assertEquals($x, $coordinates->getX());
        $this->assertEquals($y, $coordinates->getY());
    }

    /**
     * @dataProvider coordinatesWithDistance
     */
    public function test_distance_between_coordinates(
        Coordinates $c1,
        Coordinates $c2,
        int $expectedDistance
    ) {
        $this->assertEquals(
            $expectedDistance,
            $c1->distanceTo($c2)
        );
    }

    /**
     * @dataProvider coordinatesWithDistance
     */
    public function test_distanceTo_commutativity(
        Coordinates $c1,
        Coordinates $c2
    ) {
        $this->assertEquals(
            $c1->distanceTo($c2),
            $c2->distanceTo($c1)
        );
    }

    /**
     * @dataProvider coordinatesWithSums
     */
    public function test_add_two_coordinates(
        Coordinates $c1,
        Coordinates $c2,
        Coordinates $expectedSum
    ) {
        $this->assertEquals(
            $expectedSum,
            $c1->add($c2)
        );
    }

    /**
     * @dataProvider coordinatesWithSums
     */
    public function test_add_commutativity(
        Coordinates $c1,
        Coordinates $c2
    ) {
        $this->assertEquals(
            $c1->add($c2),
            $c2->add($c1)
        );
    }

    public function coordinatesWithDistance()
    {
        return [
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(1, 0),
                '$expectedDistance' => 1
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(-1, 0),
                '$expectedDistance' => 1
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(-1, 1),
                '$expectedDistance' => 2
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(1, 1),
                '$expectedDistance' => 2
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(2, 3),
                '$expectedDistance' => 5
            ],
            [
                '$c1' => new Coordinates(-5, 3),
                '$c2' => new Coordinates(5, 2),
                '$expectedDistance' => 11
            ],
        ];
    }

    public function coordinatesWithSums()
    {
        return [
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(1, 0),
                '$expectedSum' => new Coordinates(1, 0)
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(-1, 0),
                '$expectedSum' => new Coordinates(-1, 0)
            ],
            [
                '$c1' => new Coordinates(2, -4),
                '$c2' => new Coordinates(-5, 8),
                '$expectedSum' => new Coordinates(-3, 4)
            ],
            [
                '$c1' => new Coordinates(0, 0),
                '$c2' => new Coordinates(1, 0),
                '$expectedSum' => new Coordinates(1, 0)
            ],
        ];
    }
}
