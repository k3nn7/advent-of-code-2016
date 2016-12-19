<?php
declare(strict_types=1);

namespace AOC\Day4\Part2;

class RoomName
{
    private const REGEXP = '/^([a-z\-]+)([0-9]+)\[([a-z]+)\]$/';

    /**
     * @var string
     */
    private $encryptedName;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $checksum;

    public function __construct(string $encryptedName)
    {
        $matches = '';
        preg_match(self::REGEXP, $encryptedName, $matches);
        $this->encryptedName = $matches[1];
        $this->id = (int)$matches[2];
        $this->checksum = $matches[3];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isReal()
    {
        $counts = [];

        for ($i = 0; $i < strlen($this->encryptedName); $i++) {
            $char = $this->encryptedName[$i];
            if ($char != '-') {
                if (!isset($counts[$char])) {
                    $counts[$char] = 0;
                }
                $counts[$char]++;
            }
        }

        $counts2 = [];
        foreach ($counts as $k => $v) {
            array_push($counts2, [$k, $v]);
        }

        usort($counts2, function ($a, $b): int {
            $r1 = $b[1] <=> $a[1];
            if ($r1 == 0) {
                return strcmp($a[0], $b[0]);
            }
            return $r1;
        });

        $checksum = array_map(function ($i) {
            return $i[0];
        }, $counts2);

        $checksum = array_slice($checksum, 0, 5);

        $checksum = array_reduce($checksum, function ($str, $char) {
            return $str.$char;
        }, '');

        return $this->checksum === $checksum;
    }

    public function encrypt(): string
    {
        return $this->rot(trim(str_replace('-', ' ', $this->encryptedName)), $this->id);
    }

    private function rot(string $input, int $value): string
    {
        $rotation = ($value % 26);

        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] !== ' ') {
                $c = ord($input[$i]) - 97 + $rotation;
                $input[$i] = chr(($c % 26) + 97);
            }
        }

        return $input;
    }
}
