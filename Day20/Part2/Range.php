<?php
declare(strict_types=1);

namespace AOC\Day20\Part2;

class Range
{
    private $ranges = [];
    private $max;

    public function __construct(array $range)
    {
        $this->ranges = $range;
        $this->max = end($range)[1];
    }

    public function remove(array $range): Range
    {
        $result = [];
        foreach ($this->ranges as &$r) {
            if ($this->isAinsideB($r, $range)) {
                // do nothing
            } elseif ($this->isAinsideB($range, $r)) {
                if ($range[0] > 0) array_push($result, [$r[0], $range[0] - 1]);
                if ($range[1] < $this->max) array_push($result, [$range[1] + 1, $r[1]]);
            } elseif ($this->aOverlapsBfromLeft($r, $range)) {
                if ($range[0] > 0) array_push($result, [$r[0], $range[0] - 1]);
            } elseif ($this->aOverlapsBfromRight($r, $range)) {
                if ($range[1] < $this->max) array_push($result, [$range[1] + 1, $r[1]]);
            } else {
                array_push($result, $r);
            }
        }

        return new Range($result);
    }

    private function isAinsideB(array $a, array $b): bool
    {
        return $this->isBetween($a[0], $b) && $this->isBetween($a[1], $b);
    }

    private function aOverlapsBfromLeft(array $a, array $b): bool
    {
        return !$this->isBetween($a[0], $b) && $this->isBetween($a[1], $b);
    }

    private function aOverlapsBfromRight(array $a, array $b): bool
    {
        return $this->isBetween($a[0], $b) && !$this->isBetween($a[1], $b);
    }

    private function isBetween(int $val, array $range): bool
    {
        return $val >= $range[0] && $val <= $range[1];
    }

    public function valuesCount(): int
    {
        $count = 0;
        foreach ($this->ranges as $range) {
            $count += ($range[1] - $range[0] + 1);
        }
        return $count;
    }
}
