<?php

namespace Unitz;

use InvalidArgumentException;

class Distillate extends AbstractUnitz
{
    private float $proof;
    private float $percentAlcohol;

    public function __construct(
        ?float $proof = null,
        ?float $percentAlcohol = null,
        ?float $userValue = null,
        array $preferences = []
    ) {
        if (!$this->hasOneOrNoneValue([$proof, $percentAlcohol, $userValue])) {
            throw new InvalidArgumentException('Only one Distillate type can be set at a time.');
        }

        parent::__construct($preferences);

        if (is_numeric($proof)) {
            $this->setProof($proof);
        }

        if (is_numeric($percentAlcohol)) {
            $this->setPercentAlcohol($percentAlcohol);
        }

        if (is_numeric($userValue)) {
            $this->setValue($userValue);
        }
    }

    public function setProof(float $proof): self
    {
        if ($proof > 200) {
            throw new InvalidArgumentException('Proof cannot be greater than 200');
        }

        $this->proof = $proof;
        $this->percentAlcohol = self::convertProofToPercentAlcohol($proof);

        return $this;
    }

    public function getProof(?int $round = null): float
    {
        return $round ? round($this->proof, $round) : $this->proof;
    }

    public function setPercentAlcohol(float $percentAlcohol): self
    {
        if ($percentAlcohol > 100) {
            throw new InvalidArgumentException('Percent alcohol cannot be greater than 100');
        }

        $this->percentAlcohol = $percentAlcohol;
        $this->proof = self::convertPercentAlcoholToProof($percentAlcohol);

        return $this;
    }

    public function getPercentAlcohol(?int $round = null): float
    {
        return $round ? round($this->percentAlcohol, $round) : $this->percentAlcohol;
    }

    public static function convertProofToPercentAlcohol(float $proof): float
    {
        return $proof / 2;
    }

    public static function convertPercentAlcoholToProof(float $percentAlcohol): float
    {
        return $percentAlcohol * 2;
    }
}