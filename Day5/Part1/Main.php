<?php

namespace AOC\Day5\Part1;

class Main
{
    public function run(string $input): string
    {
        $password = '';
        $i = 0;
        $passwordLength = 0;

        while ($passwordLength < 8) {
            $hash = md5(sprintf('%s%d', $input, $i));
            if (strcmp(substr($hash, 0, 5), '00000') === 0) {
                $password .= $hash[5];
                $passwordLength++;
                echo sprintf('Found %d character: %s'.PHP_EOL, $passwordLength, $hash[5]);
            }
            $i++;
        }

        return $password;
    }
}
