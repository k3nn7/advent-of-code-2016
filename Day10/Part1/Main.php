<?php

namespace AOC\Day10\Part1;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Main
{
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    /**
     * @var BotFactory
     */
    private $botFactory;
    /**
     * @var Bot[]
     */
    private $bots = [];
    /**
     * @var Output[]
     */
    private $outputs = [];
    /**
     * @var null|int
     */
    private $result = null;
    /**
     * @var int
     */
    private $needle1;
    /**
     * @var int
     */
    private $needle2;

    public function __construct(int $needle1, int $needle2)
    {
        $this->parser = new Parser();
        $this->eventDispatcher = new EventDispatcher();
        $this->botFactory = new BotFactory($this->eventDispatcher);

        $this->eventDispatcher->addListener(
            'chips.compared',
            [$this, 'onChipsCompared']
        );
        $this->needle1 = $needle1;
        $this->needle2 = $needle2;
    }

    public function run($input)
    {
        $lines = explode(PHP_EOL, $input);
        $lines = array_filter($lines, function (string $line): bool {
            return strlen($line) > 0;
        });

        $commands = array_map(function (string $command): array {
            return $this->parser->parse($command);
        }, $lines);

        array_walk($commands, [$this, 'handleCommand']);

        do {
            array_walk($this->bots, function (Bot $bot) {
                $bot->proceed();
            });
        } while (is_null($this->result));

        return $this->result;
    }

    public function onChipsCompared(ChipsComparedEvent $event)
    {
        $val1 = $event->getChipA()->getValue();
        $val2 = $event->getChipB()->getValue();

        if ($this->needle1 == $val1 && $this->needle2 == $val2) {
            $this->result = $event->getBotId();
        }
        if ($this->needle2 == $val1 && $this->needle1 == $val2) {
            $this->result = $event->getBotId();
        }
    }

    private function handleCommand(array $command)
    {
        switch ($command[0]) {
            case Command::SET_VALUE:
                $this->handleSetValue(
                    $command[1],
                    $command[3]
                );
                break;
            case Command::BOT_GIVES:
                $this->handleGiveChip(
                    $command[1],
                    $command[2],
                    $command[3],
                    $command[4],
                    $command[5]
                );
                break;
        }
    }

    private function handleSetValue(int $value, int $botId)
    {
        $this->getBot($botId)->giveChip(new Chip($value));
    }

    private function handleGiveChip(
        int $sourceBotId,
        int $lowType,
        int $lowId,
        int $highType,
        int $highId
    ) {
        $sourceBot = $this->getBot($sourceBotId);
        $lowDestination = $this->getDestination($lowType, $lowId);
        $highDestination = $this->getDestination($highType, $highId);

        $sourceBot->setLowValueDestination($lowDestination);
        $sourceBot->setHighValueDestination($highDestination);
    }

    private function getBot(int $id): Bot
    {
        if (!array_key_exists($id, $this->bots)) {
            $this->bots[$id] = $this->botFactory->makeBot($id);
        }
        return $this->bots[$id];
    }

    private function getOutput(int $id): Output
    {
        if (!array_key_exists($id, $this->outputs)) {
            $this->outputs[$id] = new Output();
        }
        return $this->outputs[$id];
    }

    private function getDestination(int $type, int $id): Destination
    {
        switch ($type) {
            case Command::TO_BOT:
                return $this->getBot($id);
            case Command::TO_OUTPUT:
                return $this->getOutput($id);
        }
    }
}
