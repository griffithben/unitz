<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Rate\Boil;
use Unitz\Time;
use Unitz\Volume;
use Unitz\Weight;

class Water
{
    public static function partsPerMillion(Weight $substance, Volume $water): float
    {
        if ($water->getMilliliter() === 0.0) {
            throw new InvalidArgumentException('Water volume cannot be zero.');
        }

        return ($substance->getGram() / $water->getMilliliter()) * 1000000;
    }

    public static function boilOffVolume(Boil $boilRate, Time $time): Volume
    {
        return new Volume(gallon: $boilRate->getGallonsPerHour()->getGallon() * $time->getHour());
    }

    public static function postBoilVolume(Volume $preBoilVolume, Boil $boilRate, Time $time): Volume
    {
        return new Volume(gallon: $preBoilVolume->getGallon() - self::boilOffVolume($boilRate, $time)->getGallon());
    }
}

