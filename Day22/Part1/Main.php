<?php
declare(strict_types=1);

namespace AOC\Day22\Part1;

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

        $inputSets = array_slice($inputSets, 2);

        $nodes = array_map([$this->parser, 'parse'], $inputSets);

        return array_reduce($nodes, function (int $result, Node $node) use ($nodes): int {
            return array_reduce($nodes, function (int $result, Node $node1) use ($node): int {
                if ($node === $node1) return $result;
                if ($node->getUsed() == 0) return $result;
                if ($node1->getAvail() >= $node->getUsed()) {
                    return $result + 1;
                }
                return $result;
            }, $result);
        }, 0);
    }
}
