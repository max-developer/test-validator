<?php

namespace MwDevel\Validator\Tests;

use MwDevel\Validator\Validator;
use PHPUnit\Framework\TestCase;

class StringSchemaTest extends TestCase
{
    public function testRequired(): void
    {
        $validator = new Validator();

        $schema = $validator->string()->required();
        $this->assertFalse($schema->isValid(''));
        $this->assertTrue($schema->isValid('test'));
    }

    public function testMinLength(): void
    {
        $validator = new Validator();

        $schema = $validator->string()->minLength(5);
        $this->assertFalse($schema->isValid(''));
        $this->assertTrue($schema->isValid('12345'));
    }

    public function testContains(): void
    {
        $validator = new Validator();

        $schema = $validator->string()->contains('what');
        $this->assertTrue($schema->isValid('what does the fox say'));
        $this->assertFalse($schema->isValid('does the fox say'));

        $this->assertTrue($schema->contains('test')->isValid('what test'));
        $this->assertFalse($schema->isValid('what does the fox say'));
    }
}
