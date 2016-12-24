<?php
declare(strict_types=1);

namespace AOC\Day21\Part1;

class OperationHandler
{

    public function handle(array $operation, string $input): string
    {
        switch ($operation[0]) {
            case Operation::SWAP_POSITION:
                return $this->swapPosition($operation, $input);
            case Operation::SWAP_LETTER:
                return strtr($input, [$operation[1] => $operation[2], $operation[2] => $operation[1]]);
            case Operation::REVERSE:
                return $this->reverse($operation, $input);
            case Operation::ROTATE_LEFT:
                return $this->rotateLeft($operation, $input);
            case Operation::ROTATE_RIGHT:
                return $this->rotateRight($operation, $input);
            case Operation::MOVE:
                return $this->move($operation, $input);
            case Operation::ROTATE_BASED:
                $index = strpos($input, $operation[1]);
                $rotations = 1 + $index;
                if ($index >= 4) $rotations++;
                return $this->rotateRight([Operation::ROTATE_RIGHT, $rotations], $input);

        }
    }

    private function swapPosition(array $operation, string $input): string
    {
        $tmp = $input[$operation[1]];
        $input[$operation[1]] = $input[$operation[2]];
        $input[$operation[2]] = $tmp;
        return $input;
    }

    private function reverse(array $operation, string $input): string
    {
        $start = $operation[1];
        $length = $operation[2] - $start + 1;
        $toReverse = substr($input, $start, $length);
        $reversed = strrev($toReverse);
        return substr_replace($input, $reversed, $start, $length);
    }

    private function rotateLeft(array $operation, string $input): string
    {
        for ($i = 0; $i < $operation[1]; $i++) {
            $input = substr($input, 1) . $input[0];
        }
        return $input;
    }

    private function rotateRight(array $operation, string $input): string
    {
        $length = strlen($input);
        for ($i = 0; $i < $operation[1]; $i++) {
            $input = $input[$length - 1] . substr($input, 0, $length - 1);
        }
        return $input;
    }

    private function move(array $operation, string $input): string
    {
        $result = '';
        $length = strlen($input);
        for ($srcI = 0, $dstI = 0; $srcI < $length || $dstI < $length;) {
            if ($srcI == $operation[1]) {
                $srcI++;
            } elseif ($dstI == $operation[2]) {
                $dstI++;
                $result .= $input[$operation[1]];
            } else {
                $result .= $input[$srcI];
                $srcI++;
                $dstI++;
            }
        }
        return $result;
    }
}
