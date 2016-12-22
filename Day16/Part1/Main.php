<?php
declare(strict_types=1);

namespace AOC\Day16\Part1;

class Main
{
    /**
     * @var Generator
     */
    private $generator;
    /**
     * @var Hasher
     */
    private $hasher;

    public function __construct()
    {
        $this->generator = new Generator();
        $this->hasher = new Hasher();
    }

    public function run(string $input, int $requiredLength): string
    {
        $data = $this->generator->generator($input, $requiredLength);
        $data = substr($data, 0, $requiredLength);
        return $this->hasher->hash($data);
    }
}
