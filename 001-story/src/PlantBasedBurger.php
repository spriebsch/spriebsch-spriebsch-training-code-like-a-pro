<?php declare(strict_types=1);

final class PlantBasedBurger implements Burger
{
    public function __construct(
        private PlantBasedPatty $patty,
        private SpecialSauce $sauce
    ) {}
}
