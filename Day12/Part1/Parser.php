<?php
declare(strict_types=1);

namespace AOC\Day12\Part1;

class Parser
{
    public function parse(string $input): array
    {
        $cmd = substr($input, 0, 3);
        $data = substr($input, 4);

        switch ($cmd) {
            case 'cpy':
                return $this->parseCPY($data);
            case 'inc':
                return [Instruction::INC, $data];
            case 'dec':
                return [Instruction::DEC, $data];
            case 'jnz':
                return $this->parseJNZ($data);
        }
    }

    private function parseCPY(string $data): array
    {
        $matches = [];
        preg_match('/^(?P<src>\d+|[a-d]) (?P<dst>[a-d])$/', $data, $matches);
        return [Instruction::CPY, $matches['src'], $matches['dst']];
    }

    private function parseJNZ(string $data): array
    {
        $matches = [];
        preg_match('/^(?P<cmp>\d+|[a-d]) (?P<offset>-?\d+)$/', $data, $matches);
        return [Instruction::JNZ, $matches['cmp'], $matches['offset']];
    }
}
