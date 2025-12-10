<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

final readonly class SomeService
{
    public function __construct(private string $name = 'support') {}

    public function name(): string
    {
        return $this->name;
    }

    public function compute(int $a, int $b): int
    {
        return $a + $b;
    }
}
