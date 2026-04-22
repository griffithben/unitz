<?php

namespace Unitz;

final class UnitzService extends BaseUnitz
{
    /**
     * @param float|null $srm
     * @param float|null $ebc
     * @param float|null $lovibond
     * @param float|null $userValue
     * @return \Unitz\Color
     */
    public function makeColor(
        ?float $srm = null,
        ?float $ebc = null,
        ?float $lovibond = null,
        ?float $userValue = null
    ): Color {
        return new Color($srm, $ebc, $lovibond, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $plato
     * @param float|null $specificGravity
     * @param float|null $brix
     * @param float|null $userValue
     * @return \Unitz\Gravity
     */
    public function makeGravity(
        ?float $plato = null,
        ?float $specificGravity = null,
        ?float $brix = null,
        ?float $userValue = null
    ): Gravity {
        return new Gravity($plato, $specificGravity, $brix, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $bar
     * @param float|null $psi
     * @param float|null $userValue
     * @return \Unitz\Pressure
     */
    public function makePressure(?float $bar = null, ?float $psi = null, ?float $userValue = null): Pressure
    {
        return new Pressure($bar, $psi, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $fahrenheit
     * @param float|null $celsius
     * @param float|null $userValue
     * @return \Unitz\Temperature
     */
    public function makeTemperature(
        ?float $fahrenheit = null,
        ?float $celsius = null,
        ?float $userValue = null
    ): Temperature {
        return new Temperature($fahrenheit, $celsius, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $ounce
     * @param float|null $gallon
     * @param float|null $barrel
     * @param float|null $milliliter
     * @param float|null $liter
     * @param float|null $hectoliter
     * @param float|null $userValue
     * @return \Unitz\Volume
     */
    public function makeVolume(
        ?float $ounce = null,
        ?float $gallon = null,
        ?float $barrel = null,
        ?float $milliliter = null,
        ?float $liter = null,
        ?float $hectoliter = null,
        ?float $userValue = null
    ): Volume {
        return new Volume(
            $ounce,
            $gallon,
            $barrel,
            $milliliter,
            $liter,
            $hectoliter,
            $userValue,
            $this->getPreferences()
        );
    }

    /**
     * @param float|null $ounce
     * @param float|null $pound
     * @param float|null $gram
     * @param float|null $kilogram
     * @param float|null $userValue
     * @return \Unitz\Weight
     */
    public function makeWeight(
        ?float $ounce = null,
        ?float $pound = null,
        ?float $gram = null,
        ?float $kilogram = null,
        ?float $userValue = null
    ): Weight {
        return new Weight($ounce, $pound, $gram, $kilogram, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $millisecond
     * @param float|null $second
     * @param float|null $minute
     * @param float|null $hour
     * @param float|null $day
     * @param float|null $week
     * @param float|null $month
     * @param float|null $year
     * @param float|null $userValue
     * @return \Unitz\Time
     */
    public function makeTime(
        ?float $millisecond = null,
        ?float $second = null,
        ?float $minute = null,
        ?float $hour = null,
        ?float $day = null,
        ?float $week = null,
        ?float $month = null,
        ?float $year = null,
        ?float $userValue = null
    ): Time {
        return new Time(
            $millisecond,
            $second,
            $minute,
            $hour,
            $day,
            $week,
            $month,
            $year,
            $userValue,
            $this->getPreferences()
        );
    }

    /**
     * @param float|null $bit
     * @param float|null $byte
     * @param float|null $kilobyte
     * @param float|null $megabyte
     * @param float|null $gigabyte
     * @param float|null $terabyte
     * @param float|null $userValue
     * @return \Unitz\DigitalStorage
     */
    public function makeDigitalStorage(
        ?float $bit = null,
        ?float $byte = null,
        ?float $kilobyte = null,
        ?float $megabyte = null,
        ?float $gigabyte = null,
        ?float $terabyte = null,
        ?float $userValue = null
    ): DigitalStorage {
        return new DigitalStorage(
            $bit,
            $byte,
            $kilobyte,
            $megabyte,
            $gigabyte,
            $terabyte,
            $userValue,
            $this->getPreferences()
        );
    }

    /**
     * @param float|null $degree
     * @param float|null $radian
     * @param float|null $gradian
     * @param float|null $arcMinute
     * @param float|null $arcSecond
     * @param float|null $userValue
     * @return \Unitz\Angle
     */
    public function makeAngle(
        ?float $degree = null,
        ?float $radian = null,
        ?float $gradian = null,
        ?float $arcMinute = null,
        ?float $arcSecond = null,
        ?float $userValue = null
    ): Angle {
        return new Angle($degree, $radian, $gradian, $arcMinute, $arcSecond, $userValue, $this->getPreferences());
    }

    /**
     * @param float|null $joule
     * @param float|null $kilojoule
     * @param float|null $calorie
     * @param float|null $kilocalorie
     * @param float|null $btu
     * @param float|null $wattHour
     * @param float|null $kilowattHour
     * @param float|null $userValue
     * @return \Unitz\Energy
     */
    public function makeEnergy(
        ?float $joule = null,
        ?float $kilojoule = null,
        ?float $calorie = null,
        ?float $kilocalorie = null,
        ?float $btu = null,
        ?float $wattHour = null,
        ?float $kilowattHour = null,
        ?float $userValue = null
    ): Energy {
        return new Energy(
            $joule,
            $kilojoule,
            $calorie,
            $kilocalorie,
            $btu,
            $wattHour,
            $kilowattHour,
            $userValue,
            $this->getPreferences()
        );
    }

    /**
     * @param float|null $proof
     * @param float|null $percentAlcohol
     * @param float|null $userValue
     * @return \Unitz\Distillate
     */
    public function makeDistillate(
        ?float $proof = null,
        ?float $percentAlcohol = null,
        ?float $userValue = null
    ): Distillate {
        return new Distillate($proof, $percentAlcohol, $userValue, $this->getPreferences());
    }
}