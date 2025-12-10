<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

abstract class AbstractBaseController
{
    protected const DEFAULT_TIMEZONE = 'UTC';

    public function __construct()
    {
        @date_default_timezone_set(self::DEFAULT_TIMEZONE);
    }

    // @todo move to Environment class
    final protected function readEnv(string $name, ?string $default = null): ?string
    {
        $value = getenv($name);
        return $value === false ? $default : $value;
    }

    // @todo move to trait
    final protected function readFileIfExists(string $path): ?string
    {
        if ($path !== '' && is_file($path) && is_readable($path)) {
            $content = @file_get_contents($path);
            if ($content !== false) {
                return $content;
            }
        }
        return null;
    }
}
