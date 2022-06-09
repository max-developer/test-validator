<?php

namespace MwDevel\Validator\Rules;

abstract class AbstractRule implements RuleInterface
{
    public function getName(): string
    {
        return lcfirst(basename(str_replace('\\', '/', static::class)));
    }
}
