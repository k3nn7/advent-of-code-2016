<?php
declare(strict_types=1);

namespace AOC\Day21\Part1;

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

    public function __construct()
    {
        $this->parser = new Parser();
        $this->handler = new OperationHandler();
    }

    public function run(string $input, string $operations): string
    {
        $inputSets = explode("\n", $operations);
        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $operations = array_map([$this->parser, 'parse'], $inputSets);

        return array_reduce($operations, function (string $result, array $operation): string {
            return $this->handler->handle($operation, $result);
        }, $input);
    }
}
