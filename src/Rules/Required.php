<?php

namespace MwDevel\Validator\Rules;

class Required extends AbstractRule
{
    public function validate($value): bool
    {
        return is_string($value) ? mb_strlen($value) > 0 : !is_null($value);
    }
}
