<?php

namespace AOC\Day5\Part2;

class Main
{
    public function run(string $input): string
    {
        $password = '________';
        $i = 0;
        $passwordLength = 0;

        while (strpos($password, '_') !== FALSE) {
            $hash = md5(sprintf('%s%d', $input, $i));
            if (strcmp(substr($hash, 0, 5), '00000') === 0) {
                $pos = $hash[5];
                if (is_numeric($pos) && (int)$pos < 8) {
                    $password[$pos] = $hash[6];
                    $passwordLength++;
                    echo sprintf('Found %d character: %s'.PHP_EOL, $pos, $hash[6]);
                }
            }
            $i++;
        }

        return $password;
    }
}
