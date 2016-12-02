<?php
declare(strict_types=1);

namespace AOC\Day2\Part1;

class Main
{
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var Keypad
     */
    private $keypad;

    public function __construct()
    {
        $this->parser = new Parser();
        $this->keypad = new Keypad();
    }

    public function run(string $input): array
    {
        $operationsSets = $this->parseOperationSets($input);

        return array_reduce($operationsSets, function ($result, $operations) {
            array_walk($operations, [$this->keypad, 'moveFinger']);
            array_push($result, $this->keypad->getCurrentNumber());
            return $result;
        }, []);
    }

    private function parseOperationSets(string $input): array
    {
        $inputSets = explode("\n", $input);

        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        return array_map(function (string $input): array {
            return $this->parser->parse($input);
        }, $inputSets);
    }
}
