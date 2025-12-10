<?php declare(strict_types=1);

ob_start();
require __DIR__ . '/example.php';
$result = ob_get_contents();
ob_end_clean();

file_put_contents(__DIR__ . '/../data/expectation.txt', $result);
