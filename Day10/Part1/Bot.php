<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Bot implements Destination
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Destination
     */
    private $highValueDestination;

    /**
     * @var Destination
     */
    private $lowValueDestination;

    /**
     * @var Chip[]
     */
    private $chips = [];
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(int $id, EventDispatcherInterface $eventDispatcher)
    {
        $this->id = $id;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setHighValueDestination(Destination $destination)
    {
        $this->highValueDestination = $destination;
    }

    public function setLowValueDestination(Destination $destination)
    {
        $this->lowValueDestination = $destination;
    }

    public function giveChip(Chip $chip)
    {
        array_push($this->chips, $chip);
    }

    public function proceed()
    {
        if (!$this->canProceed()) {
            return;
        }

        $this->eventDispatcher->dispatch(
            'chips.compared',
            new ChipsComparedEvent($this->id, $this->chips[0], $this->chips[1])
        );

        $this->highValueDestination->giveChip($this->highValueChip());
        $this->lowValueDestination->giveChip($this->chips[0]);
    }

    public function getChips()
    {
        return $this->chips;
    }

    private function canProceed(): bool
    {
        return count($this->chips) == 2;
    }

    private function highValueChip(): Chip
    {
        if ($this->chips[0]->getValue() > $this->chips[1]->getValue()) {
            return array_shift($this->chips);
        }
        return array_pop($this->chips);
    }
}
