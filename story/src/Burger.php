<?php declare(strict_types=1);

class Burger {
    public function __construct(
        private Patty $patty,
        private SecretSauce $secretSauce
    ) {}
}
