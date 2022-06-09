<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Contains;
use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new Contains('what');

        $this->assertFalse($rule->validate(null));
        $this->assertTrue($rule->validate('what what'));
        $this->assertTrue($rule->validate('whattest'));
        $this->assertFalse($rule->validate(''));
        $this->assertFalse($rule->validate('test test'));
    }
}
