<?php

namespace AOC\Day8\Part1;

class Main
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct(int $width, int $height)
    {
        $this->parser = new Parser();
        $this->display = new Display($width, $height);
    }

    public function run($input)
    {
        $inputLines = explode(PHP_EOL, $input);
        $inputLines = array_filter($inputLines, function (string $line): bool {
            return strlen($line) > 0;
        });

        $commands = array_map(function (string $line): array {
            return $this->parser->parse($line);
        }, $inputLines);

        foreach ($commands as $command) {
            switch ($command[0]) {
                case Command::RECT:
                    $this->display->rect($command[1], $command[2]);
                    break;
                case Command::ROTATE_COLUMN:
                    $this->display->rotateColumn($command[1], $command[2]);
                    break;
                case Command::ROTATE_ROW:
                    $this->display->rotateRow($command[1], $command[2]);
                    break;
            }
        }

        echo $this->display->getContent();

        return $this->display->litCount();
    }
}
