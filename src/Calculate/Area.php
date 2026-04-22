<?php

namespace Unitz\Calculate;

use RuntimeException;
use Unitz\Length;

class Area
{
    public static function rectangle(Length $length, Length $width): Length
    {
        if ($length->getMeter() < 0.0) {
            throw new RuntimeException('Length cannot be less than zero');
        }

        if ($width->getMeter() < 0.0) {
            throw new RuntimeException('Width cannot be less than zero');
        }

        return new Length(meter: $length->getMeter() * $width->getMeter());
    }

    public static function square(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: $side->getMeter() ** 2);
    }

    public static function circle(Length $radius): Length
    {
        if ($radius->getMeter() < 0.0) {
            throw new RuntimeException('Radius cannot be less than zero');
        }

        return new Length(meter: M_PI * $radius->getMeter() ** 2);
    }

    public static function ellipse(Length $majorAxisRadius, Length $minorAxisRadius): Length
    {
        if ($majorAxisRadius->getMeter() < 0.0) {
            throw new RuntimeException('Major Axis Radius cannot be less than zero');
        }

        if ($minorAxisRadius->getMeter() < 0.0) {
            throw new RuntimeException('Minor Axis Radius cannot be less than zero');
        }

        return new Length(meter: M_PI * $majorAxisRadius->getMeter() * $minorAxisRadius->getMeter());
    }

    public static function triangle(Length $base, Length $height): Length
    {
        if ($base->getMeter() < 0.0) {
            throw new RuntimeException('Base cannot be less than zero');
        }

        if ($height->getMeter() < 0.0) {
            throw new RuntimeException('Height cannot be less than zero');
        }

        return new Length(meter: ($base->getMeter() * $height->getMeter()) / 2);
    }

    public static function equilateralTriangle(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: (sqrt(3) / 4) * $side->getMeter() ** 2);
    }

    public static function trapezoid(Length $base1, Length $base2, Length $height): Length
    {
        if ($base1->getMeter() < 0.0) {
            throw new RuntimeException('Base1 cannot be less than zero');
        }

        if ($base2->getMeter() < 0.0) {
            throw new RuntimeException('Base2 cannot be less than zero');
        }

        if ($height->getMeter() < 0.0) {
            throw new RuntimeException('Height cannot be less than zero');
        }

        return new Length(meter: (($base1->getMeter() + $base2->getMeter()) / 2) * $height->getMeter());
    }

    public static function regularPentagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: (0.25 * sqrt(5 * (5 + 2 * sqrt(5)))) * $side->getMeter() ** 2);
    }

    public static function regularHexagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: (3 * sqrt(3) / 2) * $side->getMeter() ** 2);
    }

    public static function regularHeptagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: (7 / 4) * $side->getMeter() ** 2 * (1 / tan(M_PI / 7)));
    }

    public static function regularOctagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: 2 * (1 + sqrt(2)) * $side->getMeter() ** 2);
    }

    public static function regularNonagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: 9 / 4 * $side->getMeter() ** 2 * (1 / tan(M_PI / 9)));
    }

    public static function regularDecagon(Length $side): Length
    {
        if ($side->getMeter() < 0.0) {
            throw new RuntimeException('Side cannot be less than zero');
        }

        return new Length(meter: (5 / 2) * $side->getMeter() ** 2 * (1 / tan(M_PI / 10)));
    }
}