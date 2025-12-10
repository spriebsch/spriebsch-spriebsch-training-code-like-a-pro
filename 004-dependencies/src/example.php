<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

use PDO;

require __DIR__ . '/bootstrap.php';

putenv('PATH="' . __DIR__ . '"');

$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/';
$_GET['name'] = 'value';

$service = new SomeService('example-service');
$controller = new HeavyController('critical', $now, $service, new PDO('sqlite::memory:'));

$result = $controller->handle();

print json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;
