<?php declare(strict_types=1);

class Restaurant1 implements Restaurant
{
    private Sauce $sauce;
    private array $patties = [];

    public function acceptSauceDelivery(Sauce $sauce): void
    {
        $this->sauce = $sauce;
    }

    public function acceptPattyDelivery(MeatBasedPatty $patty): void
    {
        $this->patties[] = $patty;
    }

    public function serve(): Burger
    {
        $patty = array_pop($this->patties);

        return new MeatBasedBurger($patty, $this->sauce);
    }
}
