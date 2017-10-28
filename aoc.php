<?php
declare(strict_types=1);

namespace AOC;

use AOC\Day24\Part1\Main;

require_once './vendor/autoload.php';

$d1p1 = new Main();

$input = file_get_contents('./Resources/inputs/day24');

$out = $d1p1->run($input);

echo $out . PHP_EOL;
