<?php declare(strict_types=1);

final class FlexibleBurger implements Burger
{
    public function __construct(
        private Patty $patty,
        private Sauce $sauce
    ) {}
}
