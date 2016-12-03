<?php
declare(strict_types=1);

namespace AOC\Day3\Part2;

class Parser
{
    public function parse(string $input)
    {
        $inputSets = $this->splitSets($input);
        $inputSets = $this->filterOutEmptySets($inputSets);
        $inputSets = $this->cleanWhitespaces($inputSets);
        $values = $this->splitValues($inputSets);

        $c0 = array_column($values, 0);
        $c1 = array_column($values, 1);
        $c2 = array_column($values, 2);

        $joinedColumns = array_merge($c0, $c1, $c2);
        return array_chunk($joinedColumns, 3);
    }

    private function splitSets(string $input): array
    {
        return explode("\n", $input);
    }

    private function filterOutEmptySets(array $inputSets): array
    {
        return array_filter($inputSets, function (string $set): bool {
            return strlen($set) > 0;
        });
    }

    private function cleanWhitespaces(array $inputSets): array
    {
        return array_map(function (string $set): string {
            return trim($set);
        }, $inputSets);
    }

    private function splitValues(array $inputSets): array
    {
        return array_map(function (string $set): array {
            $values = preg_split('/\s+/', $set);
            return array_map(function (string $value): int {
                return (int)$value;
            }, $values);
        }, $inputSets);
    }
}
