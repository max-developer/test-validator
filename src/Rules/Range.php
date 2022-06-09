<?php

namespace MwDevel\Validator\Rules;

class Range extends AbstractRule
{
    /** @var int|float */
    private $start;

    /** @var int|float */
    private $end;

    /**
     * @param int|float $start
     * @param int|float $end
     */
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function validate($value): bool
    {
        return ($value >= $this->start && $value <= $this->end) || is_null($value);
    }
}
