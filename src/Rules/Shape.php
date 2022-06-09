<?php

namespace MwDevel\Validator\Rules;

use MwDevel\Validator\AbstractSchema;

class Shape extends AbstractRule
{
    /** @var array<string, AbstractSchema>  */
    private array $shapes;

    public function __construct(array $shapes)
    {
        $this->shapes = $shapes;
    }

    public function validate($value): bool
    {
        $errors = collect($this->shapes)
            ->filter(fn (AbstractSchema $schema, string $key) => !$schema->isValid($value[$key] ?? null));

        return $errors->isEmpty();
    }
}
