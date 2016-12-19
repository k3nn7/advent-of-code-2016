<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

class BotRepository
{
    /**
     * @var Bot[]
     */
    private $data = [];

    public function save(Bot $bot)
    {
        $this->data[$bot->getId()] = $bot;
    }

    public function findById(int $id): Bot
    {
        return $this->data[$id];
    }

    public function findAll()
    {
        return array_values($this->data);
    }
}
