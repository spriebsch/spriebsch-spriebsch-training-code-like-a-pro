<?php declare(strict_types=1);

interface Restaurant
{
    public function acceptSauceDelivery(SecretSauce $secretSauce): void;

    public function acceptPattyDelivery(Patty $patty): void;

    public function serve(): Burger;
}
