<?php

namespace Unitz;

use InvalidArgumentException;

class DigitalStorage extends AbstractUnitz
{
    private float $bit;
    private float $byte;
    private float $kilobyte;
    private float $megabyte;
    private float $gigabyte;
    private float $terabyte;

    public function __construct(
        ?float $bit = null,
        ?float $byte = null,
        ?float $kilobyte = null,
        ?float $megabyte = null,
        ?float $gigabyte = null,
        ?float $terabyte = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$bit, $byte, $kilobyte, $megabyte, $gigabyte, $terabyte, $userValue])) {
            throw new InvalidArgumentException('Only one DigitalStorage type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($bit)) {
            $this->setBit($bit);
        }

        if (is_numeric($byte)) {
            $this->setByte($byte);
        }

        if (is_numeric($kilobyte)) {
            $this->setKilobyte($kilobyte);
        }

        if (is_numeric($megabyte)) {
            $this->setMegabyte($megabyte);
        }

        if (is_numeric($gigabyte)) {
            $this->setGigabyte($gigabyte);
        }

        if (is_numeric($terabyte)) {
            $this->setTerabyte($terabyte);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    /**
     * @param float $bit
     * @return $this
     */
    public function setBit(float $bit): self
    {
        $this->bit = $bit;
        $this->byte = self::convertBitToByte($bit);
        $this->kilobyte = self::convertByteToKilobyte($this->byte);
        $this->megabyte = self::convertKilobyteToMegabyte($this->kilobyte);
        $this->gigabyte = self::convertMegabyteToGigabyte($this->megabyte);
        $this->terabyte = self::convertGigabyteToTerabyte($this->gigabyte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getBit(?int $round = null): float
    {
        return $round ? round($this->bit, $round) : $this->bit;
    }

    /**
     * @param float $byte
     * @return $this
     */
    public function setByte(float $byte): self
    {
        $this->byte = $byte;
        $this->bit = self::convertByteToBit($byte);
        $this->kilobyte = self::convertByteToKilobyte($byte);
        $this->megabyte = self::convertKilobyteToMegabyte($this->kilobyte);
        $this->gigabyte = self::convertMegabyteToGigabyte($this->megabyte);
        $this->terabyte = self::convertGigabyteToTerabyte($this->gigabyte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getByte(?int $round = null): float
    {
        return $round ? round($this->byte, $round) : $this->byte;
    }

    /**
     * @param float $kilobyte
     * @return $this
     */
    public function setKilobyte(float $kilobyte): self
    {
        $this->kilobyte = $kilobyte;
        $this->byte = self::convertKilobyteToByte($kilobyte);
        $this->bit = self::convertByteToBit($this->byte);
        $this->megabyte = self::convertKilobyteToMegabyte($kilobyte);
        $this->gigabyte = self::convertMegabyteToGigabyte($this->megabyte);
        $this->terabyte = self::convertGigabyteToTerabyte($this->gigabyte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getKilobyte(?int $round = null): float
    {
        return $round ? round($this->kilobyte, $round) : $this->kilobyte;
    }

    /**
     * @param float $megabyte
     * @return $this
     */
    public function setMegabyte(float $megabyte): self
    {
        $this->megabyte = $megabyte;
        $this->kilobyte = self::convertMegabyteToKilobyte($megabyte);
        $this->byte = self::convertKilobyteToByte($this->kilobyte);
        $this->bit = self::convertByteToBit($this->byte);
        $this->gigabyte = self::convertMegabyteToGigabyte($megabyte);
        $this->terabyte = self::convertGigabyteToTerabyte($this->gigabyte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getMegabyte(?int $round = null): float
    {
        return $round ? round($this->megabyte, $round) : $this->megabyte;
    }

    /**
     * @param float $gigabyte
     * @return $this
     */
    public function setGigabyte(float $gigabyte): self
    {
        $this->gigabyte = $gigabyte;
        $this->megabyte = self::convertGigabyteToMegabyte($gigabyte);
        $this->kilobyte = self::convertMegabyteToKilobyte($this->megabyte);
        $this->byte = self::convertKilobyteToByte($this->kilobyte);
        $this->bit = self::convertByteToBit($this->byte);
        $this->terabyte = self::convertGigabyteToTerabyte($gigabyte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getGigabyte(?int $round = null): float
    {
        return $round ? round($this->gigabyte, $round) : $this->gigabyte;
    }

    /**
     * @param float $terabyte
     * @return $this
     */
    public function setTerabyte(float $terabyte): self
    {
        $this->terabyte = $terabyte;
        $this->gigabyte = self::convertTerabyteToGigabyte($terabyte);
        $this->megabyte = self::convertGigabyteToMegabyte($this->gigabyte);
        $this->kilobyte = self::convertMegabyteToKilobyte($this->megabyte);
        $this->byte = self::convertKilobyteToByte($this->kilobyte);
        $this->bit = self::convertByteToBit($this->byte);

        return $this;
    }

    /**
     * @param int|null $round
     * @return float
     */
    public function getTerabyte(?int $round = null): float
    {
        return $round ? round($this->terabyte, $round) : $this->terabyte;
    }

    /**
     * @param float $bit
     * @return float
     */
    public static function convertBitToByte(float $bit): float
    {
        return $bit / 8;
    }

    /**
     * @param float $byte
     * @return float
     */
    public static function convertByteToBit(float $byte): float
    {
        return $byte * 8;
    }

    /**
     * @param float $byte
     * @return float
     */
    public static function convertByteToKilobyte(float $byte): float
    {
        return $byte / 1000;
    }

    /**
     * @param float $kilobyte
     * @return float
     */
    public static function convertKilobyteToByte(float $kilobyte): float
    {
        return $kilobyte * 1000;
    }

    /**
     * @param float $kilobyte
     * @return float
     */
    public static function convertKilobyteToMegabyte(float $kilobyte): float
    {
        return $kilobyte / 1000;
    }

    /**
     * @param float $megabyte
     * @return float
     */
    public static function convertMegabyteToKilobyte(float $megabyte): float
    {
        return $megabyte * 1000;
    }

    /**
     * @param float $megabyte
     * @return float
     */
    public static function convertMegabyteToGigabyte(float $megabyte): float
    {
        return $megabyte / 1000;
    }

    /**
     * @param float $gigabyte
     * @return float
     */
    public static function convertGigabyteToMegabyte(float $gigabyte): float
    {
        return $gigabyte * 1000;
    }

    /**
     * @param float $gigabyte
     * @return float
     */
    public static function convertGigabyteToTerabyte(float $gigabyte): float
    {
        return $gigabyte / 1000;
    }

    /**
     * @param float $terabyte
     * @return float
     */
    public static function convertTerabyteToGigabyte(float $terabyte): float
    {
        return $terabyte * 1000;
    }
}