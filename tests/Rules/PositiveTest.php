<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Positive;
use PHPUnit\Framework\TestCase;

class PositiveTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new Positive();

        $this->assertTrue($rule->validate(null));
        $this->assertFalse($rule->validate(-2));
        $this->assertFalse($rule->validate(0));
        $this->assertTrue($rule->validate(2));
    }
}
