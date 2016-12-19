<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

class Output implements Destination
{
    /**
     * @var Chip|null
     */
    private $chip = null;

    public function giveChip(Chip $chip): void
    {
        $this->chip = $chip;
    }

    public function getValue(): ?int
    {
        return is_null($this->chip) ? $this->chip : $this->chip->getValue();
    }
}
