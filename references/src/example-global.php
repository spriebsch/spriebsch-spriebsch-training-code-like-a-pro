<?php declare(strict_types=1);

$a = 2;
$b = 3;

function add(): int
{
    global $a, $b;

    $a += 1;

    return $a + $b;
}

var_dump(add($a, $b));
var_dump($a, $b);
