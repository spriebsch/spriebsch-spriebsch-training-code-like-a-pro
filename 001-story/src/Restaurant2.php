<?php declare(strict_types=1);

class Restaurant2 implements Restaurant
{
    private Sauce $sauce;
    private array $patties = [];
    private array $plantBasedPatties;
    private bool $plantBased = false;

    public function startInTheMorning(): void
    {
        $this->makePatties();
    }

    public function acceptSauceDelivery(Sauce $sauce): void
    {
        $this->sauce = $sauce;
    }

    public function acceptPattyDelivery(MeatBasedPatty $patty): void
    {
        $this->patties[] = $patty;
    }

    public function makeNextOrderPlantBased(): void
    {
        $this->plantBased = true;
    }

    public function serve(): Burger
    {
        $specialSauce = new SpecialSauce();

        if ($this->plantBased) {
            $patty = array_pop($this->plantBasedPatties);
            $this->plantBased = false;

            return new PlantBasedBurger($patty, $specialSauce);
        } else {
            $patty = array_pop($this->patties);

            return new MeatBasedBurger($patty, $this->sauce);
        }
    }

    private function makePatties(): void
    {
        $this->plantBasedPatties = [new PlantBasedPatty(), new PlantBasedPatty()];
    }
}
