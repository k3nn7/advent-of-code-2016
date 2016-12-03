<?php
declare(strict_types=1);

namespace AOC\Tests\Day3\Part2;

use AOC\Day3\Part2\Parser;

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

    public function test_parse()
    {
        $input = "  883  357  185\n  572  189  424\n  842  206  272\n   55  656   94\n  612  375   90\n  430    7   20\n";
        $expectedOutput = [
            [883, 572, 842],
            [55, 612, 430],
            [357, 189, 206],
            [656, 375, 7],
            [185, 424, 272],
            [94, 90, 20]
        ];

        $output = $this->parser->parse($input);

        $this->assertSame($expectedOutput, $output);
    }
}
