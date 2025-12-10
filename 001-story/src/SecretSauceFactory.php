<?php declare(strict_types=1);

class SecretSauceFactory
{
    public function make(): SecretSauce
    {
        return new SecretSauce();
    }
}
