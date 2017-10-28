<?php
declare(strict_types=1);

namespace AOC\Day9\Part2;

class Main
{
    /**
     * @var Decompressor
     */
    private $decompressor;

    public function __construct()
    {
        $this->decompressor = new Decompressor();
    }

    public function run(string $input): int
    {
        $input = str_replace(PHP_EOL, '', $input);
        return $this->decompressor->decompress($input);
    }
}
