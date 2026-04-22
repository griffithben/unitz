<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Energy;

final class EnergyTest extends TestCase
{
    // Anchor: 4184 J = 1 kcal = 1000 cal
    public const TEST_JOULE = 4184;
    public const TEST_KILOJOULE = 4.184;
    public const TEST_CALORIE = 1000.0;
    public const TEST_KILOCALORIE = 1.0;
    public const TEST_BTU = 4184 / 1055.05585262;
    public const TEST_WATT_HOUR = 4184 / 3600;
    public const TEST_KILOWATT_HOUR = 4184 / 3600000;

    public function testSetJouleWillReturnJouleWithGetValueAndDefaultPreferences(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $actual = $energy->getValue();
        $expected = self::TEST_JOULE;

        $this->assertEquals($expected, $actual);
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Energy type can be set at a time.');

        new Energy(joule: self::TEST_JOULE, kilocalorie: self::TEST_KILOCALORIE);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $energy = new Energy(userValue: self::TEST_KILOCALORIE, preferences: ['Energy' => 'Kilocalorie']);
        $actual = $energy->getValue();
        $expected = self::TEST_KILOCALORIE;

        $this->assertEquals($expected, $actual);
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $energy = new Energy(userValue: self::TEST_KILOCALORIE, preferences: ['Energy' => 'Kilocalorie']);
        $actual = $energy->getKilocalorie();
        $expected = self::TEST_KILOCALORIE;

        $this->assertEquals($expected, $actual);
    }

    // Joule Conversions

    public function testSetJouleWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetJouleWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetJouleWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetJouleWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetJouleWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetJouleWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetJouleWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(joule: self::TEST_JOULE);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // Kilojoule Conversions

    public function testSetKilojouleWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetKilojouleWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetKilojouleWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetKilojouleWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetKilojouleWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetKilojouleWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetKilojouleWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(kilojoule: self::TEST_KILOJOULE);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // Calorie Conversions

    public function testSetCalorieWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetCalorieWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetCalorieWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetCalorieWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetCalorieWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetCalorieWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetCalorieWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(calorie: self::TEST_CALORIE);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // Kilocalorie Conversions

    public function testSetKilocalorieWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetKilocalorieWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetKilocalorieWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetKilocalorieWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetKilocalorieWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetKilocalorieWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetKilocalorieWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(kilocalorie: self::TEST_KILOCALORIE);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // BTU Conversions

    public function testSetBtuWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetBtuWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetBtuWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetBtuWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetBtuWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetBtuWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetBtuWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(btu: self::TEST_BTU);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // WattHour Conversions

    public function testSetWattHourWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetWattHourWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetWattHourWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetWattHourWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetWattHourWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetWattHourWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetWattHourWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(wattHour: self::TEST_WATT_HOUR);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }

    // KilowattHour Conversions

    public function testSetKilowattHourWillReturnJouleWithGetJoule(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_JOULE, $energy->getJoule());
    }

    public function testSetKilowattHourWillReturnKilojouleWithGetKilojoule(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_KILOJOULE, $energy->getKilojoule());
    }

    public function testSetKilowattHourWillReturnCalorieWithGetCalorie(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_CALORIE, $energy->getCalorie());
    }

    public function testSetKilowattHourWillReturnKilocalorieWithGetKilocalorie(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_KILOCALORIE, $energy->getKilocalorie());
    }

    public function testSetKilowattHourWillReturnBtuWithGetBtu(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_BTU, $energy->getBtu());
    }

    public function testSetKilowattHourWillReturnWattHourWithGetWattHour(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_WATT_HOUR, $energy->getWattHour());
    }

    public function testSetKilowattHourWillReturnKilowattHourWithGetKilowattHour(): void
    {
        $energy = new Energy(kilowattHour: self::TEST_KILOWATT_HOUR);
        $this->assertEquals(self::TEST_KILOWATT_HOUR, $energy->getKilowattHour());
    }
}