<?php
declare(strict_types=1);

namespace AOC\Day12\Part1;

class Computer
{
    /**
     * @var int
     */
    private $pc = 0;
    /**
     * @var int
     */
    private $a = 0;
    /**
     * @var int
     */
    private $b = 0;
    /**
     * @var int
     */
    private $c = 0;
    /**
     * @var int
     */
    private $d = 0;
    /**
     * @var array
     */
    private $instructions = [];
    /**
     * @var Parser
     */
    private $parser;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function getProgramCounter(): int
    {
        return $this->pc;
    }

    public function getA(): int
    {
        return $this->a;
    }

    public function getB(): int
    {
        return $this->b;
    }

    public function getC(): int
    {
        return $this->c;
    }

    public function getD(): int
    {
        return $this->d;
    }

    public function loadProgram($code)
    {
        $lines = explode(PHP_EOL, $code);
        $lines = array_filter($lines, function (string $line): bool {
            return strlen($line) > 0;
        });

        $this->instructions = array_map([$this->parser, 'parse'], $lines);
    }

    public function run()
    {
        do {
            $this->handleInstruction(
                $this->instructions[$this->pc]
            );
        } while ($this->pc < count($this->instructions));
    }

    private function handleInstruction(array $instruction): void
    {
        switch ($instruction[0]) {
            case Instruction::CPY:
                $this->handleCPY($instruction);
                break;
            case Instruction::INC:
                $this->handleINC($instruction);
                break;
            case Instruction::DEC:
                $this->handleDEC($instruction);
                break;
            case Instruction::JNZ:
                $this->handleJNZ($instruction);
                break;
        }
    }

    private function handleCPY(array $instruction): void
    {
        $src = $instruction[1];
        if (!is_numeric($src)) {
            $src = $this->getRegister($src);
        }
        $this->setRegister($instruction[2], (int)$src);
        $this->pc++;
    }

    private function setRegister(string $register, int $value): void
    {
        switch ($register) {
            case 'a':
                $this->a = $value;
                break;
            case 'b':
                $this->b = $value;
                break;
            case 'c':
                $this->c = $value;
                break;
            case 'd':
                $this->d = $value;
                break;
        }
    }

    private function getRegister(string $register): int
    {
        switch ($register) {
            case 'a':
                return $this->a;
            case 'b':
                return $this->b;
            case 'c':
                return $this->c;
            case 'd':
                return $this->d;
        }
    }

    private function handleINC($instruction)
    {
        $this->setRegister(
            $instruction[1],
            $this->getRegister($instruction[1]) + 1
        );
        $this->pc++;
    }

    private function handleDEC($instruction)
    {
        $this->setRegister(
            $instruction[1],
            $this->getRegister($instruction[1]) - 1
        );
        $this->pc++;
    }

    private function handleJNZ($instruction)
    {
        $cmp = $instruction[1];
        if (!is_numeric($cmp)) {
            $cmp = $this->getRegister($cmp);
        }

        if ($cmp != 0) {
            $this->pc += $instruction[2];
        } else {
            $this->pc++;
        }
    }

    public function setC(int $value): void
    {
        $this->c = $value;
    }
}
