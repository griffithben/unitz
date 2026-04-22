<?php

namespace Unitz;

use InvalidArgumentException;

class Angle extends AbstractUnitz
{
    private float $degree;
    private float $radian;
    private float $gradian;
    private float $arcMinute;
    private float $arcSecond;

    public function __construct(
        ?float $degree = null,
        ?float $radian = null,
        ?float $gradian = null,
        ?float $arcMinute = null,
        ?float $arcSecond = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$degree, $radian, $gradian, $arcMinute, $arcSecond, $userValue])) {
            throw new InvalidArgumentException('Only one Angle type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($degree)) {
            $this->setDegree($degree);
        }

        if (is_numeric($radian)) {
            $this->setRadian($radian);
        }

        if (is_numeric($gradian)) {
            $this->setGradian($gradian);
        }

        if (is_numeric($arcMinute)) {
            $this->setArcMinute($arcMinute);
        }

        if (is_numeric($arcSecond)) {
            $this->setArcSecond($arcSecond);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function setDegree(float $degree): self
    {
        $this->degree = $degree;
        $this->radian = self::convertDegreeToRadian($degree);
        $this->gradian = self::convertDegreeToGradian($degree);
        $this->arcMinute = self::convertDegreeToArcMinute($degree);
        $this->arcSecond = self::convertDegreeToArcSecond($degree);

        return $this;
    }

    public function getDegree(?int $round = null): float
    {
        return $round ? round($this->degree, $round) : $this->degree;
    }

    public function setRadian(float $radian): self
    {
        $this->radian = $radian;
        $this->setDegree(self::convertRadianToDegree($radian));
        $this->radian = $radian;

        return $this;
    }

    public function getRadian(?int $round = null): float
    {
        return $round ? round($this->radian, $round) : $this->radian;
    }

    public function setGradian(float $gradian): self
    {
        $this->gradian = $gradian;
        $this->setDegree(self::convertGradianToDegree($gradian));
        $this->gradian = $gradian;

        return $this;
    }

    public function getGradian(?int $round = null): float
    {
        return $round ? round($this->gradian, $round) : $this->gradian;
    }

    public function setArcMinute(float $arcMinute): self
    {
        $this->arcMinute = $arcMinute;
        $this->setDegree(self::convertArcMinuteToDegree($arcMinute));
        $this->arcMinute = $arcMinute;

        return $this;
    }

    public function getArcMinute(?int $round = null): float
    {
        return $round ? round($this->arcMinute, $round) : $this->arcMinute;
    }

    public function setArcSecond(float $arcSecond): self
    {
        $this->arcSecond = $arcSecond;
        $this->setDegree(self::convertArcSecondToDegree($arcSecond));
        $this->arcSecond = $arcSecond;

        return $this;
    }

    public function getArcSecond(?int $round = null): float
    {
        return $round ? round($this->arcSecond, $round) : $this->arcSecond;
    }

    public static function convertDegreeToRadian(float $degree): float
    {
        return $degree * M_PI / 180;
    }

    public static function convertRadianToDegree(float $radian): float
    {
        return $radian * 180 / M_PI;
    }

    public static function convertDegreeToGradian(float $degree): float
    {
        return $degree * 400 / 360;
    }

    public static function convertGradianToDegree(float $gradian): float
    {
        return $gradian * 360 / 400;
    }

    public static function convertDegreeToArcMinute(float $degree): float
    {
        return $degree * 60;
    }

    public static function convertArcMinuteToDegree(float $arcMinute): float
    {
        return $arcMinute / 60;
    }

    public static function convertDegreeToArcSecond(float $degree): float
    {
        return $degree * 3600;
    }

    public static function convertArcSecondToDegree(float $arcSecond): float
    {
        return $arcSecond / 3600;
    }
}