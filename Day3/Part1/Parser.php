<?php
declare(strict_types=1);

namespace AOC\Day3\Part1;

class Parser
{
    public function parse(string $input)
    {
        $inputSets = $this->splitSets($input);
        $inputSets = $this->filterOutEmptySets($inputSets);
        $inputSets = $this->cleanWhitespaces($inputSets);
        return $this->splitValues($inputSets);
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
            $values = explode('  ', $set);
            return array_map(function (string $value): int {
                return (int)$value;
            }, $values);
        }, $inputSets);
    }
}
