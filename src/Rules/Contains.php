<?php

namespace MwDevel\Validator\Rules;

class Contains extends AbstractRule
{
    private string $subString;

    public function __construct(string $subString)
    {
        $this->subString = $subString;
    }

    public function validate($value): bool
    {
        return mb_strpos($value, $this->subString) !== false;
    }
}
