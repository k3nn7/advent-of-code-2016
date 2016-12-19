<?php
declare(strict_types=1);

namespace AOC\Day9\Part1;

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
        $decompressed = $this->decompressor->decompress($input);
        return strlen($decompressed);
    }
}
