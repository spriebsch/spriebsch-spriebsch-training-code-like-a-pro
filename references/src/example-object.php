<?php declare(strict_types=1);

class IntegerObject
{
    public function __construct(private int $a) {}

    public function increment(): void
    {
        $this->a += 1;
    }

    public function asInt(): int
    {
        return $this->a;
    }
}

function add(IntegerObject $a, int $b): int
{
    $a->increment();

    return $a->asInt() + $b;
}

$a = new IntegerObject(2);
$b = 3;

var_dump(add($a, $b));
var_dump($a, $b);
