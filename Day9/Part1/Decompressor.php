<?php
declare(strict_types=1);

namespace AOC\Day9\Part1;

class Decompressor
{
    public function decompress($input)
    {
        $length = strlen($input);
        $cursor = 0;
        $result = '';

        while ($cursor < $length) {
            if ($input[$cursor] === '(') {
                list($newResult, $newCursor) = $this->processMarkedData($input, $cursor, $result);
                $result = $newResult;
                $cursor = $newCursor;
            } else {
                $result .= $input[$cursor];
                $cursor++;
            }
        }
        return $result;
    }

    private function extractCommand(string $command): array
    {
        $matches = [];
        preg_match('/^\((\d+)x(\d+)\)/', $command, $matches);
        $matches = array_slice($matches, 1);
        return [(int)$matches[0], (int)$matches[1]];
    }

    private function processMarkedData($input, $cursor, $result)
    {
        $subInput = substr($input, $cursor);
        $command = $this->extractCommand($subInput);
        $newCursor = strpos($subInput, ')') + 1;
        $subInput = substr($subInput, $newCursor);

        $newCursor = $newCursor + $command[0] + $cursor;

        $newResult = $result . str_repeat(substr($subInput, 0, $command[0]), $command[1]);

        return [$newResult, $newCursor];
    }
}
