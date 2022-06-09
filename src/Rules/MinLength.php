<?php

namespace MwDevel\Validator\Rules;

class MinLength extends AbstractRule
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function validate($value): bool
    {
        return is_string($value) ? mb_strlen($value) >= $this->length : is_null($value);
    }
}
