<?php
declare(strict_types=1);

namespace AOC\Day6\Part2;

class Main
{
    public function run(string $input): string
    {
        $signals = explode(PHP_EOL, $input);
        $signals = array_filter($signals, function (string $signal): bool {
            return strlen($signal) > 0;
        });

        $charactedCouts = [];

        foreach ($signals as $signal) {
            for ($i = 0; $i < strlen($signal); $i++) {
                $char = $signal[$i];
                if (!isset($charactedCouts[$i][$char])) {
                    $charactedCouts[$i][$char] = 0;
                }
                $charactedCouts[$i][$char]++;
            }
        }

        $charactedCouts = array_map(function (array $counts): array {
            asort($counts);
            return $counts;
        }, $charactedCouts);

        return array_reduce($charactedCouts, function (string $password, array $counts): string {
            return $password . array_keys($counts)[0];
        }, '');
    }
}
