<?php
declare(strict_types=1);

namespace AOC\Day6\Part1;

class Main
{
    public function run(string $input): string
    {
        $signals = explode(PHP_EOL, $input);
        $signals = array_filter($signals, function (string $signal): bool {
            return strlen($signal) > 0;
        });

        $characterCount = [];

        foreach ($signals as $signal) {
            for ($i = 0; $i < strlen($signal); $i++) {
                $char = $signal[$i];
                if (!isset($characterCount[$i][$char])) {
                    $characterCount[$i][$char] = 0;
                }
                $characterCount[$i][$char]++;
            }
        }

        $characterCount = array_map(function (array $counts): array {
            arsort($counts);
            return $counts;
        }, $characterCount);

        return array_reduce($characterCount, function (string $password, array $counts): string {
            return $password . array_keys($counts)[0];
        }, '');
    }
}
