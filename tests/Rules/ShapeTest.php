<?php

namespace MwDevel\Validator\Tests\Rules;

use MwDevel\Validator\Rules\Shape;
use MwDevel\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ShapeTest extends TestCase
{
    public function testSuccess(): void
    {
        $validator = new Validator();
        $rule = new Shape([
            'name' => $validator->string()->required(),
        ]);

        $this->assertFalse($rule->validate(null));
        $this->assertFalse($rule->validate([]));
        $this->assertFalse($rule->validate(['name' => null]));
        $this->assertFalse($rule->validate(['name' => '']));
        $this->assertTrue($rule->validate(['name' => 'ok']));
    }
}
