<?php

namespace AOC\Day23\Part1;

class Main
{
    /**
     * @var Computer
     */
    private $computer;

    public function __construct()
    {
        $this->computer = new Computer();
        $this->computer->setA(7);
    }

    public function run(string $input): int
    {
        $this->computer->loadProgram($input);
        $this->computer->run();
        return $this->computer->getA();
    }
}
