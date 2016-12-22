<?php
declare(strict_types=1);

namespace AOC\Tests\Day16\Part1;

use AOC\Day16\Part1\Hasher;

class HasherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Hasher
     */
    private $hasher;

    public function setUp()
    {
        $this->hasher = new Hasher();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_hash(string $input, string $expectedOutput): void
    {
        $output = $this->hasher->hash($input);
        $this->assertEquals($expectedOutput, $output);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => '10000011110010000111',
                '$expectedOutput' => '01100'
            ],
        ];
    }
}
