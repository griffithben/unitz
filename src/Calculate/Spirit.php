<?php

namespace Unitz\Calculate;

use InvalidArgumentException;
use Unitz\Distillate;
use Unitz\Volume;

class Spirit
{
    public static function diluteDownToDesiredProof(
        Distillate $current,
        Distillate $desired,
        Volume $distillateVolume
    ): Volume {
        if ($current->getPercentAlcohol() < $desired->getPercentAlcohol()) {
            throw new InvalidArgumentException('Current distillate cannot be less than desired distillate.');
        }

        return new Volume(
            liter: $distillateVolume->getLiter() * (($current->getPercentAlcohol() / $desired->getPercentAlcohol()) - 1)
        );
    }

    public static function distilledAlcoholVolume(
        Volume $volume,
        Distillate $wash,
        float $stillEfficiencyPercent
    ): Volume {
        if ($stillEfficiencyPercent === 0.0) {
            throw new InvalidArgumentException('Still Efficiency cannot be zero.');
        }

        return new Volume(
            liter: ((0.95 * $volume->getLiter() * $wash->getPercentAlcohol() / $stillEfficiencyPercent) * 100) / 100
        );
    }

    public static function distilledRemainingWaterVolume(
        Volume $volume,
        Distillate $wash,
        float $stillEfficiencyPercent
    ): Volume {
        return new Volume(
            liter: $volume->getLiter() - self::distilledAlcoholVolume(
                $volume,
                $wash,
                $stillEfficiencyPercent
            )->getLiter()
        );
    }
}