<?php declare(strict_types=1);

namespace spriebsch\projectTemplate;

final readonly class ImmutableObject
{
    public function __construct(private string $name) {}

    /*
    public function modify(): self
    {
        $this->name = 'Changed ' . $this->name;
    }
    */

    public function changeName(): self
    {
        return new self('Changed ' . $this->name);
    }

    public function name(): string
    {
        return $this->name;
    }
}
