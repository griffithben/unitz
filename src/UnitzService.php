<?php

namespace Unitz;

final class UnitzService extends BaseUnitz
{
    public function makeColor(
        ?float $srm = null,
        ?float $ebc = null,
        ?float $lovibond = null,
        ?float $userValue = null
    ): Color {
        return new Color($srm, $ebc, $lovibond, $userValue, $this->getPreferences());
    }

    public function makeGravity(
        ?float $plato = null,
        ?float $specificGravity = null,
        ?float $brix = null,
        ?float $userValue = null
    ): Gravity {
        return new Gravity($plato, $specificGravity, $brix, $userValue, $this->getPreferences());
    }

    public function makePressure(?float $bar = null, ?float $psi = null, ?float $userValue = null): Pressure
    {
        return new Pressure($bar, $psi, $userValue, $this->getPreferences());
    }

    public function makeTemperature(
        ?float $fahrenheit = null,
        ?float $celsius = null,
        ?float $userValue = null
    ): Temperature {
        return new Temperature($fahrenheit, $celsius, $userValue, $this->getPreferences());
    }

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

    public function makeWeight(
        ?float $ounce = null,
        ?float $pound = null,
        ?float $gram = null,
        ?float $kilogram = null,
        ?float $userValue = null
    ): Weight {
        return new Weight($ounce, $pound, $gram, $kilogram, $userValue, $this->getPreferences());
    }

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

    public function makeFrequency(
        ?float $hertz = null,
        ?float $kilohertz = null,
        ?float $megahertz = null,
        ?float $gigahertz = null,
        ?float $userValue = null
    ): Frequency {
        return new Frequency($hertz, $kilohertz, $megahertz, $gigahertz, $userValue, $this->getPreferences());
    }

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

    public function makeDistillate(
        ?float $proof = null,
        ?float $percentAlcohol = null,
        ?float $userValue = null
    ): Distillate {
        return new Distillate($proof, $percentAlcohol, $userValue, $this->getPreferences());
    }
}