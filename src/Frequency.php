<?php

namespace Unitz;

use InvalidArgumentException;

class Frequency extends AbstractUnitz
{
    private float $hertz;
    private float $kilohertz;
    private float $megahertz;
    private float $gigahertz;

    public function __construct(
        ?float $hertz = null,
        ?float $kilohertz = null,
        ?float $megahertz = null,
        ?float $gigahertz = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$hertz, $kilohertz, $megahertz, $gigahertz, $userValue])) {
            throw new InvalidArgumentException('Only one Frequency type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($hertz)) {
            $this->setHertz($hertz);
        }

        if (is_numeric($kilohertz)) {
            $this->setKilohertz($kilohertz);
        }

        if (is_numeric($megahertz)) {
            $this->setMegahertz($megahertz);
        }

        if (is_numeric($gigahertz)) {
            $this->setGigahertz($gigahertz);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $hertz
     * @return $this
     */
    public function setHertz(float $hertz): self
    {
        $this->hertz = $hertz;
        $this->kilohertz = self::convertHertzToKilohertz($hertz);
        $this->megahertz = self::convertKilohertzToMegahertz($this->kilohertz);
        $this->gigahertz = self::convertMegahertzToGigahertz($this->megahertz);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getHertz(?int $round = null): float
    {
        return $round ? round($this->hertz, $round) : $this->hertz;
    }

    /**
     * @param float $kilohertz
     * @return $this
     */
    public function setKilohertz(float $kilohertz): self
    {
        $this->kilohertz = $kilohertz;
        $this->hertz = self::convertKilohertzToHertz($kilohertz);
        $this->megahertz = self::convertKilohertzToMegahertz($kilohertz);
        $this->gigahertz = self::convertMegahertzToGigahertz($this->megahertz);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilohertz(?int $round = null): float
    {
        return $round ? round($this->kilohertz, $round) : $this->kilohertz;
    }

    /**
     * @param float $megahertz
     * @return $this
     */
    public function setMegahertz(float $megahertz): self
    {
        $this->megahertz = $megahertz;
        $this->kilohertz = self::convertMegahertzToKilohertz($megahertz);
        $this->hertz = self::convertKilohertzToHertz($this->kilohertz);
        $this->gigahertz = self::convertMegahertzToGigahertz($megahertz);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMegahertz(?int $round = null): float
    {
        return $round ? round($this->megahertz, $round) : $this->megahertz;
    }

    /**
     * @param float $gigahertz
     * @return $this
     */
    public function setGigahertz(float $gigahertz): self
    {
        $this->gigahertz = $gigahertz;
        $this->megahertz = self::convertGigahertzToMegahertz($gigahertz);
        $this->kilohertz = self::convertMegahertzToKilohertz($this->megahertz);
        $this->hertz = self::convertKilohertzToHertz($this->kilohertz);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getGigahertz(?int $round = null): float
    {
        return $round ? round($this->gigahertz, $round) : $this->gigahertz;
    }

    /**
     * @param float $hertz
     * @return float
     */
    public static function convertHertzToKilohertz(float $hertz): float
    {
        return $hertz / 1000;
    }

    /**
     * @param float $kilohertz
     * @return float
     */
    public static function convertKilohertzToHertz(float $kilohertz): float
    {
        return $kilohertz * 1000;
    }

    /**
     * @param float $kilohertz
     * @return float
     */
    public static function convertKilohertzToMegahertz(float $kilohertz): float
    {
        return $kilohertz / 1000;
    }

    /**
     * @param float $megahertz
     * @return float
     */
    public static function convertMegahertzToKilohertz(float $megahertz): float
    {
        return $megahertz * 1000;
    }

    /**
     * @param float $megahertz
     * @return float
     */
    public static function convertMegahertzToGigahertz(float $megahertz): float
    {
        return $megahertz / 1000;
    }

    /**
     * @param float $gigahertz
     * @return float
     */
    public static function convertGigahertzToMegahertz(float $gigahertz): float
    {
        return $gigahertz * 1000;
    }
}