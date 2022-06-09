<?php

namespace MwDevel\Validator\Tests;

use MwDevel\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ArraySchemaTest extends TestCase
{
    public function testRequired(): void
    {
        $validator = new Validator();
        $schema = $validator->array();

        $this->assertTrue($schema->isValid(null));

        $schema->required();
        $this->assertFalse($schema->isValid(null));
        $this->assertTrue($schema->isValid([]));
        $this->assertTrue($schema->isValid([1]));
        $this->assertTrue($schema->isValid(['ok']));
    }

    public function testSizeof(): void
    {
        $validator = new Validator();
        $schema = $validator->array();

        $schema->sizeof(2);
        $this->assertFalse($schema->isValid(['a']));
        $this->assertTrue($schema->isValid(['a', 'b']));
        $this->assertFalse($schema->isValid(['a', 'b', 'c']));
    }

    public function testShape(): void
    {
        $validator = new Validator();
        $schema = $validator->array();

        $schema->shape([
            'name' => $validator->string()->required(),
            'age' => $validator->number()->positive(),
        ]);

        $this->assertTrue($schema->isValid(['name' => 'Ivan', 'age' => 20]));
        $this->assertTrue($schema->isValid(['name' => 'Ivan', 'age' => null]));
        $this->assertFalse($schema->isValid(['name' => '', 'age' => null]));
        $this->assertFalse($schema->isValid(['name' => 'Ivan', 'age' => -10]));
    }
}
