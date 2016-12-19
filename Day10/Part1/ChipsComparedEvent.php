<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

use Symfony\Component\EventDispatcher\Event;

class ChipsComparedEvent extends Event
{
    /**
     * @var int
     */
    private $botId;
    /**
     * @var Chip
     */
    private $chipA;
    /**
     * @var Chip
     */
    private $chipB;

    public function __construct(int $botId, Chip $chipA, Chip $chipB)
    {
        $this->botId = $botId;
        $this->chipA = $chipA;
        $this->chipB = $chipB;
    }

    /**
     * @return int
     */
    public function getBotId(): int
    {
        return $this->botId;
    }

    /**
     * @return Chip
     */
    public function getChipA(): Chip
    {
        return $this->chipA;
    }

    /**
     * @return Chip
     */
    public function getChipB(): Chip
    {
        return $this->chipB;
    }
}
