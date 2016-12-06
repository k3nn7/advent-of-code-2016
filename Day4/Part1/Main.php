<?php
declare(strict_types=1);

namespace AOC\Day4\Part1;

class Main
{
    public function __construct()
    {
    }

    public function run(string $input): int
    {
        $lines = explode(PHP_EOL, $input);
        $lines = array_filter($lines, function (string $line): bool {
            return strlen($line) > 0;
        });

        $roomNames = array_map(function (string $line): RoomName {
            return new RoomName($line);
        }, $lines);

        $realRooms = array_filter($roomNames, function (RoomName $roomName): bool {
            return $roomName->isReal();
        });

        return array_reduce($realRooms, function (int $sum, RoomName $roomName): int {
            return $sum + $roomName->getId();
        }, 0);
    }
}
