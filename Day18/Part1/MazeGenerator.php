<?php
declare(strict_types=1);

namespace AOC\Day18\Part1;

class MazeGenerator
{
    public function generate(string $input, int $rows): string
    {
        $result = [$input];
        for ($i = 1; $i < $rows; $i++) {
           array_push(
                $result,
                $this->generateNextRow($result[$i - 1])
            );
        }

        return join(PHP_EOL, $result);
    }

    private function generateNextRow(string $row): string
    {
        $length = strlen($row);
        $nextRow = '';

        for ($i = 0; $i < $length; $i++) {
            if ($this->isTrap($i, $row)) {
                $nextRow .= '^';
            } else {
                $nextRow .= '.';
            }
        }

        return $nextRow;
    }

    private function isTrap(int $i, string $previousRow): bool
    {
        $L = $this->isLeftTrap($i, $previousRow);
        $C = $this->isCenterTrap($i, $previousRow);
        $R = $this->isRightTrap($i, $previousRow);

        if ($L && $C && !$R) return true;
        if ($C && $R && !$L) return true;
        if ($L && !$C && !$R) return true;
        if ($R && !$C && !$L) return true;

        return false;
    }

    private function isLeftTrap(int $i, string $row): bool
    {
        if ($i == 0) return false;
        return $row[$i - 1] == '^';
    }

    private function isRightTrap(int $i, string $row): bool
    {
        if ($i == strlen($row) - 1) return false;
        return $row[$i + 1] == '^';
    }

    private function isCenterTrap(int $i, string $row): bool
    {
        return $row[$i] == '^';
    }
}
