<?php
declare(strict_types=1);

namespace AOC\Day23\Part1;

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
            case 'tgl':
                return [Instruction::TGL, $data];
            case 'mul':
                return $this->parseMUL($data);
            case 'nop':
                return [Instruction::NOP];
        }
    }

    private function parseCPY(string $data): array
    {
        $matches = [];
        preg_match('/^(?P<src>\-?\d+|[a-d]) (?P<dst>\-?\d+|[a-d])$/', $data, $matches);
        return [Instruction::CPY, $matches['src'], $matches['dst']];
    }

    private function parseJNZ(string $data): array
    {
        $matches = [];
        preg_match('/^(?P<cmp>\-?\d+|[a-d]) (?P<offset>\-?\d+|[a-d])$/', $data, $matches);
        return [Instruction::JNZ, $matches['cmp'], $matches['offset']];
    }

    private function parseMUL(string $data): array
    {
        $matches = [];
        preg_match('/^(?P<a>\-?\d+|[a-d]) (?P<b>\-?\d+|[a-d]) (?P<c>\-?\d+|[a-d])$/', $data, $matches);
        return [Instruction::MUL, $matches['a'], $matches['b'], $matches['c']];
    }
}
