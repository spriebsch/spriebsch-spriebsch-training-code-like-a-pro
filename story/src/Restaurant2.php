<?php declare(strict_types=1);

class Restaurant2 implements Restaurant
{
    private SecretSauce $secretSauce;
    private array $patties = [];
    private array $plantBasedPatties;
    private bool $plantBased = false;

    public function startInTheMorning(): void
    {
        $this->makePatties();
    }

    public function acceptSauceDelivery(SecretSauce $secretSauce): void
    {
        $this->secretSauce = $secretSauce;
    }

    public function acceptPattyDelivery(Patty $patty): void
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

            return new Burger($patty, $specialSauce);
        } else {
            $patty = array_pop($this->patties);

            return new Burger($patty, $this->secretSauce);
        }
    }

    private function makePatties(): void
    {
        $this->plantBasedPatties = [new PlantBasedPatty(), new PlantBasedPatty()];
    }
}
