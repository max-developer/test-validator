<?php

namespace MwDevel\Validator\Rules;

class Positive extends AbstractRule
{
    public function validate($value): bool
    {
        return is_numeric($value) ? $value > 0 : is_null($value);
    }
}
