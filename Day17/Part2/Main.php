<?php
declare(strict_types=1);

namespace AOC\Day17\Part2;

class Main
{
    private const UP = 0;
    private const DOWN = 1;
    private const LEFT = 2;
    private const RIGHT = 3;

    public function run(string $input): int
    {
        ini_set('xdebug.max_nesting_level', '5000');
        return $this->findPath(0, 0, $input);
    }

    private function findPath(int $currentX, int $currentY, string $passcode): int
    {
        if ($currentX == 3 && $currentY == 3) return 0; // Got it!
        if (strlen($passcode) > 1000) return PHP_INT_MAX; // Too deep

        $currentDistance = -1;
        $moves = $this->possibleMoves($currentX, $currentY, $passcode);
        foreach ($moves as $move) {
            switch ($move) {
                case self::UP:
                    $distance = $this->findPath($currentX, $currentY - 1, $passcode.'U');
                    break;
                case self::DOWN:
                    $distance = $this->findPath($currentX, $currentY + 1, $passcode.'D');
                    break;
                case self::LEFT:
                    $distance = $this->findPath($currentX - 1, $currentY, $passcode.'L');
                    break;
                default:
                    $distance = $this->findPath($currentX + 1, $currentY, $passcode.'R');
                    break;
            }
            if ($distance > $currentDistance && $distance < PHP_INT_MAX) {
                $currentDistance = $distance + 1;
            }
        }
        return $currentDistance;
    }

    private function possibleMoves(int $x, int $y, string $passcode): array
    {
        $moves = [];
        $hash = md5($passcode);

        if ($x > 0 && $this->isOpen($hash, self::LEFT)) {
            array_push($moves, self::LEFT);
        }
        if ($x < 3 && $this->isOpen($hash, self::RIGHT)) {
            array_push($moves, self::RIGHT);
        }
        if ($y > 0 && $this->isOpen($hash, self::UP)) {
            array_push($moves, self::UP);
        }
        if ($y < 3 && $this->isOpen($hash, self::DOWN)) {
            array_push($moves, self::DOWN);
        }

        return $moves;
    }

    private function isOpen(string $hash, int $position): bool
    {
        return in_array($hash[$position], ['b', 'c', 'd', 'e', 'f']);
    }
}
