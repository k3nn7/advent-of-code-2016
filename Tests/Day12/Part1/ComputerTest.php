<?php
declare(strict_types=1);

namespace AOC\Day12\Part1;

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
        ];
    }
}
