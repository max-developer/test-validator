<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\MinLength;
use PHPUnit\Framework\TestCase;

class MinLengthTest extends TestCase
{
    public function testSuccess(): void
    {
        $rule = new MinLength(5);

        $this->assertTrue($rule->validate(null));
        $this->assertFalse($rule->validate(''));
        $this->assertFalse($rule->validate('1'));
        $this->assertTrue($rule->validate('12345'));
    }
}
