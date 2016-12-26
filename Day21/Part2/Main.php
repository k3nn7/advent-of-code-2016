<?php
declare(strict_types=1);

namespace AOC\Day21\Part2;

use AOC\Day21\Part1\OperationHandler;
use AOC\Day21\Part1\Parser;

class Main
{
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var OperationHandler
     */
    private $handler;
    /**
     * @var OperationReverser
     */
    private $reverser;

    public function __construct()
    {
        $this->parser = new Parser();
        $this->handler = new OperationHandler();
        $this->reverser = new OperationReverser();
    }

    public function run(string $input, string $operations): string
    {
        $inputSets = explode("\n", $operations);
        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $operations = array_map([$this->parser, 'parse'], $inputSets);
        $operations = array_reverse($operations);
        $operations = array_map([$this->reverser, 'reverse'], $operations);

        return array_reduce($operations, function (string $result, array $operation): string {
            return $this->handler->handle($operation, $result);
        }, $input);
    }
}
