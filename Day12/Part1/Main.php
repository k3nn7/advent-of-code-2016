<?php

namespace AOC\Day12\Part1;

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
        $this->computer->run();
        return $this->computer->getA();
    }
}
