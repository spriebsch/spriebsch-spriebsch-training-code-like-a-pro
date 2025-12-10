<?php declare(strict_types=1);

use spriebsch\projectTemplate\ImmutableObject;

require __DIR__ . '/bootstrap.php';

$object = new ImmutableObject('Hello World');
$object2 = $object;

// $object->modify();

var_dump($object->name());
var_dump($object2->name());

var_dump($object->changeName());
