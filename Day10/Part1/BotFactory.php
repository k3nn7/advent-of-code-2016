<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BotFactory
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function makeBot(int $id): Bot
    {
        return new Bot($id, $this->eventDispatcher);
    }
}
