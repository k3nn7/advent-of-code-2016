<?php
declare(strict_types=1);

namespace AOC\Day14\Part1;

class Main
{
    public function run(string $salt): int
    {
        $suspectedKeys = [];
        $keys = [];

        for ($i = 0; count($keys) < 64; $i++) {
            $suspectedKeys = $this->removeNotValidSuspicions($i, $suspectedKeys);
            $hash = md5(sprintf('%s%d', $salt, $i));
            foreach ($suspectedKeys as $k => $suspectedKey) {
                if ($this->isProven($hash, $suspectedKey)) {
                    $key = $suspectedKey['hash'];
                    $keyIndex = $suspectedKey['index'];
                    $keys[$key] = $keyIndex;
                    unset($suspectedKeys[$k]);
                }
            }

            $pattern = $this->findSuspectedPattern($hash);
            if ($pattern !== false) {
                array_push($suspectedKeys, [
                    'hash' => $hash,
                    'index' => $i,
                    'pattern' => $pattern
                ]);
            }

        }

        var_dump($keys);
        $results = array_values($keys);
        sort($results);
        return $results[63];
    }

    private function findSuspectedPattern(string $hash)
    {
        $matches = [];
        $isSuspected = preg_match('/(\w)\1\1/', $hash, $matches) === 1;
        if (!$isSuspected) return false;
        return str_repeat($matches[0][0], 5);
    }

    private function removeNotValidSuspicions(int $i, array $suspectedKeys): array
    {
        return array_filter($suspectedKeys, function (array $suspected) use ($i): bool {
            return $suspected['index'] + 1000 >= $i;
        });
    }

    private function isProven(string $hash, array $suspectedKey): bool
    {
        return strpos($hash, $suspectedKey['pattern']) !== false;
    }
}
