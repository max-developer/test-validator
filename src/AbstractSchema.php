<?php

namespace MwDevel\Validator;

use MwDevel\Validator\Exceptions\NotFoundException;
use MwDevel\Validator\Rules\Callback;
use MwDevel\Validator\Rules\Required;
use MwDevel\Validator\Rules\RuleInterface;

abstract class AbstractSchema
{
    /** @var array<string, RuleInterface>  */
    private array $rules = [];
    private array $validators;

    public function __construct(array $validators)
    {
        $this->validators = $validators;
    }

    /** @return static */
    public function required(): self
    {
        return $this->setRule(new Required());
    }

    /** @param mixed ...$params */
    public function test(string $name, ...$params): self
    {
        $callback = $this->validators[$name] ?? null;
        if (is_null($callback)) {
            throw new NotFoundException("Custom validator '{$name}' not found");
        }
        return $this->setRule(new Callback($name, $callback, $params));
    }

    /** @return static */
    protected function setRule(RuleInterface $rule): self
    {
        $this->rules[$rule->getName()] = $rule;
        return $this;
    }

    /** @param mixed $value */
    public function isValid($value): bool
    {
        return collect($this->rules)
            ->filter(fn (RuleInterface $rule, string $key) => !$rule->validate($value))
            ->isEmpty();
    }
}
