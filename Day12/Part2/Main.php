<?php

namespace AOC\Day12\Part2;

use AOC\Day12\Part1\Computer;

class Main
{
    /**
     * @var Computer
     */
    private $computer;

    public function __construct()
    {
        $this->computer = new Computer();
    }

    public function run(string $input): int
    {
        $this->computer->loadProgram($input);
        $this->computer->setC(1);
        $this->computer->run();
        return $this->computer->getA();
    }
}
