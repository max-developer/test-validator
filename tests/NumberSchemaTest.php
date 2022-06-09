<?php

namespace MwDevel\Validator\Tests;

use MwDevel\Validator\NumberSchema;
use MwDevel\Validator\Validator;
use PHPUnit\Framework\TestCase;

class NumberSchemaTest extends TestCase
{
    public function testRequired(): void
    {
        $validator = new Validator();
        $schema = $validator->number();

        $this->assertTrue($schema->isValid(null));

        $schema->required();
        $this->assertFalse($schema->isValid(null));
        $this->assertTrue($schema->isValid(10));
        $this->assertTrue($schema->isValid(0));
    }

    public function testPositive(): void
    {
        $validator = new Validator();
        $schema = $validator->number();

        $schema->positive();
        $this->assertTrue($schema->isValid(2));
        $this->assertFalse($schema->isValid(0));
        $this->assertFalse($schema->isValid(-1));
    }

    public function testRange(): void
    {
        $validator = new Validator();
        $schema = $validator->number();

        $schema->range(-10, 10);
        $this->assertFalse($schema->isValid(-11));
        $this->assertTrue($schema->isValid(-10));
        $this->assertTrue($schema->isValid(-1));
        $this->assertTrue($schema->isValid(0));
        $this->assertTrue($schema->isValid(1));
        $this->assertTrue($schema->isValid(10));
        $this->assertFalse($schema->isValid(11));
    }
}
