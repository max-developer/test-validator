<?php

namespace MwDevel\Validator\Rules;

class Sizeof extends AbstractRule
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function validate($value): bool
    {
        return is_array($value) && count($value) === $this->length;
    }
}
