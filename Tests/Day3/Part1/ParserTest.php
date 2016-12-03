<?php
declare(strict_types=1);

namespace AOC\Tests\Day3\Part1;

use AOC\Day3\Part1\Parser;

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
        $input = "  883  357  185\n  572  189  424\n";
        $expectedOutput = [[883, 357, 185], [572, 189, 424]];

        $output = $this->parser->parse($input);

        $this->assertSame($expectedOutput, $output);
    }
}
