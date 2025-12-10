<?php declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class CharacterizationTest extends TestCase
{
    public function test_everything(): void
    {
        $now = 1765363664;
        $_SERVER['REQUEST_TIME'] = $now;
        $_SERVER['REQUEST_TIME_FLOAT'] = (float) $now;

        /*
        ob_start();
        require __DIR__ . '/../src/example.php';
        $result = ob_get_contents();
        ob_end_clean();

        file_put_contents(__DIR__ . '/../data/expectation.txt', $result);
        exit;
        */

        $expectation = file_get_contents(__DIR__ . '/../data/expectation.txt');

        $this->expectOutputString($expectation);

        require __DIR__ . '/../src/example.php';
    }
}
