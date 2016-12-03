<?php
declare(strict_types=1);

namespace AOC\Day3\Part1;

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
        $triangles = $this->parser->parse($input);

        return array_reduce($triangles, function (int $validTriangles, array $sides): int {
            try {
                new Triangle(...$sides);
                return $validTriangles + 1;
            } catch (\InvalidArgumentException $e) {
                return $validTriangles;
            }
        }, 0);
    }
}
