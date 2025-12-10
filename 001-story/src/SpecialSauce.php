<?php declare(strict_types=1);

final readonly class SpecialSauce implements Sauce {}

class SaltedSpecialSauce implements Sauce
{
    public function __construct(private readonly SpecialSauce $sauce) {}
}

// Favor composition over inheritance
