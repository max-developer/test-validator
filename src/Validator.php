<?php

namespace MwDevel\Validator;

use MwDevel\Validator\Exceptions\UndefinedTypeException;

class Validator
{
    private array $validators = [];

    public function __construct()
    {
        $this->validators = array_fill_keys(['string', 'number', 'array'], []);
    }

    public function string(): StringSchema
    {
        return new StringSchema($this->validators['string']);
    }

    public function number(): NumberSchema
    {
        return new NumberSchema($this->validators['number']);
    }

    public function array(): ArraySchema
    {
        return new ArraySchema($this->validators['array']);
    }

    public function addValidator(string $type, string $name, callable $callback): self
    {
        if (!array_key_exists($type, $this->validators)) {
            throw new UndefinedTypeException("Type {$type} undefined");
        }
        $this->validators[$type][$name] = $callback;
        return $this;
    }
}
