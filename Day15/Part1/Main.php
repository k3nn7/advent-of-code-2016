<?php
declare(strict_types=1);

namespace AOC\Day15\Part1;

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

        $functionsParameters = array_map([$this->parser, 'parse'], $inputSets);
        /** @var DiscFunction[] $functions */
        $functions = array_map([$this, 'makeFunction'], $functionsParameters);

        $result = 0;

        for ($i = 0; $result == 0; $i++) {
            for ($j = 0; $j < count($functions); $j++) {
                $t = $j + $i;
                $result = $i;
                if ($functions[$j]->at($t) !== 0) {
                    $result = 0;
                    break;
                }
            }
        }

        return $result - 1;
    }

    private function makeFunction(array $parameters): DiscFunction
    {
        return new DiscFunction($parameters[0], $parameters[1]);
    }
}
