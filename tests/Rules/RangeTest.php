<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Range;
use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new Range(-10, 10);

        $this->assertTrue($rule->validate(null));
        $this->assertFalse($rule->validate(-11));
        $this->assertTrue($rule->validate(-10));
        $this->assertTrue($rule->validate(0));
        $this->assertTrue($rule->validate(10));
        $this->assertFalse($rule->validate(11));
    }
}
