<?php
declare(strict_types=1);

namespace AOC\Tests\Day7\Part1;

use AOC\Day7\Part1\IPv7;

class IPv7Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_parse_address(
        string $address,
        array $addressSequences,
        array $hypernetSequences,
        bool $supportsTls
    ) {
        $ipv7 = new IPv7($address);

        $this->assertEquals($addressSequences, $ipv7->getAddressSequences());
        $this->assertEquals($hypernetSequences, $ipv7->getHypernetSequences());
        $this->assertEquals($supportsTls, $ipv7->supportsTls());
    }

    public function dataProvider(): array
    {
        return [
            [
                '$address' => 'foo[bar]baz[zab]xyz[oof]boo',
                '$addressSequences' => ['foo', 'baz', 'xyz', 'boo'],
                '$hypernetSequences' => ['bar', 'zab', 'oof'],
                '$supportsTls' => false,
            ],
            [
                '$address' => 'abba[mnop]qrst',
                '$addressSequences' => ['abba', 'qrst'],
                '$hypernetSequences' => ['mnop'],
                '$supportsTls' => true,
            ],
            [
                '$address' => 'ioxxoj[asdfgh]zxcvbn',
                '$addressSequences' => ['ioxxoj', 'zxcvbn'],
                '$hypernetSequences' => ['asdfgh'],
                '$supportsTls' => true,
            ],
            [
                '$address' => 'abcd[bddb]xyyx',
                '$addressSequences' => ['abcd', 'xyyx'],
                '$hypernetSequences' => ['bddb'],
                '$supportsTls' => false,
            ],
            [
                '$address' => 'aaaa[qwer]tyui',
                '$addressSequences' => ['aaaa', 'tyui'],
                '$hypernetSequences' => ['qwer'],
                '$supportsTls' => false,
            ],
        ];
    }
}
