<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

final class StaticService
{
    public const VERSION = '1.0.0';

    private function __construct() {}

    public static function frameworkName(): string
    {
        return 'MiniFramework';
    }
}
