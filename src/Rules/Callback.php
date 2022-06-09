<?php

namespace MwDevel\Validator\Rules;

class Callback extends AbstractRule
{
    private string $name;
    /** @var callable */
    private $callback;
    private array $params;

    public function __construct(string $name, callable $callback, array $params)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->params = $params;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function validate($value): bool
    {
        return call_user_func($this->callback, $value, ...$this->params);
    }
}
