<?php
declare(strict_types=1);

namespace AOC\Day17\Part1;

class Main
{
    private const UP = 0;
    private const DOWN = 1;
    private const LEFT = 2;
    private const RIGHT = 3;

    public function run(string $input): array
    {
        return $this->findPath(0, 0, $input);
    }

    private function findPath(int $currentX, int $currentY, string $passcode): array
    {
        if ($currentX == 3 && $currentY == 3) return [0, '']; // Got it!
        if (strlen($passcode) > 20) return [PHP_INT_MAX, '']; // Too deep

        $currentDistance = PHP_INT_MAX;
        $moves = $this->possibleMoves($currentX, $currentY, $passcode);
        $currentPath = '';
        foreach ($moves as $move) {
            switch ($move) {
                case self::UP:
                    list($distance, $path) = $this->findPath($currentX, $currentY - 1, $passcode.'U');
                    $path = 'U'.$path;
                    break;
                case self::DOWN:
                    list($distance, $path) = $this->findPath($currentX, $currentY + 1, $passcode.'D');
                    $path = 'D'.$path;
                    break;
                case self::LEFT:
                    list($distance, $path) = $this->findPath($currentX - 1, $currentY, $passcode.'L');
                    $path = 'L'.$path;
                    break;
                default:
                    list($distance, $path) = $this->findPath($currentX + 1, $currentY, $passcode.'R');
                    $path = 'R'.$path;
                    break;
            }
            if ($distance < $currentDistance) {
                $currentDistance = $distance + 1;
                $currentPath = $path;
            }
        }
        return [$currentDistance, $currentPath];
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
