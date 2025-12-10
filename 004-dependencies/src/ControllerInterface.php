<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

interface ControllerInterface
{
    /**
     * Handle a request and return a structured result safe for tests.
     *
     * @return array<string, mixed>
     */
    public function handle(): array;
}
