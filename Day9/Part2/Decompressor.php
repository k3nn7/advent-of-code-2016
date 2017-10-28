<?php
declare(strict_types=1);

namespace AOC\Day9\Part2;

class Decompressor
{
    public function decompress($input)
    {
        $toProcess = $input;
        $length = 0;
        echo PHP_EOL;
        while (strlen($toProcess) > 0) {
            echo "\rTo process: " . strlen($toProcess) . " Length: " . $length;
            if ($toProcess[0] === '(') {
                $toProcess = $this->processMarkedData($toProcess);
            } else {
                $segmentLength = strpos($toProcess, '(') ?: strlen($toProcess);
                $length += $segmentLength;
                $toProcess = substr($toProcess, $segmentLength);
            }
        }
        echo PHP_EOL;
        return $length;
    }

    private function extractCommand(string $command): array
    {
        $matches = [];
        preg_match('/^\((\d+)x(\d+)\)/', $command, $matches);
        $matches = array_slice($matches, 1);
        return [(int)$matches[0], (int)$matches[1]];
    }

    private function processMarkedData($toProcess)
    {
        $command = $this->extractCommand($toProcess);

        // Remove command from string
        $cursor = strpos($toProcess, ')') + 1;
        $toProcess = substr($toProcess, $cursor);

        $toRepeat = substr($toProcess, 0, $command[0]);
        $toProcess = substr($toProcess, $command[0]);

        $decompressed = str_repeat($toRepeat, $command[1]);

        return $decompressed . $toProcess;
    }
}
