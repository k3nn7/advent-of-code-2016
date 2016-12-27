<?php
declare(strict_types=1);

namespace AOC\Tests\Day22\Part1;

use AOC\Day22\Part1\Node;
use AOC\Day22\Part1\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Parser
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }

    /**
     * @dataProvider dataProvider
     */
    public function test_parse(string $input, Node $expectedNode)
    {
        $node = $this->parser->parse($input);
        $this->assertEquals($expectedNode, $node);
    }

    public function dataProvider(): array
    {
        return [
            [
                '$input' => '/dev/grid/node-x0-y6     92T   70T    22T   76%',
                '$expectedNode' => new Node(92, 70, 0, 6)
            ],
            [
                '$input' => '/dev/grid/node-x2-y3     92T   73T    19T   79%',
                '$expectedNode' => new Node(92, 73, 2, 3)
            ],
        ];
    }
}
