<?php
declare(strict_types=1);

namespace AOC\Tests\Day7\Part2;

use AOC\Day7\Part2\IPv7;

class IPv7Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_parse_address(
        string $address,
        array $addressSequences,
        array $hypernetSequences,
        bool $supportsSsl
    ) {
        $ipv7 = new IPv7($address);

        $this->assertEquals($addressSequences, $ipv7->getAddressSequences());
        $this->assertEquals($hypernetSequences, $ipv7->getHypernetSequences());
        $this->assertEquals($supportsSsl, $ipv7->supportsSsl());
    }

    public function dataProvider(): array
    {
        return [
            [
                '$address' => 'foo[bar]baz[zab]xyz[oof]boo',
                '$addressSequences' => ['foo', 'baz', 'xyz', 'boo'],
                '$hypernetSequences' => ['bar', 'zab', 'oof'],
                '$supportsSsl' => false,
            ],
            [
                '$address' => 'aba[bab]xyz',
                '$addressSequences' => ['aba', 'xyz'],
                '$hypernetSequences' => ['bab'],
                '$supportsSsl' => true,
            ],
            [
                '$address' => 'xyx[xyx]xyx',
                '$addressSequences' => ['xyx', 'xyx'],
                '$hypernetSequences' => ['xyx'],
                '$supportsSsl' => false,
            ],
            [
                '$address' => 'aaa[kek]eke',
                '$addressSequences' => ['aaa', 'eke'],
                '$hypernetSequences' => ['kek'],
                '$supportsSsl' => true,
            ],
            [
                '$address' => 'zazbz[bzb]cdb',
                '$addressSequences' => ['zazbz', 'cdb'],
                '$hypernetSequences' => ['bzb'],
                '$supportsSsl' => true,
            ],
        ];
    }
}
