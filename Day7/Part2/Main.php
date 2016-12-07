<?php

namespace AOC\Day7\Part2;

class Main
{
    public function run(string $input): int
    {
        $inputLines = explode(PHP_EOL, $input);
        $inputLines = array_filter($inputLines, function (string $line): bool {
            return strlen($line) > 0;
        });

        return array_reduce($inputLines, function (int $tls, string $address): int {
            $ipv7 = new IPv7($address);
            if ($ipv7->supportsSsl()) {
                return ++$tls;
            }
            return $tls;
        }, 0);
    }
}
