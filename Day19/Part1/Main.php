<?php
declare(strict_types=1);

namespace AOC\Day19\Part1;

class Main
{
    public function run(int $input): int
    {
        $elves = array_fill(0, $input, 1);
        $elfThatSteals = null;
        while (true) {
            foreach ($elves as $i => $presents) {
                if ($elves[$i] == $input) return $i + 1;

                if (!is_null($elfThatSteals) && $elves[$i] > 0) {
                    $elves[$elfThatSteals] += $elves[$i];
                    unset($elves[$i]);
                    $elfThatSteals = null;
                } elseif ($presents > 0) {
                    $elfThatSteals = $i;
                }
            }
        }
    }
}
