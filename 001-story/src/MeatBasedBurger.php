<?php declare(strict_types=1);

final class MeatBasedBurger implements Burger
{
    public function __construct(
        private MeatBasedPatty $patty,
        private SecretSauce $sauce
    ) {}
}
