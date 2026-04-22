<?php

namespace Unitz\Rate;

use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;
use ReflectionClass;
use RuntimeException;
use Unitz\BaseUnitz;

abstract class AbstractRate
{
    private const UNIT_NAME_NUMERATOR = 0;
    private const UNIT_NAME_DENOMINATOR = 1;

    private Inflector $inflector;
    private BaseUnitz $numerator;
    private BaseUnitz $denominator;

    public function __construct()
    {
        $this->inflector = InflectorFactory::create()->build();
    }

    protected function setNumerator(BaseUnitz $numerator): void
    {
        $this->numerator = $numerator;
    }

    protected function setDenominator(BaseUnitz $denominator): void
    {
        $this->denominator = $denominator;
    }

    public function __call(string $methodName, array $arguments): BaseUnitz
    {
        $unitNames = $this->getUnitNames($this->checkAndRemoveGetPrefix($methodName));

        $numeratorName = $this->processUnitName($unitNames[self::UNIT_NAME_NUMERATOR]);
        $denominatorName = $this->processUnitName($unitNames[self::UNIT_NAME_DENOMINATOR]);

        $numerator = $this->getUnitValue($this->numerator, $numeratorName);
        $denominator = $this->getUnitValue($this->denominator, $denominatorName);

        $numeratorReflection = new ReflectionClass($this->numerator);
        $unitsClassName = $numeratorReflection->getName();
        $unitsClassShortName = $numeratorReflection->getShortName();

        return (new $unitsClassName(preferences: [$unitsClassShortName => $numeratorName]))->{"set$numeratorName"}(
            $numerator / $denominator
        );
    }

    private function checkAndRemoveGetPrefix(string $name): string
    {
        $getPosition = strpos($name, 'get');
        if ($getPosition === false || $getPosition !== 0) {
            throw new RuntimeException('All methods must start with "get"');
        }

        return str_replace('get', '', $name);
    }

    private function getUnitNames(string $name): array
    {
        $perPosition = strpos($name, 'Per');
        if ($perPosition === false) {
            throw new RuntimeException('All methods must contain "Per" between the two units');
        }

        $units = array_filter(explode('Per', $name));
        if (count($units) !== 2) {
            throw new RuntimeException(
                'All methods must contain two units separated by "Per", get' . $name . '() has ' . count(
                    $units
                )
            );
        }

        return $units;
    }

    private function processUnitName(string $unitName): string
    {
        return $this->inflector->singularize(ucfirst(strtolower($unitName)));
    }

    private function getUnitValue(BaseUnitz $unit, string $unitName): float
    {
        if (!method_exists($unit, "get$unitName")) {
            throw new RuntimeException("Method get$unitName does not exist on " . get_class($unit));
        }

        return $unit->{"get$unitName"}();
    }
}