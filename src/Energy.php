<?php

namespace Unitz;

use InvalidArgumentException;

class Energy extends AbstractUnitz
{
    private float $joule;
    private float $kilojoule;
    private float $calorie;
    private float $kilocalorie;
    private float $btu;
    private float $wattHour;
    private float $kilowattHour;

    public function __construct(
        ?float $joule = null,
        ?float $kilojoule = null,
        ?float $calorie = null,
        ?float $kilocalorie = null,
        ?float $btu = null,
        ?float $wattHour = null,
        ?float $kilowattHour = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue(
            [$joule, $kilojoule, $calorie, $kilocalorie, $btu, $wattHour, $kilowattHour, $userValue]
        )) {
            throw new InvalidArgumentException('Only one Energy type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($joule)) {
            $this->setJoule($joule);
        }

        if (is_numeric($kilojoule)) {
            $this->setKilojoule($kilojoule);
        }

        if (is_numeric($calorie)) {
            $this->setCalorie($calorie);
        }

        if (is_numeric($kilocalorie)) {
            $this->setKilocalorie($kilocalorie);
        }

        if (is_numeric($btu)) {
            $this->setBtu($btu);
        }

        if (is_numeric($wattHour)) {
            $this->setWattHour($wattHour);
        }

        if (is_numeric($kilowattHour)) {
            $this->setKilowattHour($kilowattHour);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $joule
     * @return $this
     */
    public function setJoule(float $joule): self
    {
        $this->joule = $joule;
        $this->kilojoule = self::convertJouleToKilojoule($joule);
        $this->calorie = self::convertJouleToCalorie($joule);
        $this->kilocalorie = self::convertJouleToKilocalorie($joule);
        $this->btu = self::convertJouleToBtu($joule);
        $this->wattHour = self::convertJouleToWattHour($joule);
        $this->kilowattHour = self::convertJouleToKilowattHour($joule);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getJoule(?int $round = null): float
    {
        return $round ? round($this->joule, $round) : $this->joule;
    }

    /**
     * @param float $kilojoule
     * @return $this
     */
    public function setKilojoule(float $kilojoule): self
    {
        $this->kilojoule = $kilojoule;
        $this->setJoule(self::convertKilojouleToJoule($kilojoule));
        $this->kilojoule = $kilojoule;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilojoule(?int $round = null): float
    {
        return $round ? round($this->kilojoule, $round) : $this->kilojoule;
    }

    /**
     * @param float $calorie
     * @return $this
     */
    public function setCalorie(float $calorie): self
    {
        $this->calorie = $calorie;
        $this->setJoule(self::convertCalorieToJoule($calorie));
        $this->calorie = $calorie;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getCalorie(?int $round = null): float
    {
        return $round ? round($this->calorie, $round) : $this->calorie;
    }

    /**
     * @param float $kilocalorie
     * @return $this
     */
    public function setKilocalorie(float $kilocalorie): self
    {
        $this->kilocalorie = $kilocalorie;
        $this->setJoule(self::convertKilocalorieToJoule($kilocalorie));
        $this->kilocalorie = $kilocalorie;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilocalorie(?int $round = null): float
    {
        return $round ? round($this->kilocalorie, $round) : $this->kilocalorie;
    }

    /**
     * @param float $btu
     * @return $this
     */
    public function setBtu(float $btu): self
    {
        $this->btu = $btu;
        $this->setJoule(self::convertBtuToJoule($btu));
        $this->btu = $btu;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getBtu(?int $round = null): float
    {
        return $round ? round($this->btu, $round) : $this->btu;
    }

    /**
     * @param float $wattHour
     * @return $this
     */
    public function setWattHour(float $wattHour): self
    {
        $this->wattHour = $wattHour;
        $this->setJoule(self::convertWattHourToJoule($wattHour));
        $this->wattHour = $wattHour;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getWattHour(?int $round = null): float
    {
        return $round ? round($this->wattHour, $round) : $this->wattHour;
    }

    /**
     * @param float $kilowattHour
     * @return $this
     */
    public function setKilowattHour(float $kilowattHour): self
    {
        $this->kilowattHour = $kilowattHour;
        $this->setJoule(self::convertKilowattHourToJoule($kilowattHour));
        $this->kilowattHour = $kilowattHour;

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilowattHour(?int $round = null): float
    {
        return $round ? round($this->kilowattHour, $round) : $this->kilowattHour;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToKilojoule(float $joule): float
    {
        return $joule / 1000;
    }

    /**
     * @param float $kilojoule
     * @return float
     */
    public static function convertKilojouleToJoule(float $kilojoule): float
    {
        return $kilojoule * 1000;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToCalorie(float $joule): float
    {
        return $joule / 4.184;
    }

    /**
     * @param float $calorie
     * @return float
     */
    public static function convertCalorieToJoule(float $calorie): float
    {
        return $calorie * 4.184;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToKilocalorie(float $joule): float
    {
        return $joule / 4184;
    }

    /**
     * @param float $kilocalorie
     * @return float
     */
    public static function convertKilocalorieToJoule(float $kilocalorie): float
    {
        return $kilocalorie * 4184;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToBtu(float $joule): float
    {
        return $joule / 1055.05585262;
    }

    /**
     * @param float $btu
     * @return float
     */
    public static function convertBtuToJoule(float $btu): float
    {
        return $btu * 1055.05585262;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToWattHour(float $joule): float
    {
        return $joule / 3600;
    }

    /**
     * @param float $wattHour
     * @return float
     */
    public static function convertWattHourToJoule(float $wattHour): float
    {
        return $wattHour * 3600;
    }

    /**
     * @param float $joule
     * @return float
     */
    public static function convertJouleToKilowattHour(float $joule): float
    {
        return $joule / 3600000;
    }

    /**
     * @param float $kilowattHour
     * @return float
     */
    public static function convertKilowattHourToJoule(float $kilowattHour): float
    {
        return $kilowattHour * 3600000;
    }
}