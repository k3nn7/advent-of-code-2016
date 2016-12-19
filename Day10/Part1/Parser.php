<?php
declare(strict_types=1);

namespace AOC\Day10\Part1;

class Parser
{
    private const BOT_GIVES_REGEX = '/^bot (?P<source>\d+) gives low to (?P<lowDestType>bot|output) (?P<lowDest>\d+) and high to (?P<highDestType>bot|output) (?P<highDest>\d+)$/';
    private const SET_VALUE_REGEX = '/^value (?P<input>\d+) goes to bot (?P<dest>\d+)$/';

    public function parse(string $commandString): array
    {
        $matches = [];
        preg_match(self::BOT_GIVES_REGEX, $commandString, $matches);

        if (empty($matches)) {
            preg_match(self::SET_VALUE_REGEX, $commandString, $matches);
            return $this->buildSetValueCommand($matches);
        }

        return $this->buildBotGivesCommand($matches);
    }

    private function parseDestinationType(string $typeString): int
    {
        switch ($typeString) {
            case 'bot':
                return Command::TO_BOT;
            case 'output':
                return Command::TO_OUTPUT;
        }
    }

    /**
     * @param $matches
     * @return array
     */
    private function buildBotGivesCommand(array $matches): array
    {
        return [
            Command::BOT_GIVES,
            (int)$matches['source'],
            $this->parseDestinationType($matches['lowDestType']),
            (int)$matches['lowDest'],
            $this->parseDestinationType($matches['highDestType']),
            (int)$matches['highDest']
        ];
    }

    /**
     * @param $matches
     * @return array
     */
    private function buildSetValueCommand(array $matches): array
    {
        return [
            Command::SET_VALUE,
            (int)$matches['input'],
            Command::TO_BOT,
            (int)$matches['dest']
        ];
    }
}
