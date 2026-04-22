<?php

namespace Unitz\Rate;

use Unitz\Length;
use Unitz\Time;

class Speed extends AbstractRate
{
    public function __construct(private readonly Length $length, private readonly Time $time)
    {
        parent::__construct();
        $this->setNumerator($length);
        $this->setDenominator($time);
    }

    public function getLength(): Length
    {
        return $this->length;
    }

    public function getTime(): Time
    {
        return $this->time;
    }
}