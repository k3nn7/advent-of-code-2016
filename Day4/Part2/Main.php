<?php

namespace AOC\Day4\Part2;

class Main
{

    public function run(string $input): array
    {
        $inputs = explode(PHP_EOL, $input);
        $inputs = array_filter($inputs, function (string $input) {
            return strlen($input) > 0;
        });

        return array_map(function (string $input) {
            $room = new RoomName($input);
            return $room->encrypt();
        }, $inputs);
    }
}
