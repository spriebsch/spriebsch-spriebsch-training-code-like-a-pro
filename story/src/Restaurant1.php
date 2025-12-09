<?php declare(strict_types=1);

class Restaurant1 implements Restaurant
{
    private SecretSauce $secretSauce;
    private array $patties = [];

    public function acceptSauceDelivery(SecretSauce $secretSauce): void
    {
        $this->secretSauce = $secretSauce;
    }

    public function acceptPattyDelivery(Patty $patty): void
    {
        $this->patties[] = $patty;
    }

    public function serve(): Burger
    {
        $patty = array_pop($this->patties);

        return new Burger($patty, $this->secretSauce);
    }
}
