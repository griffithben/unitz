<?php

namespace Unitz;

use ReflectionClass;
use RuntimeException;

abstract class AbstractUnitz extends BaseUnitz
{
    public function getValue(?int $round = null): float
    {
        $getterMethod = $this->makeGetterMethod();

        if (method_exists($this, $getterMethod)) {
            return $this->$getterMethod($round);
        }

        throw new RuntimeException("Unit '$getterMethod' does not exist.");
    }

    public function setValue(float $value): self
    {
        $setterMethod = $this->makeSetterMethod();

        if (method_exists($this, $setterMethod)) {
            return $this->$setterMethod($value);
        }

        throw new RuntimeException("Unit '$setterMethod' does not exist.");
    }

    protected function hasOneOrNoneValue(array $values): bool
    {
        $count = 0;
        foreach ($values as $value) {
            if (is_numeric($value)) {
                $count++;
            }
        }

        return $count <= 1;
    }

    private function makeGetterMethod(): string
    {
        return $this->makeMethod('get');
    }

    private function makeSetterMethod(): string
    {
        return $this->makeMethod('set');
    }

    private function makeMethod(string $prefix): string
    {
        $reflection = new ReflectionClass($this);
        $classname = $reflection->getShortName();

        if (array_key_exists($classname, $this->getPreferences())) {
            return $prefix . $this->getPreferences()[$classname];
        }

        throw new RuntimeException("Preference for '$classname' has not been set.");
    }
}