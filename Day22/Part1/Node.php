<?php
declare(strict_types=1);

namespace AOC\Day22\Part1;

class Node
{
    /**
     * @var int
     */
    private $size;
    /**
     * @var int
     */
    private $used;

    public function __construct(int $size, int $used)
    {
        $this->size = $size;
        $this->used = $used;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getUsed(): int
    {
        return $this->used;
    }

    public function getAvail(): int
    {
        return $this->size - $this->used;
    }
}
