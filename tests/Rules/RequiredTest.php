<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Required;
use PHPUnit\Framework\TestCase;

class RequiredTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new Required();

        $this->assertFalse($rule->validate(null));
        $this->assertFalse($rule->validate(''));
        $this->assertTrue($rule->validate('test'));
        $this->assertTrue($rule->validate(-1));
        $this->assertTrue($rule->validate(0));
        $this->assertTrue($rule->validate(1));
    }
}
