<?php

namespace AOC\Day23\Part2;

use AOC\Day23\Part1\Computer;

class Main
{
    /**
     * @var Computer
     */
    private $computer;

    public function __construct()
    {
        $this->computer = new Computer();
        $this->computer->setA(12);
    }

    public function run(string $input): int
    {
        $this->computer->loadProgram($input);
        $this->computer->run();
        return $this->computer->getA();
    }
}
