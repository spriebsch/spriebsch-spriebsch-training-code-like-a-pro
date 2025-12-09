<?php declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$restaurant1 = new Restaurant1();
$restaurant2 = new Restaurant2();

$restaurant2->startInTheMorning();

$factory = new SecretSauceFactory();
$secretSauce1 = $factory->make();
$secretSauce2 = $factory->make();

$patty1 = new Patty();
$patty2 = new Patty();

$restaurant1->acceptSauceDelivery($secretSauce1);
$restaurant1->acceptPattyDelivery($patty1);
$restaurant1->acceptPattyDelivery($patty1);

$burger = $restaurant1->serve();
var_dump($burger);

$burger = $restaurant1->serve();
var_dump($burger);

$restaurant2->acceptSauceDelivery($secretSauce2);
$restaurant2->acceptPattyDelivery($patty2);

$burger = $restaurant2->serve();
var_dump($burger);

$restaurant2->makeNextOrderPlantBased();
$burger = $restaurant2->serve();
var_dump($burger);
