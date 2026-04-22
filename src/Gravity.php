<?php

namespace Unitz;

use InvalidArgumentException;

class Gravity extends AbstractUnitz
{
    private float $plato;

    private float $specificGravity;

    private float $brix;

    public function __construct(
        ?float $plato = null,
        ?float $specificGravity = null,
        ?float $brix = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$plato, $specificGravity, $brix, $userValue])) {
            throw new InvalidArgumentException('Only one Gravity type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($plato)) {
            $this->setPlato($plato);
        }

        if (is_numeric($specificGravity)) {
            $this->setSpecificGravity($specificGravity);
        }

        if (is_numeric($brix)) {
            $this->setBrix($brix);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function getPlato(?int $round = null): float
    {
        return $round ? round($this->plato, $round) : $this->plato;
    }

    public function setPlato(float $plato): self
    {
        $this->plato = $plato;
        $this->specificGravity = self::convertPlatoToSpecificGravity($plato);
        $this->brix = self::convertPlatoToBrix($plato);

        return $this;
    }

    public function getSpecificGravity(?int $round = null): float
    {
        return $round ? round($this->specificGravity, $round) : $this->specificGravity;
    }

    public function setSpecificGravity(float $specificGravity): self
    {
        $this->plato = self::convertSpecificGravityToPlato($specificGravity);
        $this->specificGravity = $specificGravity;
        $this->brix = self::convertSpecificGravityToBrix($specificGravity);

        return $this;
    }

    public function getBrix(?int $round = null): float
    {
        return $round ? round($this->brix, $round) : $this->brix;
    }

    public function setBrix(float $brix): self
    {
        $this->plato = self::convertBrixToPlato($brix);
        $this->specificGravity = self::convertBrixToSpecificGravity($brix);
        $this->brix = $brix;

        return $this;
    }

    public static function convertPlatoToSpecificGravity(float $plato): float
    {
        return 1 + ($plato / (258.6 - (($plato / 258.2) * 227.1)));
    }

    public static function convertPlatoToBrix(float $plato): float
    {
        $specificGravity = self::convertPlatoToSpecificGravity($plato);

        return self::convertSpecificGravityToBrix($specificGravity);
    }

    public static function convertSpecificGravityToPlato(float $specificGravity): float
    {
        return (-1 * 616.868) + (1111.14 * $specificGravity) - (630.272 * $specificGravity ** 2) + (135.997 * $specificGravity ** 3);
    }

    public static function convertSpecificGravityToBrix(float $specificGravity): float
    {
        return (((182.4601 * $specificGravity - 775.6821) * $specificGravity + 1262.7794) * $specificGravity - 669.5622);
    }

    public static function convertBrixToPlato(float $brix): float
    {
        $specificGravity = self::convertBrixToSpecificGravity($brix);

        return self::convertSpecificGravityToPlato($specificGravity);
    }

    public static function convertBrixToSpecificGravity(float $brix): float
    {
        return ($brix / (258.6 - (($brix / 258.2) * 227.1))) + 1;
    }

}