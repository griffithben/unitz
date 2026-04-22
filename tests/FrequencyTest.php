<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Frequency;

final class FrequencyTest extends TestCase
{
    // Anchor: 1 GHz = 1,000 MHz = 1,000,000 kHz = 1,000,000,000 Hz
    public const TEST_GIGAHERTZ = 1.0;
    public const TEST_MEGAHERTZ = 1000.0;
    public const TEST_KILOHERTZ = 1000000.0;
    public const TEST_HERTZ = 1000000000.0;

    public function testSetHertzWillReturnHertzWithGetValueAndDefaultPreferences(): void
    {
        $frequency = new Frequency(hertz: self::TEST_HERTZ);
        $this->assertEquals(self::TEST_HERTZ, $frequency->getValue());
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Frequency type can be set at a time.');

        new Frequency(hertz: self::TEST_HERTZ, gigahertz: self::TEST_GIGAHERTZ);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $frequency = new Frequency(userValue: self::TEST_MEGAHERTZ, preferences: ['Frequency' => 'Megahertz']);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getValue());
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $frequency = new Frequency(userValue: self::TEST_MEGAHERTZ, preferences: ['Frequency' => 'Megahertz']);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getMegahertz());
    }

    // Hertz Conversions

    public function testSetHertzWillReturnHertzWithGetHertz(): void
    {
        $frequency = new Frequency(hertz: self::TEST_HERTZ);
        $this->assertEquals(self::TEST_HERTZ, $frequency->getHertz());
    }

    public function testSetHertzWillReturnKilohertzWithGetKilohertz(): void
    {
        $frequency = new Frequency(hertz: self::TEST_HERTZ);
        $this->assertEquals(self::TEST_KILOHERTZ, $frequency->getKilohertz());
    }

    public function testSetHertzWillReturnMegahertzWithGetMegahertz(): void
    {
        $frequency = new Frequency(hertz: self::TEST_HERTZ);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getMegahertz());
    }

    public function testSetHertzWillReturnGigahertzWithGetGigahertz(): void
    {
        $frequency = new Frequency(hertz: self::TEST_HERTZ);
        $this->assertEquals(self::TEST_GIGAHERTZ, $frequency->getGigahertz());
    }

    // Kilohertz Conversions

    public function testSetKilohertzWillReturnHertzWithGetHertz(): void
    {
        $frequency = new Frequency(kilohertz: self::TEST_KILOHERTZ);
        $this->assertEquals(self::TEST_HERTZ, $frequency->getHertz());
    }

    public function testSetKilohertzWillReturnKilohertzWithGetKilohertz(): void
    {
        $frequency = new Frequency(kilohertz: self::TEST_KILOHERTZ);
        $this->assertEquals(self::TEST_KILOHERTZ, $frequency->getKilohertz());
    }

    public function testSetKilohertzWillReturnMegahertzWithGetMegahertz(): void
    {
        $frequency = new Frequency(kilohertz: self::TEST_KILOHERTZ);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getMegahertz());
    }

    public function testSetKilohertzWillReturnGigahertzWithGetGigahertz(): void
    {
        $frequency = new Frequency(kilohertz: self::TEST_KILOHERTZ);
        $this->assertEquals(self::TEST_GIGAHERTZ, $frequency->getGigahertz());
    }

    // Megahertz Conversions

    public function testSetMegahertzWillReturnHertzWithGetHertz(): void
    {
        $frequency = new Frequency(megahertz: self::TEST_MEGAHERTZ);
        $this->assertEquals(self::TEST_HERTZ, $frequency->getHertz());
    }

    public function testSetMegahertzWillReturnKilohertzWithGetKilohertz(): void
    {
        $frequency = new Frequency(megahertz: self::TEST_MEGAHERTZ);
        $this->assertEquals(self::TEST_KILOHERTZ, $frequency->getKilohertz());
    }

    public function testSetMegahertzWillReturnMegahertzWithGetMegahertz(): void
    {
        $frequency = new Frequency(megahertz: self::TEST_MEGAHERTZ);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getMegahertz());
    }

    public function testSetMegahertzWillReturnGigahertzWithGetGigahertz(): void
    {
        $frequency = new Frequency(megahertz: self::TEST_MEGAHERTZ);
        $this->assertEquals(self::TEST_GIGAHERTZ, $frequency->getGigahertz());
    }

    // Gigahertz Conversions

    public function testSetGigahertzWillReturnHertzWithGetHertz(): void
    {
        $frequency = new Frequency(gigahertz: self::TEST_GIGAHERTZ);
        $this->assertEquals(self::TEST_HERTZ, $frequency->getHertz());
    }

    public function testSetGigahertzWillReturnKilohertzWithGetKilohertz(): void
    {
        $frequency = new Frequency(gigahertz: self::TEST_GIGAHERTZ);
        $this->assertEquals(self::TEST_KILOHERTZ, $frequency->getKilohertz());
    }

    public function testSetGigahertzWillReturnMegahertzWithGetMegahertz(): void
    {
        $frequency = new Frequency(gigahertz: self::TEST_GIGAHERTZ);
        $this->assertEquals(self::TEST_MEGAHERTZ, $frequency->getMegahertz());
    }

    public function testSetGigahertzWillReturnGigahertzWithGetGigahertz(): void
    {
        $frequency = new Frequency(gigahertz: self::TEST_GIGAHERTZ);
        $this->assertEquals(self::TEST_GIGAHERTZ, $frequency->getGigahertz());
    }
}