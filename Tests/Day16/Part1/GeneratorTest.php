<?php
declare(strict_types=1);

namespace AOC\Tests\Day16\Part1;

use AOC\Day16\Part1\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Generator
     */
    private $generator;

    public function setUp()
    {
        $this->generator = new Generator();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_generate(string $input, int $minLength, string $expectedOutput): void
    {
        $result = $this->generator->generator($input, $minLength);

        $this->assertEquals($expectedOutput, $result);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => '10000',
                '$minLength' => 20,
                '$expectedOutput' => '10000011110010000111110',
            ],
            [
                '$input' => '1',
                '$minLength' => 3,
                '$expectedOutput' => '100',
            ],
            [
                '$input' => '0',
                '$minLength' => 3,
                '$expectedOutput' => '001',
            ],
        ];
    }
}
