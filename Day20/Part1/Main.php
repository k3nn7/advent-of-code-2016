<?php
declare(strict_types=1);

namespace AOC\Day20\Part1;

class Main
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function run(string $input): int
    {
        $inputSets = explode("\n", $input);
        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $minAddress = 0;
        $ranges = array_map([$this->parser, 'parse'], $inputSets);

        usort($ranges, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        array_walk($ranges, function (array $range) use(&$minAddress): void {
            if ($minAddress >= $range[0]) {
                $minAddress = $range[1] + 1;
            }
        });

        return $minAddress;
    }
}
