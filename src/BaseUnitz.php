<?php

namespace Unitz;

class BaseUnitz
{
    public const DEFAULT_PREFERENCES = [
        'Gravity' => 'Plato',
        'Temperature' => 'Fahrenheit',
        'Volume' => 'Gallon',
        'Pressure' => 'Psi',
        'Weight' => 'Pound',
        'Color' => 'Srm',
        'Time' => 'Minute',
        'Distillate' => 'Proof',
        'Length' => 'Foot',
        'Energy' => 'Joule',
        'Angle' => 'Degree',
    ];

    private array $preferences;

    public function __construct(array $preferences = [])
    {
        $this->preferences = array_merge(self::DEFAULT_PREFERENCES, $preferences);
    }

    /**
     * @return array
     */
    public function getPreferences(): array
    {
        return $this->preferences;
    }
}