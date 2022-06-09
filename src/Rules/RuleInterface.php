<?php

namespace MwDevel\Validator\Rules;

interface RuleInterface
{
    public function getName(): string;

    /** @param mixed $value */
    public function validate($value): bool;
}
