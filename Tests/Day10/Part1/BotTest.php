<?php

namespace AOC\Tests\Day10\Part1;

use AOC\Day10\Part1\BotFactory;
use AOC\Day10\Part1\Chip;
use AOC\Day10\Part1\ChipsComparedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BotTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;
    /**
     * @var BotFactory
     */
    private $botFactory;

    public function setUp()
    {
        $this->dispatcher = $this->prophesize(EventDispatcherInterface::class);
        $this->botFactory = new BotFactory($this->dispatcher->reveal());
    }

    public function test_give_2_chips_and_proceed()
    {
        $bot1 = $this->botFactory->makeBot(1);
        $bot2 = $this->botFactory->makeBot(2);
        $bot3 = $this->botFactory->makeBot(3);

        $bot1->setHighValueDestination($bot2);
        $bot1->setLowValueDestination($bot3);

        $bot1->giveChip(new Chip(5));
        $bot1->giveChip(new Chip(3));
        $bot1->proceed();

        $this->assertEquals([new Chip(5)], $bot2->getChips());
        $this->assertEquals([new Chip(3)], $bot3->getChips());
    }

    public function test_fire_event_when_comparing_chips()
    {
        $bot1 = $this->botFactory->makeBot(1);
        $bot2 = $this->botFactory->makeBot(2);
        $bot3 = $this->botFactory->makeBot(3);

        $expectedEvent = new ChipsComparedEvent(
            1,
            new Chip(5),
            new Chip(3)
        );
        $this->dispatcher->dispatch('chips.compared', $expectedEvent)
            ->shouldBeCalled();


        $bot1->setHighValueDestination($bot2);
        $bot1->setLowValueDestination($bot3);

        $bot1->giveChip(new Chip(5));
        $bot1->giveChip(new Chip(3));
        $bot1->proceed();

    }

    public function test_give_1_chip_and_proceed()
    {
        $bot1 = $this->botFactory->makeBot(1);
        $bot2 = $this->botFactory->makeBot(2);

        $bot1->setHighValueDestination($bot2);

        $bot1->giveChip(new Chip(5));
        $bot1->proceed();

        $this->assertEmpty($bot2->getChips());
    }
}
