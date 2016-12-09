<?php
declare(strict_types=1);

namespace AOC\Tests\Day8\Part1;

use AOC\Day8\Part1\Display;

class DisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Display
     */
    private $display;

    public function setUp()
    {
        $this->display = new Display(4, 3);
    }


    public function test_all_pixels_off_at_beginning()
    {
        $expectedContent = "....\n....\n....\n";

        $content = $this->display->getContent();

        $this->assertEquals($expectedContent, $content);
    }

    /**
     * @dataProvider rectDataProvider
     */
    public function test_turn_on_rect(int $x, int $y, string $expectedContent): void
    {
        $this->display->rect($x, $y);
        $content = $this->display->getContent();

        $this->assertEquals($expectedContent, $content);
    }

    /**
     * @dataProvider rotateColumnDataProvider
     */
    public function test_rotate_column(int $x, int $by, string $expectedContent): void
    {
        $this->display->rect(2, 2);
        $this->display->rotateColumn($x, $by);
        $content = $this->display->getContent();

        $this->assertEquals($expectedContent, $content);
    }

    /**
     * @dataProvider rotateRowDataProvider
     */
    public function test_rotate_row(int $y, int $by, string $expectedContent): void
    {
        $this->display->rect(2, 2);
        $this->display->rotateRow($y, $by);
        $content = $this->display->getContent();

        $this->assertEquals($expectedContent, $content);
    }

    public function test_lit_count(): void
    {
        $this->display->rect(2, 2);

        $this->assertEquals(4, $this->display->litCount());
    }

    public function rectDataProvider(): array
    {
        return [
            [
                '$x' => 2,
                '$y' => 2,
                '$expectedContent' => "##..\n##..\n....\n"
            ],
            [
                '$x' => 3,
                '$y' => 2,
                '$expectedContent' => "###.\n###.\n....\n"
            ],
            [
                '$x' => 0,
                '$y' => 0,
                '$expectedContent' => "....\n....\n....\n"
            ],
        ];
    }

    public function rotateColumnDataProvider(): array
    {
       return [
           [
               '$x' => 0,
               '$by' => 1,
               '$expectedContent' => ".#..\n##..\n#...\n"
           ],
           [
               '$x' => 0,
               '$by' => 2,
               '$expectedContent' => "##..\n.#..\n#...\n"
           ],
           [
               '$x' => 1,
               '$by' => 2,
               '$expectedContent' => "##..\n#...\n.#..\n"
           ],
           [
               '$x' => 2,
               '$by' => 2,
               '$expectedContent' => "##..\n##..\n....\n"
           ],
       ];
    }

    public function rotateRowDataProvider(): array
    {
        return [
            [
                '$y' => 0,
                '$by' => 1,
                '$expectedContent' => ".##.\n##..\n....\n"
            ],
            [
                '$y' => 0,
                '$by' => 3,
                '$expectedContent' => "#..#\n##..\n....\n"
            ],
        ];
    }
}
