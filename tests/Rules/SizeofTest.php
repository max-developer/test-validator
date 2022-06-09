<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Sizeof;
use PHPUnit\Framework\TestCase;

class SizeofTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new Sizeof(2);

        $this->assertFalse($rule->validate(null));
        $this->assertFalse($rule->validate([]));
        $this->assertFalse($rule->validate([1]));
        $this->assertTrue($rule->validate([1, 2]));
        $this->assertFalse($rule->validate([1, 2, 3]));
    }
}
