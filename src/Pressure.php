<?php

namespace Unitz;

use InvalidArgumentException;

class Pressure extends AbstractUnitz
{
    private float $bar;
    private float $psi;

    public function __construct(
        ?float $bar = null,
        ?float $psi = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$bar, $psi, $userValue])) {
            throw new InvalidArgumentException('Only one Pressure type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($bar)) {
            $this->setBar($bar);
        }

        if (is_numeric($psi)) {
            $this->setPsi($psi);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function setBar(float $bar): self
    {
        $this->bar = $bar;
        $this->psi = self::convertBarToPsi($bar);

        return $this;
    }

    public function getBar(?int $round = null): float
    {
        return $round ? round($this->bar, $round) : $this->bar;
    }

    public function setPsi(float $psi): self
    {
        $this->bar = self::convertPsiToBar($psi);
        $this->psi = $psi;

        return $this;
    }

    public function getPsi(?int $round = null): float
    {
        return $round ? round($this->psi, $round) : $this->psi;
    }

    public static function convertPsiToBar(float $psi): float
    {
        return $psi / 14.5037738;
    }

    public static function convertBarToPsi(float $bar): float
    {
        return $bar * 14.5037738;
    }
}