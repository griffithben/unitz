<?php

namespace Unitz;

use InvalidArgumentException;

class Weight extends AbstractUnitz
{
    private float $ounce;
    private float $pound;
    private float $gram;
    private float $kilogram;

    public function __construct(
        ?float $ounce = null,
        ?float $pound = null,
        ?float $gram = null,
        ?float $kilogram = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$ounce, $pound, $gram, $kilogram, $userValue])) {
            throw new InvalidArgumentException('Only one Weight type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($ounce)) {
            $this->setOunce($ounce);
        }

        if (is_numeric($pound)) {
            $this->setPound($pound);
        }

        if (is_numeric($gram)) {
            $this->setGram($gram);
        }

        if (is_numeric($kilogram)) {
            $this->setKilogram($kilogram);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function setOunce(float $ounce): self
    {
        $this->ounce = $ounce;
        $this->pound = self::convertOunceToPound($ounce);
        $this->kilogram = self::convertPoundToKilogram($this->pound);
        $this->gram = self::convertKilogramToGram($this->kilogram);

        return $this;
    }

    public function getOunce(?int $round = null): float
    {
        return $round ? round($this->ounce, $round) : $this->ounce;
    }

    public function setPound(float $pound): self
    {
        $this->ounce = self::convertPoundToOunce($pound);
        $this->pound = $pound;
        $this->kilogram = self::convertPoundToKilogram($this->pound);
        $this->gram = self::convertKilogramToGram($this->kilogram);

        return $this;
    }

    public function getPound(?int $round = null): float
    {
        return $round ? round($this->pound, $round) : $this->pound;
    }

    public function setGram(float $gram): self
    {
        $this->gram = $gram;
        $this->kilogram = self::convertGramToKilogram($gram);
        $this->pound = self::convertKilogramToPound($this->kilogram);
        $this->ounce = self::convertPoundToOunce($this->pound);

        return $this;
    }

    public function getGram(?int $round = null): float
    {
        return $round ? round($this->gram, $round) : $this->gram;
    }

    public function setKilogram(float $kilogram): self
    {
        $this->gram = self::convertKilogramToGram($kilogram);
        $this->kilogram = $kilogram;
        $this->pound = self::convertKilogramToPound($this->kilogram);
        $this->ounce = self::convertPoundToOunce($this->pound);

        return $this;
    }

    public function getKilogram(?int $round = null): float
    {
        return $round ? round($this->kilogram, $round) : $this->kilogram;
    }

    public static function convertPoundToOunce(float $pound): float
    {
        return $pound * 16;
    }

    public static function convertOunceToPound(float $ounce): float
    {
        return $ounce / 16;
    }

    public static function convertPoundToKilogram(float $pound): float
    {
        return $pound * 0.45359237;
    }

    public static function convertKilogramToPound(float $kilogram): float
    {
        return $kilogram / 0.45359237;
    }

    public static function convertKilogramToGram(float $kilogram): float
    {
        return $kilogram * 1000;
    }

    public static function convertGramToKilogram(float $gram): float
    {
        return $gram / 1000;
    }
}