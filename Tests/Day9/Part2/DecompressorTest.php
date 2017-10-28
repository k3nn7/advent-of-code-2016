<?php
declare(strict_types=1);

namespace AOC\Tests\Day9\Part2;

use AOC\Day9\Part2\Decompressor;

class DecompressorTest
{
    /**
     * @var Decompressor
     */
    private $decompressor;

    public function setUp()
    {
        $this->decompressor = new Decompressor();
    }

    /**
     * @dataProvider dataProvider
     */
    public function a_test_decompress(string $input, string $expectedLength): void
    {
        $output = $this->decompressor->decompress($input);

        $this->assertEquals($expectedLength, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'ADVENT',
                '$expectedLength' => 6
            ],
            [
                '$input' => 'A(1x5)BC',
                '$expectedOutput' => 7
            ],
            [
                '$input' => '(3x3)XYZ',
                '$expectedOutput' => 9
            ],
            [
                '$input' => 'A(2x2)BCD(2x2)EFG',
                '$expectedOutput' => 11
            ],
            [
                '$input' => '(6x1)(1x3)A',
                '$expectedOutput' => 3
            ],
            [
                '$input' => 'X(8x2)(3x3)ABCY',
                '$expectedOutput' => 20
            ],
            [
                '$input' => '(6x1)A(2x1)B',
                '$expectedOutput' => 2
            ],
            [
                '$input' => '(27x12)(20x12)(13x14)(7x10)(1x12)A',
                '$expectedLength' => 241920
            ],
            [
                '$input' => '(25x3)(3x3)ABC(2x3)XY(5x2)PQRSTX(18x9)(3x2)TWO(5x7)SEVEN',
                '$expectedLength' => 445
            ]
        ];
    }
}
