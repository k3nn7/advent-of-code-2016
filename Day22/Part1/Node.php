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
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;

    public function __construct(int $size, int $used, int $x, int $y)
    {
        $this->size = $size;
        $this->used = $used;
        $this->x = $x;
        $this->y = $y;
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

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}
