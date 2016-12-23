<?php
declare(strict_types=1);

namespace AOC\Day18\Part1;

class Main
{
    /**
     * @var MazeGenerator
     */
    private $generator;

    public function __construct()
    {
        $this->generator = new MazeGenerator();
    }

    public function run(string $input, int $rows): int
    {
        $maze = $this->generator->generate($input, $rows);
        return substr_count($maze, '.');
    }
}
