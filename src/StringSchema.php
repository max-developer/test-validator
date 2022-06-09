<?php

namespace MwDevel\Validator;

use MwDevel\Validator\Rules\Contains;
use MwDevel\Validator\Rules\MinLength;

class StringSchema extends AbstractSchema
{
    public function minLength(int $length): self
    {
        return $this->setRule(new MinLength($length));
    }

    public function contains(string $subString): self
    {
        return $this->setRule(new Contains($subString));
    }
}
