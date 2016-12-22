<?php
declare(strict_types=1);

namespace AOC\Day16\Part1;

class Hasher
{
    public function hash(string $input): string
    {
        $result = $input;
        do {
            $result = strtr($result, ['00' => '1', '11' => '1', '01' => '0', '10' => '0']);
        } while ((strlen($result) % 2) === 0);
        return $result;
    }
}
