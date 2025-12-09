<?php declare(strict_types=1);

interface Restaurant
{
    public function acceptSauceDelivery(Sauce $sauce): void;

    public function acceptPattyDelivery(MeatBasedPatty $patty): void;

    public function serve(): Burger;
}
