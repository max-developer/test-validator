<?php

namespace MwDevel\Validator\Tests;

use MwDevel\Validator\Exceptions\NotFoundException;
use MwDevel\Validator\Exceptions\UndefinedTypeException;
use MwDevel\Validator\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testMakeStringSchema(): void
    {
        $validator = new Validator();

        $this->assertFalse($validator->string() === $validator->string());
    }

    public function testMakeNumberSchema(): void
    {
        $validator = new Validator();

        $this->assertFalse($validator->number() === $validator->number());
    }

    public function testMakeArraySchema(): void
    {
        $validator = new Validator();

        $this->assertFalse($validator->array() === $validator->array());
    }

    public function testAddCustomValidatorSuccess(): void
    {
        $validator = new Validator();
        $validator->addValidator('string', 'has', fn ($value, $param) => $value === $param);

        $schema = $validator->string();

        $this->assertTrue($schema->test('has', 10)->isValid(10));
        $this->assertFalse($schema->test('has', 11)->isValid(10));
    }

    public function testAddCustomValidatorFailed(): void
    {
        $this->expectException(UndefinedTypeException::class);

        $validator = new Validator();
        $validator->addValidator('string-test', 'has', fn ($value, $param) => $value === $param);
    }

    public function testUseCustomValidatorFailed(): void
    {
        $this->expectException(NotFoundException::class);

        $validator = new Validator();
        $validator->string()->test('not-found');
    }
}
