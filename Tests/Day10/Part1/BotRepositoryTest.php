<?php
declare(strict_types=1);

namespace AOC\Tests\Day10\Part1;

use AOC\Day10\Part1\Bot;
use AOC\Day10\Part1\BotFactory;
use AOC\Day10\Part1\BotRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BotRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BotRepository
     */
    private $repository;
    /**
     * @var BotFactory
     */
    private $botFactory;

    public function setUp()
    {
        $this->repository = new BotRepository();
        $this->botFactory = new BotFactory(
            $this->prophesize(EventDispatcherInterface::class)->reveal()
        );
    }

    public function test_save_and_findById()
    {
        $bot = $this->botFactory->makeBot(10);
        $this->repository->save($bot);

        $foundBot = $this->repository->findById(10);

        $this->assertEquals($bot, $foundBot);
    }

    public function test_findAll()
    {
        $this->repository->save(
            $this->botFactory->makeBot(10)
        );
        $this->repository->save(
            $this->botFactory->makeBot(15)
        );

        $this->assertCount(2, $this->repository->findAll());
    }
}
