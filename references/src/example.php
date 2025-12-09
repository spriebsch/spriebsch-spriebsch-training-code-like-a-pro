<?php declare(strict_types=1);

function add(int $a, int $b): int
{
    $a += 1;

    return $a + $b;
}

$a = 2;
$b = 3;

var_dump(add($a, $b));
var_dump($a, $b);
