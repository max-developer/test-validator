<?php

namespace MwDevel\Validator;

use MwDevel\Validator\Rules\Shape;
use MwDevel\Validator\Rules\Sizeof;

class ArraySchema extends AbstractSchema
{
    public function sizeof(int $length): self
    {
        return $this->setRule(new Sizeof($length));
    }

    public function shape(array $shapes): self
    {
        return $this->setRule(new Shape($shapes));
    }
}
