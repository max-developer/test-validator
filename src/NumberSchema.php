<?php

namespace MwDevel\Validator;

use MwDevel\Validator\Rules\Positive;
use MwDevel\Validator\Rules\Range;

class NumberSchema extends AbstractSchema
{
    public function positive(): self
    {
        return $this->setRule(new Positive());
    }

    /**
     * @param float|int $start
     * @param float|int $end
     */
    public function range($start, $end): self
    {
        return $this->setRule(new Range($start, $end));
    }
}
