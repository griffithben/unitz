<?php

namespace Unitz\Rate;

use Unitz\Time;
use Unitz\Volume;

class Flow extends AbstractRate
{
    public function __construct(private readonly Volume $volume, private readonly Time $time)
    {
        parent::__construct();
        $this->setNumerator($volume);
        $this->setDenominator($time);
    }

    public function getVolume(): Volume
    {
        return $this->volume;
    }

    public function getTime(): Time
    {
        return $this->time;
    }
}