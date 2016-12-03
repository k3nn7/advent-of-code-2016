<?php
declare(strict_types=1);

namespace AOC\Day2\Part2;

use AOC\Day2\Part1\Parser;

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

    public function run(string $input)
    {
        $inputSets = explode("\n", $input);

        $inputSets = array_filter($inputSets, function (string $inputSet): bool {
            return strlen($inputSet) > 0;
        });

        $operationsSets = array_map(function (string $input): array {
            return $this->parser->parse($input);
        }, $inputSets);

        return array_reduce($operationsSets, function ($code, $operations) {
            array_walk($operations, function (int $move) {
                $this->keypad->moveFinger($move);
            });
            $code[] = $this->keypad->getCurrentNumber();
            return $code;
        }, []);
    }
}
