<?php
declare(strict_types=1);

namespace AOC\Tests\Day23\Part1;

use AOC\Day23\Part1\Computer;

class ComputerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Computer
     */
    private $computer;

    public function setUp()
    {
        $this->computer = new Computer();
    }

    public function test_initial_state()
    {
        $this->assertEquals(0, $this->computer->getProgramCounter());
        $this->assertEquals(0, $this->computer->getA());
        $this->assertEquals(0, $this->computer->getB());
        $this->assertEquals(0, $this->computer->getC());
        $this->assertEquals(0, $this->computer->getD());
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_loadCode_and_run(string $code, int $a, int $b, int $c, int $d)
    {
        $this->computer->loadProgram($code);
        $this->computer->run();

        $this->assertEquals($a, $this->computer->getA());
        $this->assertEquals($b, $this->computer->getB());
        $this->assertEquals($c, $this->computer->getC());
        $this->assertEquals($d, $this->computer->getD());
    }

    public function dataProvider(): array
    {
        return [
            [
                '$code' => "cpy 5 a\n",
                '$a' => 5,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 5 a\ncpy a b\n",
                '$a' => 5,
                '$b' => 5,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 5 a\ninc a\n",
                '$a' => 6,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 5 a\ndec a\n",
                '$a' => 4,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "jnz 1 2\ninc a\ninc a\n",
                '$a' => 1,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "jnz 0 2\ninc a\ninc a\n",
                '$a' => 2,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "inc a\njnz a 2\ninc a\ninc a\n",
                '$a' => 2,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 1 a\ntgl a\ninc a\n",
                '$a' => 0,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 1 a\ntgl a\ndec a\n",
                '$a' => 2,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 1 a\ntgl a\njnz 8 a\n",
                '$a' => 8,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 1 a\ntgl a\ncpy a 2\ninc b\ninc b\n",
                '$a' => 1,
                '$b' => 1,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "tgl 2\ninc a\n",
                '$a' => 1,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "tgl 1\njnz 1 2\ninc a\n",
                '$a' => 1,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "tgl 1\ntgl a\n",
                '$a' => 1,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
            [
                '$code' => "cpy 5 a\ncpy 2 b\ncpy 3 c\nnop\nmul a b c\n",
                '$a' => 11,
                '$b' => 0,
                '$c' => 0,
                '$d' => 0,
            ],
        ];
    }
}
