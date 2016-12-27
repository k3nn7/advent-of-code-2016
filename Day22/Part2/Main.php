<?php

namespace AOC\Day22\Part2;

use AOC\Day22\Part1\Node;
use AOC\Day22\Part1\Parser;

class Main
{
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var array
     */
    private $mesh = [];

    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function run(string $input): string
    {
        $mesh = [];

        $inputSets = explode("\n", $input);
        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $inputSets = array_slice($inputSets, 2);

        $nodes = array_map([$this->parser, 'parse'], $inputSets);

        array_walk($nodes, function (Node $node) {
            $this->addNode($node, $node->getX(), $node->getY());
        });

        return array_reduce($this->mesh, function (string $result, array $row): string {
            return array_reduce($row, function (string $result, Node $node): string {
                $chr = '.';
                if ($node->getUsed() == 0) {
                    $chr = '0';
                }

                if ($node->getUsed() > 100) {
                    $chr = '#';
                }

                return $result . $chr;
            }, $result) . PHP_EOL;
        }, '');
    }

    private function addNode(Node $node, int $x, int $y): void
    {
        if (!isset($this->mesh[$y])) {
            $this->mesh[$y] = [];
        }
        $this->mesh[$y][$x] = $node;
    }
}
