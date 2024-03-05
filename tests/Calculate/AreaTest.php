<?php

namespace Unitz\Tests\Calculate;

use PHPUnit\Framework\TestCase;
use Unitz\Calculate\Area;
use Unitz\Length;

final class AreaTest extends TestCase
{
    public function testRectangleCalculatesCorrectly(): void
    {
        $width = new Length(meter: 5);
        $length = new Length(meter: 10);
        $expected = new Length(meter: 50);
        $actual = Area::rectangle($length, $width);
        $this->assertEquals($expected, $actual);
    }

    public function testRectangleCalculatesCorrectlyWithZeroLength(): void
    {
        $width = new Length(meter: 5);
        $length = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::rectangle($length, $width);
        $this->assertEquals($expected, $actual);
    }

    public function testRectangleCalculatesCorrectlyWithZeroWidth(): void
    {
        $width = new Length(meter: 0);
        $length = new Length(meter: 10);
        $expected = new Length(meter: 0);
        $actual = Area::rectangle($length, $width);
        $this->assertEquals($expected, $actual);
    }

    public function testRectangleThrowsRuntimeExceptionWithNegativeLength(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Length cannot be less than zero');

        $width = new Length(meter: 5);
        $length = new Length(meter: -10);
        Area::rectangle($length, $width);
    }

    public function testRectangleThrowsRuntimeExceptionWithNegativeWidth(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Width cannot be less than zero');

        $width = new Length(meter: -5);
        $length = new Length(meter: 10);
        Area::rectangle($length, $width);
    }

    public function testSquareCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 25);
        $actual = Area::square($side);
        $this->assertEquals($expected, $actual);
    }

    public function testSquareCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::square($side);
        $this->assertEquals($expected, $actual);
    }

    public function testSquareThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::square($side);
    }

    public function testCircleCalculatesCorrectly(): void
    {
        $radius = new Length(meter: 5);
        $expected = new Length(meter: 78.53981633974483);
        $actual = Area::circle($radius);
        $this->assertEquals($expected, $actual);
    }

    public function testCircleCalculatesCorrectlyWithZeroRadius(): void
    {
        $radius = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::circle($radius);
        $this->assertEquals($expected, $actual);
    }

    public function testCircleThrowsRuntimeExceptionWithNegativeRadius(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Radius cannot be less than zero');

        $radius = new Length(meter: -5);
        Area::circle($radius);
    }

    public function testEllipseCalculatesCorrectly(): void
    {
        $radius1 = new Length(meter: 5);
        $radius2 = new Length(meter: 10);
        $expected = new Length(meter: 157.07963267948966);
        $actual = Area::ellipse($radius1, $radius2);
        $this->assertEquals($expected, $actual);
    }

    public function testEllipseCalculatesCorrectlyWithZeroRadius1(): void
    {
        $radius1 = new Length(meter: 0);
        $radius2 = new Length(meter: 10);
        $expected = new Length(meter: 0);
        $actual = Area::ellipse($radius1, $radius2);
        $this->assertEquals($expected, $actual);
    }

    public function testEllipseThrowsRuntimeExceptionWithNegativeRadius1(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Radius1 cannot be less than zero');

        $radius1 = new Length(meter: -5);
        $radius2 = new Length(meter: 10);
        Area::ellipse($radius1, $radius2);
    }

    public function testEllipseCalculatesCorrectlyWithZeroRadius2(): void
    {
        $radius1 = new Length(meter: 5);
        $radius2 = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::ellipse($radius1, $radius2);
        $this->assertEquals($expected, $actual);
    }

    public function testEllipseThrowsRuntimeExceptionWithNegativeRadius2(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Radius2 cannot be less than zero');

        $radius1 = new Length(meter: 5);
        $radius2 = new Length(meter: -10);
        Area::ellipse($radius1, $radius2);
    }

    public function testTriangleCalculatesCorrectly(): void
    {
        $base = new Length(meter: 5);
        $height = new Length(meter: 10);
        $expected = new Length(meter: 25);
        $actual = Area::triangle($base, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTriangleCalculatesCorrectlyWithZeroBase(): void
    {
        $base = new Length(meter: 0);
        $height = new Length(meter: 10);
        $expected = new Length(meter: 0);
        $actual = Area::triangle($base, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTriangleThrowsRuntimeExceptionWithNegativeBase(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Base cannot be less than zero');

        $base = new Length(meter: -5);
        $height = new Length(meter: 10);
        Area::triangle($base, $height);
    }

    public function testTriangleCalculatesCorrectlyWithZeroHeight(): void
    {
        $base = new Length(meter: 5);
        $height = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::triangle($base, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTriangleThrowsRuntimeExceptionWithNegativeHeight(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Height cannot be less than zero');

        $base = new Length(meter: 5);
        $height = new Length(meter: -10);
        Area::triangle($base, $height);
    }

    public function testEquilateralTriangleCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 10.825317547305483);
        $actual = Area::equilateralTriangle($side);
        $this->assertEquals($expected, $actual);
    }

    public function testEquilateralTriangleCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::equilateralTriangle($side);
        $this->assertEquals($expected, $actual);
    }

    public function testEquilateralTriangleThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::equilateralTriangle($side);
    }

    public function testTrapezoidCalculatesCorrectly(): void
    {
        $base1 = new Length(meter: 5);
        $base2 = new Length(meter: 10);
        $height = new Length(meter: 15);
        $expected = new Length(meter: 112.5);
        $actual = Area::trapezoid($base1, $base2, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTrapezoidCalculatesCorrectlyWithZeroBase1(): void
    {
        $base1 = new Length(meter: 0);
        $base2 = new Length(meter: 10);
        $height = new Length(meter: 15);
        $expected = new Length(meter: 75);
        $actual = Area::trapezoid($base1, $base2, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTrapezoidThrowsRuntimeExceptionWithNegativeBase1(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Base1 cannot be less than zero');

        $base1 = new Length(meter: -5);
        $base2 = new Length(meter: 10);
        $height = new Length(meter: 15);
        Area::trapezoid($base1, $base2, $height);
    }

    public function testTrapezoidCalculatesCorrectlyWithZeroBase2(): void
    {
        $base1 = new Length(meter: 5);
        $base2 = new Length(meter: 0);
        $height = new Length(meter: 15);
        $expected = new Length(meter: 37.5);
        $actual = Area::trapezoid($base1, $base2, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTrapezoidThrowsRuntimeExceptionWithNegativeBase2(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Base2 cannot be less than zero');

        $base1 = new Length(meter: 5);
        $base2 = new Length(meter: -10);
        $height = new Length(meter: 15);
        Area::trapezoid($base1, $base2, $height);
    }

    public function testTrapezoidCalculatesCorrectlyWithZeroHeight(): void
    {
        $base1 = new Length(meter: 5);
        $base2 = new Length(meter: 10);
        $height = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::trapezoid($base1, $base2, $height);
        $this->assertEquals($expected, $actual);
    }

    public function testTrapezoidThrowsRuntimeExceptionWithNegativeHeight(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Height cannot be less than zero');

        $base1 = new Length(meter: 5);
        $base2 = new Length(meter: 10);
        $height = new Length(meter: -15);
        Area::trapezoid($base1, $base2, $height);
    }

    public function testRegularPentagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 43.01193501472417);
        $actual = Area::regularPentagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularPentagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularPentagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularPentagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularPentagon($side);
    }

    public function testRegularHexagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 64.9519052838329);
        $actual = Area::regularHexagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularHexagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularHexagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularHexagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularHexagon($side);
    }

    public function testRegularHeptagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 90.84781110003973);
        $actual = Area::regularHeptagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularHeptagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularHeptagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularHeptagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularHeptagon($side);
    }

    public function testRegularOctagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 120.71067811865474);
        $actual = Area::regularOctagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularOctagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularOctagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularOctagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularOctagon($side);
    }

    public function testRegularNonagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 154.54560484432253);
        $actual = Area::regularNonagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularNonagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularNonagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularNonagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularNonagon($side);
    }

    public function testRegularDecagonCalculatesCorrectly(): void
    {
        $side = new Length(meter: 5);
        $expected = new Length(meter: 192.35522107345338);
        $actual = Area::regularDecagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularDecagonCalculatesCorrectlyWithZeroSide(): void
    {
        $side = new Length(meter: 0);
        $expected = new Length(meter: 0);
        $actual = Area::regularDecagon($side);
        $this->assertEquals($expected, $actual);
    }

    public function testRegularDecagonThrowsRuntimeExceptionWithNegativeSide(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Side cannot be less than zero');

        $side = new Length(meter: -5);
        Area::regularDecagon($side);
    }
}