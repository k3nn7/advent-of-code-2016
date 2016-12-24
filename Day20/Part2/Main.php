<?php
declare(strict_types=1);

namespace AOC\Day20\Part2;

use AOC\Day20\Part1\Parser;

class Main
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct(int $maxAddress)
    {
        $this->parser = new Parser();
        $this->currentRange = new Range([[0, $maxAddress]]);
    }

    public function run(string $input): int
    {
        $inputSets = explode("\n", $input);
        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $ranges = array_map([$this->parser, 'parse'], $inputSets);

        usort($ranges, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        array_walk($ranges, function (array $range): void {
            $this->currentRange = $this->currentRange->remove($range);
        });

        return $this->currentRange->valuesCount();
    }
}
