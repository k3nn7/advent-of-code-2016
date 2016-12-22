<?php
declare(strict_types=1);

namespace AOC\Day13\Part2;

class PriorityQueue extends \SplPriorityQueue
{
    public function compare($a, $b)
    {
        return $b <=> $a;
    }
}
