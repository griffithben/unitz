<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\Angle;

final class AngleTest extends TestCase
{
    // Anchor: 180° = π rad = 200 grad = 10800 arcmin = 648000 arcsec
    public const TEST_DEGREE = 180.0;
    public const TEST_RADIAN = M_PI;
    public const TEST_GRADIAN = 200.0;
    public const TEST_ARC_MINUTE = 10800.0;
    public const TEST_ARC_SECOND = 648000.0;

    public function testSetDegreeWillReturnDegreeWithGetValueAndDefaultPreferences(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_DEGREE, $angle->getValue());
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one Angle type can be set at a time.');

        new Angle(degree: self::TEST_DEGREE, radian: self::TEST_RADIAN);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $angle = new Angle(userValue: self::TEST_RADIAN, preferences: ['Angle' => 'Radian']);
        $this->assertEquals(self::TEST_RADIAN, $angle->getValue());
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $angle = new Angle(userValue: self::TEST_RADIAN, preferences: ['Angle' => 'Radian']);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    // Degree Conversions

    public function testSetDegreeWillReturnDegreeWithGetDegree(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_DEGREE, $angle->getDegree());
    }

    public function testSetDegreeWillReturnRadianWithGetRadian(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    public function testSetDegreeWillReturnGradianWithGetGradian(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_GRADIAN, $angle->getGradian());
    }

    public function testSetDegreeWillReturnArcMinuteWithGetArcMinute(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_ARC_MINUTE, $angle->getArcMinute());
    }

    public function testSetDegreeWillReturnArcSecondWithGetArcSecond(): void
    {
        $angle = new Angle(degree: self::TEST_DEGREE);
        $this->assertEquals(self::TEST_ARC_SECOND, $angle->getArcSecond());
    }

    // Radian Conversions

    public function testSetRadianWillReturnDegreeWithGetDegree(): void
    {
        $angle = new Angle(radian: self::TEST_RADIAN);
        $this->assertEquals(self::TEST_DEGREE, $angle->getDegree());
    }

    public function testSetRadianWillReturnRadianWithGetRadian(): void
    {
        $angle = new Angle(radian: self::TEST_RADIAN);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    public function testSetRadianWillReturnGradianWithGetGradian(): void
    {
        $angle = new Angle(radian: self::TEST_RADIAN);
        $this->assertEquals(self::TEST_GRADIAN, $angle->getGradian());
    }

    public function testSetRadianWillReturnArcMinuteWithGetArcMinute(): void
    {
        $angle = new Angle(radian: self::TEST_RADIAN);
        $this->assertEquals(self::TEST_ARC_MINUTE, $angle->getArcMinute());
    }

    public function testSetRadianWillReturnArcSecondWithGetArcSecond(): void
    {
        $angle = new Angle(radian: self::TEST_RADIAN);
        $this->assertEquals(self::TEST_ARC_SECOND, $angle->getArcSecond());
    }

    // Gradian Conversions

    public function testSetGradianWillReturnDegreeWithGetDegree(): void
    {
        $angle = new Angle(gradian: self::TEST_GRADIAN);
        $this->assertEquals(self::TEST_DEGREE, $angle->getDegree());
    }

    public function testSetGradianWillReturnRadianWithGetRadian(): void
    {
        $angle = new Angle(gradian: self::TEST_GRADIAN);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    public function testSetGradianWillReturnGradianWithGetGradian(): void
    {
        $angle = new Angle(gradian: self::TEST_GRADIAN);
        $this->assertEquals(self::TEST_GRADIAN, $angle->getGradian());
    }

    public function testSetGradianWillReturnArcMinuteWithGetArcMinute(): void
    {
        $angle = new Angle(gradian: self::TEST_GRADIAN);
        $this->assertEquals(self::TEST_ARC_MINUTE, $angle->getArcMinute());
    }

    public function testSetGradianWillReturnArcSecondWithGetArcSecond(): void
    {
        $angle = new Angle(gradian: self::TEST_GRADIAN);
        $this->assertEquals(self::TEST_ARC_SECOND, $angle->getArcSecond());
    }

    // ArcMinute Conversions

    public function testSetArcMinuteWillReturnDegreeWithGetDegree(): void
    {
        $angle = new Angle(arcMinute: self::TEST_ARC_MINUTE);
        $this->assertEquals(self::TEST_DEGREE, $angle->getDegree());
    }

    public function testSetArcMinuteWillReturnRadianWithGetRadian(): void
    {
        $angle = new Angle(arcMinute: self::TEST_ARC_MINUTE);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    public function testSetArcMinuteWillReturnGradianWithGetGradian(): void
    {
        $angle = new Angle(arcMinute: self::TEST_ARC_MINUTE);
        $this->assertEquals(self::TEST_GRADIAN, $angle->getGradian());
    }

    public function testSetArcMinuteWillReturnArcMinuteWithGetArcMinute(): void
    {
        $angle = new Angle(arcMinute: self::TEST_ARC_MINUTE);
        $this->assertEquals(self::TEST_ARC_MINUTE, $angle->getArcMinute());
    }

    public function testSetArcMinuteWillReturnArcSecondWithGetArcSecond(): void
    {
        $angle = new Angle(arcMinute: self::TEST_ARC_MINUTE);
        $this->assertEquals(self::TEST_ARC_SECOND, $angle->getArcSecond());
    }

    // ArcSecond Conversions

    public function testSetArcSecondWillReturnDegreeWithGetDegree(): void
    {
        $angle = new Angle(arcSecond: self::TEST_ARC_SECOND);
        $this->assertEquals(self::TEST_DEGREE, $angle->getDegree());
    }

    public function testSetArcSecondWillReturnRadianWithGetRadian(): void
    {
        $angle = new Angle(arcSecond: self::TEST_ARC_SECOND);
        $this->assertEquals(self::TEST_RADIAN, $angle->getRadian());
    }

    public function testSetArcSecondWillReturnGradianWithGetGradian(): void
    {
        $angle = new Angle(arcSecond: self::TEST_ARC_SECOND);
        $this->assertEquals(self::TEST_GRADIAN, $angle->getGradian());
    }

    public function testSetArcSecondWillReturnArcMinuteWithGetArcMinute(): void
    {
        $angle = new Angle(arcSecond: self::TEST_ARC_SECOND);
        $this->assertEquals(self::TEST_ARC_MINUTE, $angle->getArcMinute());
    }

    public function testSetArcSecondWillReturnArcSecondWithGetArcSecond(): void
    {
        $angle = new Angle(arcSecond: self::TEST_ARC_SECOND);
        $this->assertEquals(self::TEST_ARC_SECOND, $angle->getArcSecond());
    }
}