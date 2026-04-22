<?php

namespace Unitz;

use InvalidArgumentException;

class Volume extends AbstractUnitz
{
    private float $ounce;
    private float $gallon;
    private float $barrel;
    private float $milliliter;
    private float $liter;
    private float $hectoliter;

    public function __construct(
        ?float $ounce = null,
        ?float $gallon = null,
        ?float $barrel = null,
        ?float $milliliter = null,
        ?float $liter = null,
        ?float $hectoliter = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$ounce, $gallon, $barrel, $milliliter, $liter, $hectoliter, $userValue])) {
            throw new InvalidArgumentException('Only one Volume type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($ounce)) {
            $this->setOunce($ounce);
        }

        if (is_numeric($gallon)) {
            $this->setGallon($gallon);
        }

        if (is_numeric($barrel)) {
            $this->setBarrel($barrel);
        }

        if (is_numeric($milliliter)) {
            $this->setMilliliter($milliliter);
        }

        if (is_numeric($liter)) {
            $this->setLiter($liter);
        }

        if (is_numeric($hectoliter)) {
            $this->setHectoliter($hectoliter);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function setOunce(float $ounce): self
    {
        $this->ounce = $ounce;
        $this->gallon = self::convertOunceToGallon($ounce);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    public function getOunce(?int $round = null): float
    {
        return $round ? round($this->ounce, $round) : $this->ounce;
    }

    public function setGallon(float $gallon): self
    {
        $this->ounce = self::convertGallonToOunce($gallon);
        $this->gallon = $gallon;
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    public function getGallon(?int $round = null): float
    {
        return $round ? round($this->gallon, $round) : $this->gallon;
    }

    public function setBarrel(float $barrel): self
    {
        $this->barrel = $barrel;
        $this->gallon = self::convertBarrelToGallon($barrel);
        $this->ounce = self::convertGallonToOunce($this->gallon);
        $this->liter = self::convertGallonToLiter($this->gallon);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);

        return $this;
    }

    public function getBarrel(?int $round = null): float
    {
        return $round ? round($this->barrel, $round) : $this->barrel;
    }

    public function setMilliliter(float $milliliter): self
    {
        $this->milliliter = $milliliter;
        $this->liter = self::convertMilliliterToLiter($milliliter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    public function getMilliliter(?int $round = null): float
    {
        return $round ? round($this->milliliter, $round) : $this->milliliter;
    }

    public function setLiter(float $liter): self
    {
        $this->liter = $liter;
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->hectoliter = self::convertLiterToHectoliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    public function getLiter(?int $round = null): float
    {
        return $round ? round($this->liter, $round) : $this->liter;
    }

    public function setHectoliter(float $hectoliter): self
    {
        $this->hectoliter = $hectoliter;
        $this->liter = self::convertHectoliterToLiter($hectoliter);
        $this->milliliter = self::convertLiterToMilliliter($this->liter);
        $this->gallon = self::convertLiterToGallon($this->liter);
        $this->barrel = self::convertGallonToBarrel($this->gallon);
        $this->ounce = self::convertGallonToOunce($this->gallon);

        return $this;
    }

    public function getHectoliter(?int $round = null): float
    {
        return $round ? round($this->hectoliter, $round) : $this->hectoliter;
    }

    public static function convertOunceToGallon(float $ounce): float
    {
        return $ounce / 128;
    }

    public static function convertGallonToOunce(float $gallon): float
    {
        return $gallon * 128;
    }

    public static function convertGallonToBarrel(float $gallon): float
    {
        return $gallon / 31;
    }

    public static function convertBarrelToGallon(float $barrel): float
    {
        return $barrel * 31;
    }

    public static function convertGallonToLiter(float $gallon): float
    {
        return $gallon * 3.785411784;
    }

    public static function convertLiterToGallon(float $liter): float
    {
        return $liter / 3.785411784;
    }

    public static function convertLiterToMilliliter(float $liter): float
    {
        return $liter * 1000;
    }

    public static function convertMilliliterToLiter(float $milliliter): float
    {
        return $milliliter / 1000;
    }

    public static function convertLiterToHectoliter(float $liter): float
    {
        return $liter / 100;
    }

    public static function convertHectoliterToLiter(float $hectoliter): float
    {
        return $hectoliter * 100;
    }

}