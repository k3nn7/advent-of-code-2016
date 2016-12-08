<?php
declare(strict_types=1);

namespace AOC\Day8\Part1;

class Display
{
    private $content = [];

    public function __construct(int $width, int $height)
    {

        $this->content = array_fill(0, $height, array_fill(0, $width, false));
    }

    public function getContent(): string
    {

        return array_reduce($this->content, function (string $content, array $row): string {
            $rowContent = array_reduce($row, function (string $rowContent, bool $lit): string {
                $content = $lit ? '#' : '.';
                return $rowContent . $content;
            }, '');

            return $content . $rowContent . PHP_EOL;
        }, '');
    }

    public function rect(int $x, int $y): void
    {
        for ($i = 0; $i < $x; $i++) {
            for ($j = 0; $j < $y; $j++) {
                $this->content[$j][$i] = true;
            }
        }
    }

    public function rotateColumn(int $x, int $by): void
    {
        $column = array_column($this->content, 0);

        for ($i = 0; $i < $by; $i++) {
            array_unshift($column, array_pop($column));
        }

        for ($i = 0; $i < count($column); $i++) {
            $this->content[$i][$x] = $column[$i];
        }
    }

    public function rotateRow(int $y, int $by): void
    {
        for ($i = 0; $i < $by; $i++) {
            array_unshift($this->content[$y], array_pop($this->content[$y]));
        }
    }
}
