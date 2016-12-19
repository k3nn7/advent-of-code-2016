<?php
declare(strict_types=1);

namespace AOC\Tests\Day9\Part1;

use AOC\Day9\Part1\Decompressor;

class DecompressorTest extends \PHPUnit_Framework_TestCase
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
    public function test_decompress(string $input, string $expectedOutput): void
    {
        $output = $this->decompressor->decompress($input);

        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => 'ADVENT',
                '$expectedOutput' => 'ADVENT'
            ],
            [
                '$input' => 'A(1x5)BC',
                '$expectedOutput' => 'ABBBBBC'
            ],
            [
                '$input' => '(3x3)XYZ',
                '$expectedOutput' => 'XYZXYZXYZ'
            ],
            [
                '$input' => 'A(2x2)BCD(2x2)EFG',
                '$expectedOutput' => 'ABCBCDEFEFG'
            ],
            [
                '$input' => '(6x1)(1x3)A',
                '$expectedOutput' => '(1x3)A'
            ],
            [
                '$input' => 'X(8x2)(3x3)ABCY',
                '$expectedOutput' => 'X(3x3)ABC(3x3)ABCY'
            ],
            [
                '$input' => '(6x1)A(2x1)B',
                '$expectedOutput' => 'A(2x1)B'
            ],
        ];
    }
}
