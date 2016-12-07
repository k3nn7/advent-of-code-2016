<?php
declare(strict_types=1);

namespace AOC\Day7\Part2;

class IPv7
{
    /**
     * @var array;
     */
    private $addressSequences = [];
    /**
     * @var array
     */
    private $hypernetSequences = [];

    public function __construct(string $address)
    {
        $sequences = preg_split('/\[([a-z]+)\]/', $address, -1, PREG_SPLIT_DELIM_CAPTURE);

        for ($i = 0; $i < count($sequences); $i++) {
            if ($i % 2 == 0) {
                array_push($this->addressSequences, $sequences[$i]);
            } else {
                array_push($this->hypernetSequences, $sequences[$i]);
            }
        }
    }

    public function getAddressSequences(): array
    {
        return $this->addressSequences;
    }

    public function getHypernetSequences()
    {
        return $this->hypernetSequences;
    }

    public function supportsTls()
    {
        $abbaInAddress = false;
        $abbaInHypernet = false;

        foreach ($this->addressSequences as $address) {
            if ($this->containsAbba($address)) {
                $abbaInAddress = true;
            }
        }

        foreach ($this->hypernetSequences as $hypernet) {
            if ($this->containsAbba($hypernet)) {
                $abbaInHypernet = true;
            }
        }

        return $abbaInAddress && !$abbaInHypernet;
    }

    private function containsAbba(string $string): bool
    {
        if (strlen($string) < 4) return false;

        for ($i = 0; $i < strlen($string) - 3; $i++) {
            if ($this->isAbba(substr($string, $i, 4))) {
                return true;
            }
        }
        return false;
    }

    private function isAbba(string $s): bool
    {
        return $s[0] != $s[1] && $s[0] == $s[3] && $s[1] == $s[2];
    }

    public function supportsSsl(): bool
    {
        $ABAs = array_map([$this, 'extractABAs'], $this->addressSequences);
        $ABAs = array_reduce($ABAs, function(array $flatted, array $abas): array {
            return array_merge($flatted, $abas);
        }, []);
        $hypernetABAs = array_map([$this, 'extractABAs'], $this->hypernetSequences);
        $hypernetABAs = array_reduce($hypernetABAs, function(array $flatted, array $abas): array {
            return array_merge($flatted, $abas);
        }, []);
        $BABs = array_map([$this, 'ABAtoBAB'], $hypernetABAs);

        return count(array_intersect($ABAs, $BABs)) > 0;
    }

    private function extractABAs(string $s): array
    {
        if (strlen($s) < 3) return [];

        $ABAs = [];

        for ($i = 0; $i < strlen($s) - 2; $i++) {
            if ($this->isABA(substr($s, $i, 3))) {
                array_push($ABAs, substr($s, $i, 3));
            }
        }
        return $ABAs;
    }

    private function isABA(string $s): bool
    {
        return $s[0] == $s[2] && $s[0] != $s[1];
    }

    private function ABAtoBAB(string $s): string
    {
        return $s[1].$s[0].$s[1];
    }
}
